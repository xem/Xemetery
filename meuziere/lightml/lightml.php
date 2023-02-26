<?php
/**
 * LigHTML Compressor
 * Include this file on top of your page
 */

// At the beginning: start the buffer
ob_start();

// At the end: call the converter
register_shutdown_function('lightml');

// LigHTML converter 
function lightml(){

  // Set list of HTML5 tags
  $html_tags_1 = array("a","abbr","address","area","article","aside","NO","audio","b","bb","base","bdi","bdo","blockquote","body","br","button","canvas","caption","cite","code","col","colgroup","command","data","datagrid","datalist","dd","del","NO","NO","details","dfn");
  $html_tags_2 = array("div","dl","dt","em","embed","NO","eventsource","fieldset","figcaption","figure","footer","form","h1","h2","NO","h3","h4","h5","h6","head","header","hgroup","hr","html","i","iframe","img","NO","input","ins","kbd","keygen","label");
  $html_tags_3 = array("legend","li","link","mark","map","menu","NO","meta","meter","nav","noscript","object","ol","optgroup","option","output","p","param","pre","progress","q","ruby","rp","rt","s","samp","script","section","select","NO","small");
  $html_tags_4 = array("source","span","strong","style","sub","summary","NO","sup","table","tbody","td","textarea","tfoot","th","thead","time","title","tr","track","u","ul","var","video","wbr");

  // Read and clean the buffer
  $html = ob_get_contents();
  $lightml = $html;
  ob_end_clean();

  // Minify HTML
  $lightml = str_replace("<!doctype html>", "", $lightml);
  $lightml = str_replace("\n", "", $lightml);
  $lightml = str_replace("\r", "", $lightml);
  $lightml = str_replace("\t", "  ", $lightml);
  $lightml = str_replace(">        ", ">", $lightml);
  $lightml = str_replace(">    ", ">", $lightml);
  $lightml = str_replace(">  ", ">", $lightml);
  $lightml = str_replace("        <", "<", $lightml);
  $lightml = str_replace("    <", "<", $lightml);
  $lightml = str_replace("  <", "<", $lightml);
  $lightml = str_replace("/>", ">", $lightml);
  $lightml = str_replace("</head>", "", $lightml);
  $lightml = str_replace("</li>", "", $lightml);
  $lightml = str_replace("</tr>", "", $lightml);
  $lightml = str_replace("</td>", "", $lightml);
  $lightml = str_replace("</th>", "", $lightml);
  $lightml = str_replace("</body>", "", $lightml);
  $lightml = str_replace("</html>", "", $lightml);

  // Replace HTML tags with LigHTML keywords (1)
  for($id = count($html_tags_1); $id > 0; $id--){

    // Set the character code of the current HTML tag
    $chr = chr($id + 31);

    // Opening elements without attributes and self-closing elements begin with :  
    $lightml = str_replace("<" . $html_tags_1[$id - 1] . ">", "$chr", $lightml);

    // Opening elements with attributes begin with :
    $lightml = str_replace("<" . $html_tags_1[$id - 1] . " ", "$chr", $lightml);

    // Closing elements begin with :
    $lightml = str_replace("</" . $html_tags_1[$id - 1] . ">", "$chr", $lightml);
  }
  
  // Replace HTML tags with LigHTML keywords (2)
  for($id = count($html_tags_2); $id > 0; $id--){

    // Set the character code of the current HTML tag
    $chr = chr($id + 32);

    // Opening elements without attributes and self-closing elements begin with :  
    $lightml = str_replace("<" . $html_tags_2[$id - 1] . ">", "$chr", $lightml);

    // Opening elements with attributes begin with :
    $lightml = str_replace("<" . $html_tags_2[$id - 1] . " ", "$chr", $lightml);

    // Closing elements begin with :
    $lightml = str_replace("</" . $html_tags_2[$id - 1] . ">", "$chr", $lightml);
  }
  
  // Replace HTML tags with LigHTML keywords (3)
  for($id = count($html_tags_3); $id > 0; $id--){

    // Set the character code of the current HTML tag
    $chr = chr($id + 31);

    // Opening elements without attributes and self-closing elements begin with :  
    $lightml = str_replace("<" . $html_tags_3[$id - 1] . ">", "$chr", $lightml);

    // Opening elements with attributes begin with :
    $lightml = str_replace("<" . $html_tags_3[$id - 1] . " ", "$chr", $lightml);

    // Closing elements begin with :
    $lightml = str_replace("</" . $html_tags_3[$id - 1] . ">", "$chr", $lightml);
  }
  
  // Replace HTML tags with LigHTML keywords (4)
  for($id = count($html_tags_4); $id > 0; $id--){

    // Set the character code of the current HTML tag
    $chr = chr($id + 31);

    // Opening elements without attributes and self-closing elements begin with :  
    $lightml = str_replace("<" . $html_tags_4[$id - 1] . ">", "$chr", $lightml);

    // Opening elements with attributes begin with :
    $lightml = str_replace("<" . $html_tags_4[$id - 1] . " ", "$chr", $lightml);

    // Closing elements begin with :
    $lightml = str_replace("</" . $html_tags_4[$id - 1] . ">", "$chr", $lightml);
  }
  
  $lightml = html_entity_decode($lightml);

  echo "<!doctype html>\n<script src=lightml.js></script>\n$lightml\n<!-- Compression: -" . round((1 - strlen($lightml)/strlen($html)) * 100) . "% (" . ((strlen($lightml) - strlen($html)) / 1000) . " kb) -->"; 
}