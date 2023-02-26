<?php
function m($a, $b, $c)
{
 $result = 1;
 while($b--){
   $result = ($result * $a) % $c;
 }
 return $result;
}

echo m(80488, 140313, 283189);