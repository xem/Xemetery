<?php
//opens countlog.txt to read the number of hits
$datei = fopen("countlog.txt","r");
$count = fgets($datei,1000);
fclose($datei);
$count=$count + 1;
echo "Visits since 2020-05-25: $count <br><a href='https://docs.google.com/spreadsheets/d/1YR68hC-3dDi70h8xQHT0FOpBJiuaQA1pc0fLTjJbF8E/edit?usp=sharing'>history</a>";

// opens countlog.txt to change new hit number
$datei = fopen("countlog.txt","w");
fwrite($datei, $count);
fclose($datei);
?>