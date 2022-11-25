<?php
    include('../config.php');
	$leNum =intval($_GET['id_type']);
	$rDelete = $pdo->prepare("DELETE FROM `type_immob` WHERE `id_type` = ?");
	$done = $rDelete->execute(array($leNum));
	if ($done) {
		echo"<script>alert('Type supprimé avec succès!');</script>";
		header("Location: others.php");
	}else{
		echo "<script>alert('Erreur!');</script>";
	}
?>