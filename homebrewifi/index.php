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
<a href = "index-en.php">[English]</a>
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
	Extension non acceptée
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
	Le homebrew a bien été envoyé!
	<br/>
	Le code de téléchargement sur DS est:
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
	Formulaire incomplet
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
	Le homebrew DS de téléchargement d'homebrews DS!
	<br/>
	~ Développé par Xem avec <a href = "http://www.palib-dev.com">PAlib</a> et <a href = "http://php.net">PHP</a> pour la <a href = "http://nintendomax.com">Nintendomax DS Dev Compo 2010</a> ~
	<br/>
	~ Hébergé par <a href = "http://vlexofree.com">VlexoFree.com</a> ~
</fieldset>

<br/>

<fieldset style = "width: 700px; background-color: white;">
	<a href = "homebrewifi.nds">Télécharger l'application DS</a><br/> (bêta 0.3 - français)
	
	<br/>
	<br/>
	<b><u>Mode d'emploi</u></b>
	<br/>
	- Configurer la CWF de sa DS
	<br/>
	- Télécharger l'application DS HomebreWifi (ci-dessus)
	<br/>
	- Placer celle-ci sur son linker
	<br/>
	- Uploader ou choisir un homebrew sur cette page
	<br/>
	- Reproduire le code du homebrew sur sa DS
	<br/>
	- Enjoy!
</fieldset>

<br/>

<fieldset style = "width: 700px; background-color: white;">
	<span style = "font-size: 20px;">
		Envoyer un homebrew
	</span>
	<br/>
	Formats acceptés: .nds, .zip, .lua. Pas de roms commerciales.
	<br/>
	Les archives ZIP seront automatiquement décompressées sur DS!
	<br/>
	Vous pouvez envoyer des projets, tests, ... juste pour vous.
	<br/>
	Pour partager un homebrew avec le monde entier, cocher "public".
	<br/>
	<br/>
	<form method = "POST" action = "." enctype="multipart/form-data">
	<input type = "text" name = "nom" value = "nom" onclick = "this.value=''" style = "width: 290px">
	<input type = "text" name = "version" value = "version" onclick = "this.value=''" style = "width: 50px">
	<input type = "text" name = "site" value = "site officiel" onclick = "this.value=''" style = "width: 200px">
	<br/>
	<input type = "text" name = "auteur" value = "auteur" onclick = "this.value=''" style = "width: 140px">
	Public <input type = "checkbox" name = "public">
	Fichier <input type = "file" name = "fichier">
	<input type = "submit" value = "Envoyer">
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
		Liste des homebrews
	</span>
	<br/>
	Pour télécharger un homebrew sur PC: clic droit sur son nom puis "enregistrer la cible sous..."
	<br/>
	<table border = 1 cellspacing = 0 cellpadding = 2 width = 680 style = "text-align: center; font-size: 12px;"">
		<tr bgcolor = "lightgray">
			<th><a href = "index.php" style = "color: black">Homebrew</a></th>
			<th>Version</th>
			<th><a href = "index.php?order=auteur" style = "color: black">Auteur</a></th>
			<th>Site</th>
			<th><a href = "index.php?order=date" style = "color: black">Ajouté le</a></th>
			<th>Code DS</th>
		</tr>
		<?php
			while($homebrew = mysql_fetch_array($liste))
			{
		?>

		<tr>
			<td><a href = "homebrew/<?php echo $homebrew["id"];?>/<?php echo $homebrew["fichier"];?>" target = "_blank"><?php echo $homebrew["nom"];?></a></td>
			<td><?php echo $homebrew["version"];?>&nbsp;</td>
			<td><?php echo $homebrew["auteur"];?>&nbsp;</td>
			<td><a href = "<?php echo $homebrew["site"];?>" target = "_blank">voir</td>
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