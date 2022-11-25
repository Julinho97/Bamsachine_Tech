<?php
    include('../config.php');
	$leNum =intval($_GET['num']);
	$rDelete = $pdo->prepare("DELETE FROM `messages` WHERE `id_msg` = ?");
	$done = $rDelete->execute(array($leNum));
	if ($done) {
		echo"<script>alert('Message supprimé avec succès!');</script>";
		header("Location: messages.php");
		exit();
	}else{
		echo "<script>alert('Erreur!');</script>";
	}
?>