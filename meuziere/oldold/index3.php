<?php
    $ip = $_SERVER["REMOTE_ADDR"];
	$localisation = gethostbyaddr($ip);
	$to      = 'max.06.87@gmail.com';
    $subject = 'visite de meuziere.free.fr';
    $message = $localisation;
    $headers = 'From: meuziere@free.fr' . "\r\n" .
    'Reply-To: xema87@free.fr' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);
 ?>

 <html>
	<head>
		<title>Maxime Euzière</title>
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
	</head>
	<body style = "font-family: 'Trebuchet MS';">
	<script>
		function show(partie)
		{
			document.getElementById('jeux').style.display = "none";
			document.getElementById('video').style.display = "none";
			document.getElementById('web').style.display = "none";
			document.getElementById('graphisme').style.display = "none";
			document.getElementById('liens').style.display = "none";
			document.getElementById('cv').style.display = "none";
			document.getElementById(partie).style.display = "table";
		}
	</script>
		<center>
			<table height = "100%">
				<tr>
					<td valign = "middle">
						<center>
							<b>Maxime Euzière</b> 2008-2010
							<table cellpadding = 0 width = 1100 height = 600 style = "font-size: 11pt;">
								<tr>
									<td width = 200 height = 200 onmouseOver = "show('jeux')">
										<center> 
										Jeux
										<img src = "manette.jpg">
										</center>
									</td>
									<td width = 0>
										<center>
											<table id = "jeux" width = 670 cellpadding = 2 style = "font-size: 8pt; background-color: #DDDDDD; display: none">
												<tr>
													<td>
														<center>
														<b>
															<br/>
															rojet scolaire terminé (Flash)
															<br>
															Polytech-o-Scan
														</b>
														<br/>
														<img src = "screen1.PNG">
														<br/>
														<a href = "polytech-o-scan.html"> Jouer </a> - <a href = "polytech-o-scan.exe"> Télécharger </a>
														</center>
													</td>
													<td>
														<center>
														<b>
															<br/>
															Projet en cours (Flash)
															<br>
															Easy Classic Flash Game
														</b>
														<br/>
														<img src = "screen2.PNG">
														<br/>
														<a href = "easy.html"> Jouer </a> - <a href = "easy.exe"> Télécharger </a>
														</center>
													</td>
													<td>
														<center>
														<b>
															<br/>
															Projet en cours (Nintendo DS)
															<br>
															Karoshi DS (avec Jesse Venbrux)
														</b>
														<br/>
														<img src = "screen3.PNG">
														<br/>
														<a href = "karoshi.html"> Screenshots </a> - <a href = "http://www.venbrux.com"> Site officiel </a>
														</center>
													</td>
												</tr>
											</table>
											<table id = "graphisme" width = 670 cellpadding = 2 style = "font-size: 8pt; background-color: #DDDDDD; display: none">
												<tr>
													<td>
														<center>
														<b>
															<br/>
															Ambigrammes
														</b>
														<br/>
														<img src = "screen10.PNG">
														<br/>
														<a href = "http://fr.wikipedia.org/wiki/Ambigramme" target = "_blank"> Définition </a> - <a href = "ambigrammes.html"> Voir </a>
														<br/>
														&nbsp;
														</center>
													</td>
													<td>
														<center>
														<b>
															<br/>
															Dessin
														</b>
														<br/>
														<img src = "screen11.PNG">
														<br/>
														Bientôt disponible
														<br/>
														&nbsp;
														</center>
													</td>
													<td>
														<center>
														<b>
															<br/>
															Origami/Pop-up
														</b>
														<br/>
														<img src = "screen12.PNG">
														<br/>
														Bientôt disponible
														<br/>
														&nbsp;
														</center>
													</td>
												</tr>
											</table>
										</center>
									</td>
									<td width = 200 onmouseOver = "show('graphisme')">
										<center> 
										Graphisme
										<img src = "graphisme.jpg">
										</center>
									</td>
								</tr>
								<tr>
									<td height = 200 onmouseOver = "show('video')">
										<center>
										Vidéo
										<img src = "camera.jpg">
										</center>
									</td>
									<td>
										<center>
											<table id = "video" width = 670 cellpadding = 2 style = "font-size: 8pt; background-color: #DDDDDD; display: none">
												<tr>
													<td>
														<center>
														<b>
															Stage - Montage vidéo et 
															<br/>
															création de DVD pour 
															<br/>
															footballeurs professionnels
														</b>
														<br/>
														<img src = "screen4.PNG">
														<br/>
														<a href = "http://www.videoprofile.fr" target = "_blank"> Site officiel </a>
														</center>
													</td>
													<td>
														<center>
														<b>
															Projet scolaire- Présentation 
															<br/> 
															de Polytech'Nice Sophia
															<br/>
															(prise de vue, montage)
														</b>
														<br/>
														<img src = "screen5.PNG">
														<br/>
														<a href = "http://www.youtube.com/watch?v=szHarYuHVeE" target = "_blank"> Voir </a>
														</center>
													</td>
													<td>
														<center>
														<b>
															Lipdub - I Gotta Feeling
															<br/>
															Récompensé au lipdub festival
															<br/>
															(prise de vue)
														</b>
														<br/>
														<img src = "screen6.PNG">
														<br/>
														<a href = "http://vimeo.com/7806955" target = "_blank"> Voir </a> - <a href = "http://www.lipdub-festival.com/" target = "_blank"> Site officiel </a>
														</center>
													</td>
												</tr>
											</table>
											<table id = "liens" width = 670 cellpadding = 2 style = "font-size: 8pt; background-color: #DDDDDD; display: none">
												<tr>
													<td>
														<center>
														<b>
															<br/>
															PHP (Web)
														</b>
														<br/>
														<img src = "screen13.PNG">
														<br/>
														<a href = "http://www.php.net" target = "_blank"> Site officiel</a>
														<br/>
														&nbsp;
														</center>
													</td>
													<td>
														<center>
														<b>
															<br/>
															Flash (Web)
														</b>
														<br/>
														<img src = "screen14.PNG">
														<br/>
														<a href = "http://www.adobe.fr" target = "_blank"> Site officiel</a>
														<br/>
														&nbsp;
														</center>
													</td>
													<td>
														<center>
														<b>
															<br/>
															PAlib (DS)
														</b>
														<br/>
														<img src = "screen15.PNG">
														<br/>
														<a href = "http://www.palib-dev.com" target = "_blank"> Site officiel</a>
														<br/>
														&nbsp;
														</center>
													</td>
													<td>
														<center>
														<b>
															<br/>
															XNA (PC & XBOX)
														</b>
														<br/>
														<img src = "screen16.PNG">
														<br/>
														<a href = "http://creators.xna.com" target = "_blank"> Site officiel</a>
														<br/>
														&nbsp;
														</center>
													</td>
												</tr>
											</table>
										</center>
									</td>
									<td onmouseOver = "show('liens')">
										<center> 
										Liens
										<img src = "liens.jpg">
										</center>
									</td>
								</tr>
								<tr>
									<td height = 200 onmouseOver = "show('web')">
										<center>
										Web
										<img src = "arobase.jpg">
										</center>
									</td>
									<td>
										<center>
											<table id = "web" width = 670 cellpadding = 2 style = "font-size: 8pt; background-color: #DDDDDD; display: none">
												<tr>
													<td>
														<center>
														<b>
															Stage - Site intranet national
															<br/>
															de gestion des réservoirs d'eau
															<br/>
															à la Lyonnaise des Eaux: "SERVO"
														</b>
														<img src = "screen7.PNG">
														<br/>
														<a href = "servo.html"> Screenshots </a>
														</center>
													</td>
													<td>
														<center>
														<b>
															Projet en cours: 1RL
															<br/>
															raccourcisseur d'URL
															<br/>
															instantané
														</b>
														<img src = "screen8.PNG">
														<br/>
														<!--a href = "http://www.1RL.fr"> Voir </a-->
														Bientôt disponible
														</center>
													</td>
													<td>
														<center>
														<b>
															Apprentissage - Projet en cours
															<br>
															Plateforme de gestion et de suivi
															<br/>
															de campagnes de pub sur Internet
														</b>
														<img src = "screen9.PNG">
														<br/>
														Sortie en Septembre
														</center>
													</td>
												</tr>
											</table>
											<table id = "cv" width = 670 cellpadding = 2 style = "font-size: 8pt; background-color: #DDDDDD; display: none">
												<tr>
													<td>
														<center>
														<br/>
														<br/>
														<br/>
														<br/>
														<br/>
														<a href = "CV.pdf">Télécharger</a> (.pdf, 1.2MB)
														<br/>
														<br/>
														<br/>
														<br/>
														<br/>
														<br/>
														</center>
													</td>
												</tr>
											</table>
										</center>
									</td>
									<td onmouseOver = "show('cv')">
										<center> 
										CV
										<img src = "cv.jpg">
										</center>
									</td>
								</tr>
							</table>
						</center>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>