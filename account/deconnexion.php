<?php
	session_start();
	$_SESSION = array();
	session_destroy(); // destroy session
	echo'<script>document.location.replace("../connexion.php")</script>';
?>