<?php

require_once("classes/User.php");
$user = new User();
$user->user_logout();
Functions::redirect("index.php");
?>

