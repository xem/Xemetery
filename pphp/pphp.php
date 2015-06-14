<?php
# PPHP v.0.1

# At the beginning, start chrono
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;

# Start buffer
ob_start();

# At the end, process buffer
register_shutdown_function('process_buffer');

# Call PPHP engine on buffer
function process_buffer()
{
  pphp(ob_get_clean());
}

# PPHP engine
function pphp($code)
{
  # Write the HTML5 doctype
  echo '<!doctype html>';

  # Simple elements
  $simple_elements = array('meta', 'base', 'link', 'css', 'favicon', 'rss', 'hr', 'br', 'wbr', 'img', 'param', 'source', 'track', 'area', 'input', 'button', 'option', 'command');

  # Remember the DOM
  $dom = array();

  # Remove multiline comments
  $code = preg_replace( '#\/\*.*?\*\/#s', '', $code );

  # Separate the PPHP code lines
  $code = explode("\n", $code);

  # for each line
  foreach($code as $line)
  {
    # Remove spaces
    $line = trim($line);
    
    # Inside a textarea, echo text until ":"
    if(end($dom) == "textarea")
    {
      if($line == ":")
      {
        echo '</textarea>';
        array_pop($dom);
      }
      else
      {
        echo trim($line), "\n";
      }
      continue;
    }

    # If it's empty or it's a comment, ignore it
    if(empty($line) or substr($line, 0, 2) == '//')
    {
      continue;
    }

    # If it is escaped (\), echo it without the escape character
    if($line{0} == "\\")
    {
      echo pphp_new_line($dom), substr($line, 1);
      continue;
    }

    # If it is just text, echo it with indentation
    if($line{0} != ':')
    {
      echo pphp_new_line($dom), $line;
      continue;
    }

    # Ignore inappropriate ":"
    if($line == ':' and empty($dom))
    {
      continue;
    }

    # Else, separate the line tokens separated by spaces
    $tokens = explode(' ', $line);

    # Element to process
    $element = null;

    # Token position
    $token_position = 0;

    # For each token
    foreach($tokens as $token)
    {
      $token_position ++;

      # Start an element (:...)
      if($token{0} == ':' and $token != ':' and $element == null)
      {
        $element = substr($token, 1);
        echo pphp_new_line($dom), '<', $element;

        # Stack element in $dom if it's a container
        if(!in_array($element, $simple_elements))
        {
          $dom[] = $element;
        }
      }

      # Continue an element
      if($element != null)
      {
        # Ignore empty
        if(empty($token))
        {
          continue;
        }

        # Skip comment (//...)
        if(substr($token, 0, 2) == '//')
        {
          break;
        }

        # Write text in container and close it (:...)
        if($token{0} == ':' and $token_position > 1 and !in_array($element, $simple_elements))
        {
          echo '>', trim(substr($token,1));
          for($t = $token_position; $t < count($tokens); $t++)
          {
            echo ' ', $tokens[$t];
          }
          echo '</', $element;
          array_pop($dom);
          break;
        }

        # Id attribute (#)
        if($token{0} == '#')
        {
          echo ' id="', substr($token, 1), '"';
        }

        # Class attribute (.)
        elseif($token{0} == '.')
        {
          echo ' class="', substr($token, 1), '"';
        }

        # Regular attribute (attr="attr")
        elseif(strpos($token, "=") !== false)
        {
          echo ' ', $token;
        }

        # Predefined attribute (attr)
        elseif(true)
        {
          // TODO
        }
      }

      # End an element (:)
      if($token == ':')
      {
        # Get element name
        $e = array_pop($dom);

        # End element
        echo pphp_new_line($dom), '</', $e;
      }
    }

    # End tag
    echo '>';
  }

  # End chrono
  $mtime = microtime();
  $mtime = explode(' ', $mtime);
  $mtime = $mtime[1] + $mtime[0];
  $endtime = $mtime;
  $totaltime = ($endtime - $GLOBALS['starttime']);
  echo "\n", '<!-- This page was generated in ', substr($totaltime, 0, 6), ' s. -->'; 
}

function pphp_new_line($dom)
{
  return "\n" . str_repeat("    ", count($dom));
}
?>