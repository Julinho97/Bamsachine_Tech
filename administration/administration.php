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
    $rUser = $pdo->prepare("SELECT * FROM `utilisateurs` order by `id_user` DESC");
    $rUser->execute();
    $nbUser = $rUser->rowCount();
    #REQUÊTE DU NB ANNONCE
    $rAnnonce = $pdo->prepare("SELECT * FROM `annonces` order by `id_ann` DESC");
    $rAnnonce->execute();
    $nbAnnonce = $rAnnonce->rowCount();
    #REQUÊTE DU NB MESSAGE
    $rMsg = $pdo->prepare("SELECT * FROM `messages` order by `id_msg` DESC");
    $rMsg->execute();
    $NbMsg = $rMsg->rowCount();
    /*LISTE USER*/
    $listeUser = $rUser->fetchAll();
    /*LISTE ANNONCE*/
    $listeAnnonce = $rAnnonce->fetchAll();
    /*LISTE MSG*/
    $listeMsg = $rMsg->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bamsachine Tech - Administration</title>
	<meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/admi.css"/>

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
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

</head>
<style>
#infos .box-info{
    position: relative;
    top: 7vh;
    height: 10vh;
}
#infos .box-info .chiffres{
    position: relative;
    top: -5vh;
}

</style>

<body>
	<!--INCLUSION-->
    <?php include("heade.php");?>
    <div id ="infos" >
        <div class="box-info">
            <p class="entetes">Nombre total d'inscrits</p>
            <p class="chiffres"><?php echo $nbUser;?></p>
        </div>
        <div class="box-info">
            <p class="entetes">Nombre d'annonces publiées</p>
            <p class="chiffres"><?php echo $nbAnnonce;?></p>
        </div>
        <div class="box-info">
            <p class="entetes">Nombre de messages reçus</p>
            <p class="chiffres"><?php echo $NbMsg;?></p>
        </div>
    </div>
    <div id="boxes">
        <div id="utilisateurs" class="display">
            <p class="title">Liste des derniers utilisateurs inscrits</p>
            <table class="tble" cellpadding="0" cellspacing="0" border="0" id="t1">
                <tr class="entete">
                    <td align="center">Numéro</td>
                    <td>Adresse E-mail</td>
                    <td align="center">Téléphone</td>
                </tr>
                <?php
                    $i = 1;
                    foreach ($listeUser as $user) {
                        echo "
                            <tr class='infos'>
                                <td align='center'>".$i."</td>
                                <td>".$user['adr_mail']."</td>
                                <td align='center'>".$user['num_tel']."</td>
                            </tr>";
                        $i++;
                        if ($i > 5) {
                            break;
                        } 
                    }   
                ?>
            </table>
        </div>
        
        <div id="messages" class="display">
            <p class="title">Listes des derniers messages reçues</p>
            <table class="tble" cellpadding="0" cellspacing="0" border="0" id="t3">
                <tr class="entete">
                    <td align="center">Numéro</td>
                    <td>Objet</td>
                    <td>Nom & Prénoms</td>
                    <td>E-mail</td>
                </tr>
                <?php
                    $i = 1;
                    foreach ($listeMsg as $msg) {
                        echo "
                            <tr class='infos'>
                                <td align='center'>".$i."</td>
                                <td>".$msg['objet']."</td>
                                <td>".$msg['nom_evy']." ".$msg['prenoms_evy']."</td>
                                <td>".$msg['adr_mail']."</td>
                            </tr>";
                        $i++;
                        if ($i > 5) {
                            break;
                        } 
                    }   
                ?>
            </table>
        </div>

        <div id="annonces" class="display">
            <p class="title">Liste des dernières annonces publiées</p>
            <table class="tble" cellpadding="0" cellspacing="0" border="0" id="t2">
                <tr class="entete">
                    <td align="center">Numéro</td>
                    <td>Titre</td>
                    <td>Téléphone annonceur</td>
                    <td>E-mail annonceur</td>
                </tr>
                <?php
                    $i = 1;
                    foreach ($listeAnnonce as $annonce) {
                        $id_user = $annonce['id_user'];
                        #REQUETE DES INFOS DES ANNONCEURS
                        $rInfos = $pdo->prepare("SELECT `num_tel`, `adr_mail` FROM `utilisateurs` WHERE `id_user` = ?");
                        $rInfos->execute(array($id_user));
                        $infos = $rInfos->fetch();
                        $numero = $infos['num_tel'];
                        $adresse = $infos['adr_mail'];
                        echo "
                            <tr class='infos'>
                                <td align='center'>".$i."</td>
                                <td>".$annonce['titre_ann']."</td>
                                <td>".$numero."</td>
                                <td>".$adresse."</td>
                            </tr>";
                        $i++;
                        if ($i > 5) {
                            break;
                        } 
                          if ($id_user==0){
$rDelete = $pdo->prepare("DELETE FROM `annonces` WHERE `id_ann` = ");
	$done = $rDelete->execute(array($leNum));
                    }
                   else{$i = 0   ;} 
                    }
                ?>
            </table>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>



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
		<!-- javascript links ends here  -->
</body>
</html>
