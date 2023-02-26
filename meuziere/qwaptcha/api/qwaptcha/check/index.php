<?php

include_once("../../../questions.php");

// Wrong answer
$validation = "false";

// After submitting an answer:
if(isset($_GET["qwaptcha_id"]) && isset($_GET["qwaptcha_answer"])){
	
	// Read GET params
	$id = strtolower(addslashes($_GET["qwaptcha_id"]));
	$answer = strtolower(addslashes($_GET["qwaptcha_answer"]));

	// Test input
	if(in_array($answer, $qwaptcha_questions[$id][1])){
		$validation = "true";
	}
}

?>
{
	"qwaptcha_validation": "<?php echo $validation ?>"
}