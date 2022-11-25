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
        echo'<script>document.location.replace("index.php");</script>';

        exit();
    }
	#REQUÊTE DU NB USER
    $rMsg = $pdo->prepare("SELECT * FROM `messages`");
    $rMsg->execute();
    $nbMsg = $rMsg->rowCount();
    /*LISTE USER*/
    $listeMsg = $rMsg->fetchAll();

    #VERIFICATION DU NUMERO DU MESSAGE RECU DEPUIS LA BARRE D_ADRESSE
    if (isset($_GET['num']) AND is_numeric($_GET['num']) AND intval($_GET['num']) <= $nbMsg) {
        $leNum = intval($_GET['num']);
        $rMsg = $pdo->prepare("SELECT `message` FROM `messages` WHERE `id_msg` = :num");
        $rMsg->bindValue(':num', $leNum, PDO::PARAM_INT);
        $rMsg->execute();
        $corpsMsg = $rMsg->fetch();
        $leMsg = $corpsMsg['message'];
        		
    }elseif (empty($_GET['num'])) {
        $leMsg = "Sélectionner un message";
    }
    else{
        $erreur = "Erreur de message!";
    }	
    	
?>
<!DOCTYPE html>
<html>

<style>
#infos .box-info{
    position: relative;
    top: 1vh;
    left: 27vh;
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
            <p class="entetes">Nombre de messages reçues</p>
            <p class="chiffres"><?php echo $nbMsg;?></p>
        </div>
    </div>
    <center>
    <div id="corps1">
    	<p class="title">Liste des messages </p>
        <table class="tble" cellpadding="0" cellspacing="0" border="0" id="t5">
            <tr class="entete">
                <td align="center">Numéro</td>
                <td>Objet</td>
                <td>Nom & Prénoms</td>
                <td align="center">Téléphone</td>
            	<td>Adresse E-mail</td>
            	<td align="center" colspan="2">Opérations</td>
            </tr>
            <?php
                $i = 1;
                foreach ($listeMsg as $msg) {
                    echo "
            	        <tr class='infos'>
                        	<td align='center'>".$i."</td>
                        	<td>".$msg['objet']."</td>
                        	<td>".$msg['prenoms_evy']." ".$msg['nom_evy']."</td>
                	    	<td align='center'>".$msg['num_tel_evy']."</td>
                       		<td>".$msg['adr_mail']."</td>
                        	<td align='center'><a href='messages.php?num=".$msg['id_msg']."' id='details'>Détails</a></td>
                        	<td align='center'><a href='srp_msg.php?num=".$msg['id_msg']."' id='supprimer'>Supprimer</a></td>
                        </tr>";
                        $i++;
                    }

               
                ?>
        </table>
        <div id="corps-msg">
        	<!--<textarea id="box-msg">-->
        		<p>
                    <?php
                        if (isset($leMsg)) {
                            echo $leMsg;
                        }
                        if (isset($erreur)) {
                            echo $erreur;
                        }
                    ?>
                    
                </p>
        	<!--</textarea>-->
        </div>
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