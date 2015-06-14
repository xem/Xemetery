<?php
// Fichier ou liste de fichiers à télécharger par la DS

function list_dir($dir, $id)
{
	$d = opendir($dir);
	while($elem = readdir($d))
	{
		if($elem != "." && $elem != "..")
		{
			if(is_dir($dir."/".$elem))
			{
				list_dir($dir."/".$elem);
			}
			else
			{
				echo "http://homebrewifi.byethost10.com/$dir/$elem\n";
			}
		}
	}
}

$id = $_GET["id"];

// Dossier unzip
if(is_dir("homebrew/$id/unzip"))
{
	list_dir("homebrew/$id/unzip", $id);
}

// Fichier seul
else
{
	list_dir("homebrew/$id/", $id);
}