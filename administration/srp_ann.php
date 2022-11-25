<?php
    include('../config.php');
	$leNum =intval($_GET['num']);
	$rDelete = $pdo->prepare("DELETE FROM `annonces` WHERE `id_ann` = ?");
	$done = $rDelete->execute(array($leNum));
	if ($done) {
		echo"<script>alert('Annonce supprimé avec succès!');</script>";
		header("Location: annonces.php");
		exit();
	}else{
		echo "<script>alert('Erreur!');</script>";
	}
?>