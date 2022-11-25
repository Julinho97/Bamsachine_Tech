<?php
    include('../config.php');
	$leNum =intval($_GET['id_ville']);
	$rDelete = $pdo->prepare("DELETE FROM `villes` WHERE `id_ville` = ?");
	$done = $rDelete->execute(array($leNum));
	if ($done) {
		echo"<script>alert('Ville supprimée avec succès!');</script>";
		header("Location: others.php");
	}else{
		echo "<script>alert('Erreur!');</script>";
	}
?>