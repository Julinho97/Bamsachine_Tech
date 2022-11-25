<?php
    include('../config.php');
	$leNum =intval($_GET['num']);
	$rDelete = $pdo->prepare("DELETE FROM `utilisateurs` WHERE `id_user` = ?");
	$done = $rDelete->execute(array($leNum));


	$leNum =intval($_GET['num']);
	$rDelete = $pdo->prepare("DELETE FROM `annonces` WHERE `id_ann` = ?");
	$done = $rDelete->execute(array($leNum));
	if ($done) {
		echo"<script>alert('Utilisateur supprimé avec succès!');</script>";
		header("Location: utilisateurs.php");
	}else{
		echo "<script>alert('Erreur!');</script>";
	}
?>