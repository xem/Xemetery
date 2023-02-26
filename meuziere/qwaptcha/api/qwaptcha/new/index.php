<?php

include_once("../../../questions.php");

// Current question
$qwaptcha_id = rand(0,2);

?>
{
	"qwaptcha_id": "<?php echo $qwaptcha_id ?>",
    "qwaptcha_question": "<?php echo $qwaptcha_questions[$qwaptcha_id][0] ?>"
}