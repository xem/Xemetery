<?php
# Homemade PPHP minifier

# Get original code
$code = file_get_contents("pphp.php");
$size = strlen($code);
echo "before: $size<br/>";

# Minify it
$code_min = '';

# Remove multiline comments
$code = preg_replace( '#\/\*.*?\*\/#s', '', $code );

# Separate lines
$code = explode("\n", $code);

foreach($code as $line)
{
  # Trim
  $line = trim($line);
  
  # Ignore empty / comments
  if(empty($line) or substr($line, 0, 2) == '//' or $line{0} == "#")
  {
    continue;
  }
  
  # Remove spaces
  $line = str_replace(" = ", "=", $line);
  $line = str_replace(", ", ",", $line);
  $line = str_replace(" + ", "+", $line);
  $line = str_replace(" or ", "||", $line);
  $line = str_replace(" == ", "==", $line);
  $line = str_replace(" != ", "!=", $line);
  $line = str_replace(" . ", ".", $line);
  $line = str_replace("if (", "if(", $line);
  $line = str_replace("echo '", "echo'", $line);
  $line = str_replace('echo "', 'echo"', $line);
  $line = str_replace('as $', 'as$', $line);
  $line = str_replace(' ++', '++', $line);
  $line = str_replace(' and ', '&&', $line);
  $line = str_replace(' > ', '>', $line);
  $line = str_replace(' - ', '-', $line);
  $line = str_replace('return "', 'return"', $line);
  $line = str_replace("return '", "return'", $line);
  $line = str_replace("return $", "return$", $line);

  # Return line
  $code_min .= $line;
}

# Last fixes
$code_min = str_replace( '<?php', '<?php ', $code_min);
$code_min = str_replace("{continue;}", "continue;", $code_min);
$code_min = str_replace("{break;}", "break;", $code_min);

# Save minified code
$size_min = strlen($code_min);
echo "after: $size_min<br/>";
echo "minified: - ". floor(100 - (100 * $size_min / $size)) . " % <br/>";

$file = fopen("pphp_mini.php", "w+");
fwrite($file, $code_min);
fclose($file);