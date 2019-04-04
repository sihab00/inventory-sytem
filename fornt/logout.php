<?php
	include_once("./database/constant.php");

	if (isset($_SESSION['userid'])) {
		session_unset();
		session_destroy();
	}
	header("Location:".DOMAIN."/index.php");

?>