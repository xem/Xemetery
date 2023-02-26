<?php
$URL = pathinfo("$REQUEST_URI"); // recupere le chemin demande
header("HTTP/1.0 200 OK");
header('Location: /url.php?a='.$URL["basename"]);
?>