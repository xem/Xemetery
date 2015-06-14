<?php
// Fichier ou liste de fichiers à télécharger par la DS

function list_dir($dir, $len)
{
	$d = @opendir($dir);
	while($elem = @readdir($d))
	{
		if($elem != "." && $elem != "..")
		{
			if(is_dir($dir."/".$elem))
			{
				@list_dir($dir."/".$elem, $len);
			}
			else
			{
				echo substr("/$dir/$elem\n", $len);
			}
		}
	}
}

function count_files($dir)
{
	$count = 0;
	$d = @opendir($dir);
	while($elem = @readdir($d))
	{
		if($elem != "." && $elem != "..")
		{
			if(is_dir($dir."/".$elem))
			{
				$count += count_files($dir."/".$elem);
			}
			else
			{
				$count++;
			}
		}
	}
	return $count;
}

$id = $_GET["id"];

// BDD
mysql_connect("mysql6.000webhost.com", "a3000824_ul", "thebest1");
mysql_select_db("a3000824_ul");
$query = mysql_query("SELECT id, nom FROM homebrew WHERE id = $id");
$row = mysql_fetch_row($query);
if($row != null)
{
	echo($row[0] . " - " . $row[1] . "\n");
}
else
{
	echo "homebrew inexistant \n0";
	die;
}

// Dossier unzip
if(is_dir("homebrew/$id/unzip"))
{
	echo count_files("homebrew/$id/unzip")."\n";
	list_dir("homebrew/$id/unzip", 23);
}

// Fichier seul
else
{
	echo count_files("homebrew/$id")."\n";
	list_dir("homebrew/$id", 17);
}