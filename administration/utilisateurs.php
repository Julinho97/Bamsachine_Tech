<?php
	session_start();
    include('../config.php');
    if(empty($_SESSION['num'])){
        header('location:index.php');

    }

	if (isset($_COOKIE['__lingomin'])) {
        $leNum = intval($_COOKIE['__lingomin']);
        $requeteAdmin = $pdo->prepare("SELECT * FROM `administration` WHERE id_admin = ?");
        $requeteAdmin->execute(array($leNum));
        $adminInfo = $requeteAdmin->fetch();
        $username =  $adminInfo['admin_name'];
        $adr_mail = $adminInfo['adr_mail'];
    }else{
        header("Location: index.php");
        exit();
    }
	#REQUÊTE DU NB USER
    $rUser = $pdo->prepare("SELECT * FROM `utilisateurs`");
    $rUser->execute();
    $nbUser = $rUser->rowCount();
    /*LISTE USER*/
    $listeUser = $rUser->fetchAll();
?>
<!DOCTYPE html>
<html>

<style>
#infos .box-info{
    position: relative;
    top: -5vh;
    left: 38.6vh;
    height: 10vh;
}
#infos .box-info .chiffres{
    position: relative;
    top: -5vh;
}
</style>
<head>
	<title>Bamsachine Tech - Administration</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/admi.css">


    	<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../img/path/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/path/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../css/path/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="../css/path/line-awesome.min.css">
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="../css/path/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="../css/path/style.css">
	

</head>
<body>
	<!--INCLUSION-->
    <?php include("heade.php");?>
    <div id ="infos">
        <div class="box-info">
            <p class="entetes">Nombre total d'inscrits</p>
            <p class="chiffres"><?php echo $nbUser;?></p>
        </div>
        <div id="search">
        	<form id="fSearch" method="post" action="">
        		<input type="text" name="boxSearch" title="Recherche" placeholder="Recherche" id="box-search" value="<?php if (isset($recherche)) echo $recherche;?>"/>
        		<input type="submit" name="btnSearch" id="btnSearch" value="" />
        	</form>
        	<?php
        		if (isset($_POST['btnSearch'])) {
        			if (!empty($_POST['boxSearch'])) {
        				$recherche = htmlspecialchars($_POST['boxSearch']);
        				$rUser = $pdo->prepare("SELECT * FROM `utilisateurs` WHERE `nom_user` = :recherche OR `prenoms_user` = :recherche OR `num_tel` = :recherche OR `adr_mail` = :recherche");
        				$rUser->bindValue(':recherche', $recherche, PDO::PARAM_STR);
    					$rUser->execute();
    					$listeUser = $rUser->fetchAll();

        			}
        		}
        	?>
        </div>
    </div>
    <center>
    <div id="corps">
    	<p class="title">Liste des utilisateurs </p>
            <table class="tble" cellpadding="0" cellspacing="0" border="0" id="t4">
                <tr class="entete">
                    <td align="center">Numéro</td>
                    <td> Prénoms & Nom</td>
                    <td align="center">Téléphone</td>
                	<td>Adresse E-mail</td>
                	<td align="center">Opération</td>
                </tr>
                <?php
                    $i = 1;
                    foreach ($listeUser as $user) {
                        echo "
                            <tr class='infos'>
                                <td align='center'>".$i."</td>
                                <td>".$user['prenoms_user']."  ".$user['nom_user']."</td>
                                <td align='center'>".$user['num_tel']."</td>
                                <td>".$user['adr_mail']."</td>
                                <td align='center'><a href='srp_usr.php?num=".$user['id_user']."' id='supprimer'>Supprimer</a></td>
                            </tr>";
                        $i++;
                    }   
                ?>
            </table>
    </div>
    </center>



    
     <script src="../js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="../js/jquery.slimscroll.min.js"></script>
		
		<!-- Chart JS -->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael.min.js"></script>
		<script src="../js/chart.js"></script>
		
		<!-- Custom JS -->
		<script src="../js/app.js"></script>
		
</body>
</html>