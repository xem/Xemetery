<?php
/////////////////
// homebreWifi //
/////////////////

// BDD
mysql_connect("mysql6.000webhost.com", "a3000824_ul", "thebest1");
mysql_select_db("a3000824_ul");
//ini_set('upload_max_filesize', '20000K');
//echo ini_get('upload_max_filesize');
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>HomebreWifi</title>
</head>
<body bgcolor = "lightblue" style = "font-family: 'Trebuchet MS'; font-size: 11px">
<a href = "index.php">[French]</a>
<center>

<?php
// En cas d'upload
if(!empty($_POST))
{
	$nom = htmlspecialchars($_POST["nom"]);
	$version = htmlspecialchars($_POST["version"]);
	if($version == "version")
	{
		$version = '';
	}
	$site = htmlspecialchars($_POST["site"]);
	if($site == "site")
	{
		$site = '';
	}
	if(!empty($site) && substr($site, 0, 4) != "http")
	{
		$site = "http://$site";
	}
	$auteur = htmlspecialchars($_POST["auteur"]);
	$public = htmlspecialchars($_POST["public"]);
	if($public == "on")
	{
		$public = '1';
	}
	else
	{
		$public = '0';
	}
	$fichier = $_FILES["fichier"]['name'];
	$date = date("Y-m-d");

	// Mauvais type
	$type = substr($fichier, -3);
	if($type != "nds" && $type != "zip" && $type != "lua")
	{
	?>
	
<fieldset style = "width: 700px; background-color: #FF601C; font-size: 14px">
	Extension not accepted
</fieldset>
<br/>

	<?php
	}

	// OK
	else if($_FILES["fichier"]["error"] == 0 && !empty($nom) && $nom != "nom" && !empty($auteur) && $auteur != "auteur")
	{
		mysql_query("INSERT INTO homebrew VALUES ('', '$nom', '$version', '$auteur', '$site', '$date', '0', '0', '0', '$code', '$fichier', '$public')") or die (mysql_error());
		$id = mysql_insert_id();
		$code = strtr("$id", array("1" => "A ", "2" => "B ", "3" => "L ", "4" => "R ", "5" => "X ", "6" => "Y ", "7" => "&uarr; ", "8" => "&darr; ", "9" => "&larr; ", "0" => "&rarr; "));
		mysql_query("UPDATE homebrew SET code = '$code' WHERE id = '$id'") or die (mysql_error());
		mkdir("./homebrew/$id");
		move_uploaded_file($_FILES["fichier"]["tmp_name"], "./homebrew/$id/$fichier");
		// Dézipper les zip
		if($type == "zip")
		{
			$path = "./homebrew/$id/unzip/";
			mkdir("./homebrew/$id/unzip");
			$tab_liste_fichiers = array();
			$zip = zip_open("./homebrew/$id/$fichier");
			if($zip)
			{
				// Pour chaque fichier contenu dans le fichier zip
				while($zip_entry = zip_read($zip))
				{
					if(zip_entry_filesize($zip_entry) > 0)
					{
						$complete_path = $path.'/'.dirname(zip_entry_name($zip_entry));

						// On supprime les éventuels caractères spéciaux et majuscules
						$nom_fichier = zip_entry_name($zip_entry);
						//$nom_fichier = strtr($nom_fichier,"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ","AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn");
						//$nom_fichier = strtolower($nom_fichier);
						//$nom_fichier = ereg_replace('[^a-zA-Z0-9.]','-',$nom_fichier);

						// On ajoute le nom du fichier dans le tableau
						array_push($tab_liste_fichiers,$nom_fichier);

						// Nom et chemin de destination
						$complete_name = $path."/".$nom_fichier;

						if(!file_exists($complete_path))
						{
							$tmp = '';
							foreach(explode('/',$complete_path) AS $k)
							{
								$tmp .= $k.'/';
								
								if(!file_exists($tmp))
								{
									mkdir($tmp, 0755);
								}
							}
						}

						// On extrait le fichier
						if(zip_entry_open($zip, $zip_entry, "r"))
						{
							$fd = fopen($complete_name, 'w');
							fwrite($fd, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry)));
							fclose($fd);
							zip_entry_close($zip_entry);
						}
					}
				}
				zip_close($zip);
				var_dump($tab_liste_fichiers);
			}
		}
?>

<fieldset style = "width: 700px; background-color: #4BFF42; font-size: 14px">
	<br/>
	Homebrew sent!
	<br/>
	The DS download code is:
	<br/>
	<?php echo $code; ?>
	<br/>
</fieldset>
<br/>

<?php
	}
	// KO
	else
	{
?>

<fieldset style = "width: 700px; background-color: #FF601C; font-size: 14px">
	<br/>
	Incomplete form
	<br/>
</fieldset>
<br/>

<?php
	}
}
?>

<fieldset style = "width: 700px; background-color: white;">
	<span style = "font-size: 40px;">
		homebreWifi
	</span>
	<br/>
	The DS homebrew that downloads DS homebrews!
	<br/>
	~ Created by Xem with <a href = "http://www.palib-dev.com">PAlib</a> and <a href = "http://php.net">PHP</a> for the <a href = "http://nintendomax.com">Nintendomax DS Dev Compo 2010</a> ~
	<br/>
	~ Hosted by <a href = "http://vlexofree.com">VlexoFree.com</a> ~
</fieldset>

<br/>

<fieldset style = "width: 700px; background-color: white;">
	<a href = "homebrewifi.nds">Download the DS application</a><br/> (beta 0.3 - english)
	
	<br/>
	<br/>
	<b><u>How to use it</u></b>
	<br/>
	- Setup the DS Wi-fi connexion
	<br/>
	- Download the DS app HomebreWifi (up there)
	<br/>
	- Place it on your linker
	<br/>
	- Uploader or chose a homebrew on this page
	<br/>
	- Reproduce the code on your DS
	<br/>
	- Enjoy!
</fieldset>

<br/>

<fieldset style = "width: 700px; background-color: white;">
	<span style = "font-size: 20px;">
		Send a homebrew
	</span>
	<br/>
	Accepted: .nds, .zip, .lua. No commercial roms.
	<br/>
	The ZIP archives will be autmatically unzipped on your DS!
	<br/>
	You can send projects, works in progress, tests, for yourself.
	<br/>
	To share your homebrew with the whole world, check "public".
	<br/>
	<br/>
	<form method = "POST" action = "." enctype="multipart/form-data">
	<input type = "text" name = "nom" value = "name" onclick = "this.value=''" style = "width: 290px">
	<input type = "text" name = "version" value = "version" onclick = "this.value=''" style = "width: 50px">
	<input type = "text" name = "site" value = "official website" onclick = "this.value=''" style = "width: 200px">
	<br/>
	<input type = "text" name = "auteur" value = "author" onclick = "this.value=''" style = "width: 140px">
	Public <input type = "checkbox" name = "public">
	Fichier <input type = "file" name = "fichier">
	<input type = "submit" value = "Send">
	</form>
</fieldset>

<br/>
<?php
// Liste
$order = isset($_GET['order']) ? htmlspecialchars ( $_GET['order'] ) : 'nom';
$liste = mysql_query("SELECT *, (note/votes) AS score FROM homebrew WHERE public = 1 ORDER BY $order");
?>

<fieldset style = "width: 700px; background-color: white;">
	<span style = "font-size: 20px;">
		Homebrews list
	</span>
	<br/>
	To download a homebrew on your PC: right click, and "save as..."
	<br/>
	<table border = 1 cellspacing = 0 cellpadding = 2 width = 680 style = "text-align: center; font-size: 12px;"">
		<tr bgcolor = "lightgray">
			<th><a href = "index-en.php" style = "color: black">Homebrew</a></th>
			<th>Version</th>
			<th><a href = "index-en.php?order=auteur" style = "color: black">Auteur</a></th>
			<th>Website</th>
			<th><a href = "index-en.php?order=date" style = "color: black">Added</a></th>
			<th>Code on DS</th>
		</tr>
		<?php
			while($homebrew = mysql_fetch_array($liste))
			{
		?>

		<tr>
			<td><a href = "homebrew/<?php echo $homebrew["id"];?>/<?php echo $homebrew["fichier"];?>" target = "_blank"><?php echo $homebrew["nom"];?></a></td>
			<td><?php echo $homebrew["version"];?>&nbsp;</td>
			<td><?php echo $homebrew["auteur"];?>&nbsp;</td>
			<td><a href = "<?php echo $homebrew["site"];?>" target = "_blank">see</td>
			<td><?php echo $homebrew["date"];?>&nbsp;</td>
			<td><?php echo $homebrew["code"];?>&nbsp;</td>
		</tr>

		<?php
			}
		?>
	</table>
</fieldset>
<br/>
<div style="text-align:center;"><script type="text/javascript" src="http://services.supportduweb.com/cpt_visites/16176-1-6.js"></script></div><a href="http://www.supportduweb.com/" style="display:block;text-align:center;" title="Outils Services Compteurs G&eacute;n&eacute;rateurs Codes-sources... gratuits pour vos sites"></a>
</center>
</body>
</html>