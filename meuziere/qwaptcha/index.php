<?php

// Questions
include_once("questions.php");

// Current question
$new = file_get_contents("http://meuziere.free.fr/qwaptcha/api/qwaptcha/new");
$new = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $new);
$new = json_decode($new, true);
$qwaptcha_id = $new["qwaptcha_id"];
$qwaptcha_question = $new["qwaptcha_question"];

// Redirect
$redirect = "http://example.com";
if(isset($_GET["redirect"])){
	$redirect = $_GET["redirect"];
}

// Wrong answer
$error = false;

// After submitting an answer:
if(isset($_GET["qwaptcha_id"]) && isset($_GET["qwaptcha_answer"])){
	
	// Read GET params
	$id = strtolower(addslashes($_GET["qwaptcha_id"]));
	$answer = strtolower(addslashes($_GET["qwaptcha_answer"]));

	// Test input:
	$check = file_get_contents("http://meuziere.free.fr/qwaptcha/api/qwaptcha/check?qwaptcha_id=".$id."&qwaptcha_answer=".$answer);
	$check = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $check);
	$check = json_decode($check, true);

	// Success: redirect
	if($check['qwaptcha_validation'] == 'true'){
		header("location:" . $redirect);
	}
	
	// Fail: display this page again
	else {
		$error = true;
	}
}

?>
<!doctype html>
<meta charset="utf-8">
<form method="GET" action=".">

	<?php if($error){ ?>
	
	<span><b>Mauvaise réponse, veuillez réessayer!</b></span>
	
	<br>
	<br>
	
	<?php } ?>
	
	Une activité anormale a été détectée en provenance de votre ordinateur.
	
	<br>
	<br>
	
	Veuillez répondre à la question suivante pour continuer:
	
	<br>
	<br>
	
	<input type="hidden" name="qwaptcha_id" value="<?php echo $qwaptcha_id ?>">
	<input type="hidden" name="redirect" value="<?php echo $redirect ?>">
	
	<b><?php echo $qwaptcha_questions[$qwaptcha_id][0] ?></b>

	<input type="text" name="qwaptcha_answer">
	
	<input type="submit">

</form>

<style>
form { display: block; width: 600px; margin: 20px auto; font-family: arial; border: 1px solid; padding: 20px; }
span { color: red }
</style>