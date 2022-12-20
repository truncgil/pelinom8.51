<?php 
unset($_SESSION['authors'][get("index")]);
//dump($_SESSION['authors']);
?>
@include("admin.client.new-submission.step-1.author-list")