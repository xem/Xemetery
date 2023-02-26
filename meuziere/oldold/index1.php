<!--?php
    $ip = $_SERVER["REMOTE_ADDR"];
	$localisation = gethostbyaddr($ip);
	$to      = 'max.06.87@gmail.com';
    $subject = 'visite de meuziere.free.fr';
    $message = $localisation;
    $headers = 'From: meuziere@free.fr' . "\r\n" .
    'Reply-To: xema87@free.fr' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

     mail($to, $subject, $message, $headers);
 ?!-->

 <html>
	<head>
		<title>Maxime Euzière</title>
		<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
	</head>
	<body style = "font-family: 'Trebuchet MS'">
		<center>
			<table height = "100%">
				<tr>
					<td valign = "middle">
						<center>
							<font size = 4>
								<b>Maxime Euzière</b>
							</font>
							<br/>
							<br/>
							<table>
								<tr>
									<td> Jeux </td>
								</tr>
								<tr>
									<td> Vidéo </td>
								</tr>
								<tr>
									<td> Web </td>
								</tr>
							</table>
							
							<!-- fieldset style = "width: 820px; height: 245px">
								<table>
									<tr>
										<td>
											<fieldset style = "width: 250px; height: 225px">
												<center>
												<b>
													Projet scolaire terminé (Flash)
													<br>
													Polytech-o-Scan
												</b>
												<br/>
												<br/>
												<img src = "screen1.PNG">
												<br/>
												<br/>
												<a href = "polytech-o-scan.html"> Jouer </a> - <a href = "polytech-o-scan.exe"> Télécharger </a>
												</center>
											</fieldset>
										</td>
										<td>
											<fieldset style = "width: 250px; height: 225px">
												<center>
												<b>
													Projet en cours (Flash)
													<br>
													Easy Classic Flash Game
												</b>
												<br/>
												<br/>
												<img src = "screen2.PNG">
												<br/>
												<br/>
												<a href = "easy.html"> Jouer </a> - <a href = "easy.exe"> Télécharger </a>
												</center>
											</fieldset>
										</td>
										<td>
											<fieldset style = "width: 250px; height: 225px">
												<center><b>
													Projet en cours (Nintendo DS)
													<br>
													Karoshi DS <font size = 1> avec Jesse Venbrux </font>
												</b>
												<br/>
												<br/>
												<img src = "screen3.PNG">
												<br/>
												<br/>
												<a href = "karoshi.html"> Screenshots </a> - <a href = "http://www.venbrux.com"> Site officiel </a>
												</center>
											</fieldset>
										</td>
									</tr>
								</table>
							</fieldset -->
						</center>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>