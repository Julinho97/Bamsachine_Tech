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
    #REQUÊTE DES TYPES
    $rType = $pdo->prepare("SELECT * FROM `type_immob`");
    $rType->execute();
    $nbType = $rType->rowCount();
    /*LISTE DE TYPE DE BIEN IMMOBILIER*/
    $listeType = $rType->fetchAll();
    #REQUÊTE DES VILLES
    $rVille = $pdo->prepare("SELECT * FROM `villes`");
    $rVille->execute();
    $nbVille = $rVille->rowCount();
    /*LISTE DES VILLES*/
    $listeVille = $rVille->fetchAll();

    #SELECTION DU LIBELLE
    if (isset($_GET['id_type']) AND is_numeric($_GET['id_type']) AND intval($_GET['id_type']) <= $nbType) {
        $id_type = intval($_GET['id_type']);
        $rType = $pdo->prepare("SELECT `libelle_type` FROM `type_immob` WHERE `id_type` = :num");
        $rType->bindValue(':num', $id_type, PDO::PARAM_INT);
        $rType->execute();
        $corpsType = $rType->fetch();
        $libelle = $corpsType['libelle_type'];     
    }else{
        $leMsg = "Selectionnez un élément";
    }   
    #SELECTION DU NOM
    if (isset($_GET['id_ville']) AND is_numeric($_GET['id_ville']) AND intval($_GET['id_ville']) <= $nbVille) {
        $id_ville = intval($_GET['id_ville']);
        $rVille = $pdo->prepare("SELECT `nom_ville` FROM `villes` WHERE `id_ville` = :num");
        $rVille->bindValue(':num', $id_ville, PDO::PARAM_INT);
        $rVille->execute();
        $corpsVille = $rVille->fetch();
        $nom_ville = $corpsVille['nom_ville'];     
    }else{
       $leMsg = "Selectionnez un élément";
    }  
?>
<!DOCTYPE html>
<html>
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
<style>
#infos .box-info{
    position: relative;
    top: 6vh;
    height: 10vh;
    right: 17.3vh;
    margin-left: 44vh;
}
#infos .box-info .chiffres{
    position: relative;
    top: -5vh;
}
.modifier1{
        position: relative;
        right:-3.7vh;
        height: 2vh;
}
</style>

<body>
    <!--INCLUSION-->
    <?php include("heade.php");?>
    <div id ="infos">
        <div class="box-info">
            <p class="entetes">Nombre de biens</p>
            <p class="chiffres"><?php echo $nbType;?></p>
        </div>
        <div class="box-info">
            <p class="entetes">Nombre de villes </p>
            <p class="chiffres"><?php echo $nbVille;?></p>
        </div>
    </div>
     <center>
    <div id="ensemble">
    <div id="corps2" class="js-page">
        <p class="title">Liste des type de biens </p>
        <!--DEBUT DE LA FENÊTRE MODALE-->
        <main class="js-document">
            <button 
                class="new" 
                type="button" 
                aria-haspopup="dialog"
                aria-controls="dialog">Nouveau
            </button>
        </main>
        <center>
        <div 
            id="dialog"
            role="dialog" 
            aria-labelledby="dialog-title" 
            aria-describedby="dialog-desc"
            aria-modal="true"
            aria-hidden="true"
            tabindex="-1" 
            class="c-dialog"> 
            <div role="document" class="c-dialog_box">
                <button 
                    type="button" 
                    aria-label="Fermer" 
                    title="Fermer"
                    data-dismiss="dialog">x
                </button> 
                <!--FORMULAIRE D'AJOUT-->
                <?php
                    if (isset($_POST['btnSubmit2'])) {
                        if (!empty($_POST['nom_type']) AND !empty($_POST['password'])) {
                            $lib = htmlspecialchars($_POST['nom_type']);
                            $passe = htmlspecialchars($_POST['password']);
                            $pass_admin='admin';
                            if ($passe == $pass_admin) {
                                /*VERIFICATION DE L'EXISTANCE DE L_ELEMENT*/
                                $reqElt = $pdo->prepare("SELECT * FROM `type_immob` WHERE `libelle_type` = ?");
                                $reqElt->execute(array($lib));
                                $elmExiste = $reqElt->rowCount();
                                if ($elmExiste == 0) {
                                    $req = $pdo->prepare("INSERT INTO `type_immob` VALUES(null,?)");
                                    $done = $req->execute(array($lib));
                                    if ($done) {
                                        echo '<script>document.location.replace("others.php");</script>';
                                    }else{
                                        $erreur = "Erreur!";    
                                    }
                                }else{
                                    $erreur = "Le type existe déjà!";
                                }
                            }else{
                                $erreur = "Mot de passe incorrect!";    
                            }
                        }else{
                            $erreur = "Remplissez tous les champs";
                        }
                    }
                ?>
                <form id="ajoutType" method="post" action="" align="center">
                    <h2 id="dialog-title">Nouveau Type</h2>
                    <p id="dialog-desc"></p>
                    <input type="text" required placeholder="Libellé du type" maxlength="45" name="nom_type" class="input" value="<?php  if(isset($nom_type)) echo $nom_type ;?>" />
                    <input type="password" required placeholder="Votre mot de passe" maxlength="40" name="password" class="input"/>
                    <input type="submit" value="Ajouter" id="btnAjoutType" name="btnSubmit2"/>
                    <?php
                        if(isset($erreur)){
                        echo '<p style="color:red;" align="center" id="erreur">'.$erreur.'</p>';
                        }
                    ?>
                </form>
            </div>
        </div>
        </center>
        <!--FIN DE LA ¨FENÊTRE MODALE-->
            <table class="tble" cellpadding="0" cellspacing="0" border="0" id="t6">
                <tr class="entete">
                    <td align="center">Numéro</td>
                    <td>Libellé</td>
                    <td align="center" colspan="2">Opérations</td>
                </tr>
                <?php
                    $i = 1;
                    foreach ($listeType as $type) {
                        echo "
                            <tr class='infos'>
                                <td align='center'>".$i."</td>
                                <td>".$type['libelle_type']."</td>
                                <td  align='right'><a href='others.php?id_type=".$type['id_type']."' id='modifier'>Modifier</a></td>
                                <td align='right'><a href='srp_type.php?id_type=".$type['id_type']."' id='supprimer'>Supprimer</a></td>
                            </tr>";
                        $i++;
                    }   
                ?>
            </table>
            <?php
                if (isset($_POST['btnModif'])) {
                    if (isset($_POST['box-modif'])) {
                        $libelle = htmlspecialchars($_POST['box-modif']);
                        $rUpdate = $pdo->prepare("UPDATE `type_immob` SET `libelle_type`  = ? WHERE `id_type` = ?");
                        $rUpdate->execute(array($libelle, $id_type));
                echo '<script>document.location.replace("others.php");</script>';

                    
                    
                    }else{
                        $erreur = "Ecrivez quelque chose.";
                    }
                 
                }
            ?>
            <form id="f-modif" method="post" action="">
                <input type="text" name="box-modif" class="box-modif" placeholder="Libellé" value="<?php if(isset($libelle)) echo $libelle; ?>" />
                <input type="submit" name="btnModif" id="btnModif" value="Modifier"/>
                <?php
                    if(isset($erreur)){
                    echo '<p id="erreur">'.$erreur.'</p>';
                    }
                ?>
            </form>
    </div>
    <div id="corps3">
        <p class="title">Liste des villes </p>
               <!--DEBUT DE LA FENÊTRE MODALE-->
        <main class="js-document">
            <button 
                class="new" 
                type="button" 
                aria-haspopup="dialog1"
                aria-controls="dialog1">Nouveau
            </button>
        </main>
        <center>
        <div 
            id="dialog1"
            role="dialog" 
            aria-labelledby="dialog-title" 
            aria-describedby="dialog-desc"
            aria-modal="true"
            aria-hidden="true"
            tabindex="-1" 
            class="c-dialog"> 
            <div role="document" class="c-dialog_box">
                <button 
                    type="button" 
                    aria-label="Fermer" 
                    title="Fermer"
                    data-dismiss="dialog1">x
                </button> 
                <!--FORMULAIRE D'AJOUT-->
                <?php
                    if (isset($_POST['btnSubmit1'])) {
                        if (!empty($_POST['nom_ville']) AND !empty($_POST['password1'])) {
                            $nom = htmlspecialchars($_POST['nom_ville']);
                            $passe = htmlspecialchars($_POST['password1']);
                            $pass_admin='admin';
                            if ($passe == $pass_admin) {
                                /*VERIFICATION DE L'EXISTANCE DE L_ELEMENT*/
                                $reqElt = $pdo->prepare("SELECT * FROM `villes` WHERE `nom_ville` = ?");
                                $reqElt->execute(array($nom));
                                $elmExiste = $reqElt->rowCount();
                                if ($elmExiste == 0) {
                                    $req = $pdo->prepare("INSERT INTO `villes` VALUES(null,?)");
                                    $done = $req->execute(array($nom));
                                    if ($done) {
                                        echo '<script> document.location.replace("others.php");</script>'; 
                                    }else{
                                        $erreur = "Erreur!";    
                                    }
                                }else{
                                    $erreur = "La ville existe déjà!";
                                }
                            }else{
                                $erreur = "Mot de passe incorrect!";    
                            }
                        }else{
                            $erreur = "Remplissez tous les champs";
                        }
                    }
                ?>
                <form id="ajoutVille" method="post" action="" align="center">
                    <h2 id="dialog-title">Nouvelle Ville</h2>
                    <p id="dialog-desc"></p>
                    <input type="text" required placeholder="Nom de la ville" maxlength="45" name="nom_ville" class="input" value="<?php  if(isset($nom_ville)) echo $nom_ville ;?>" />
                    <input type="password" required placeholder="Votre mot de passe" maxlength="40" name="password1" class="input"/>
                    <input type="submit" value="Ajouter" id="btnAjoutVille" name="btnSubmit1"/>
                    <?php
                        if(isset($erreur)){
                        echo '<p style="color:red;" align="center" id="erreur">'.$erreur.'</p>';
                        }
                    ?>
                </form>
            </div>
        </div>
        </center>
            <table class="tble" cellpadding="0" cellspacing="0" border="0" id="t7">
                <tr class="entete">
                    <td align="center">Numéro</td>
                    <td>Nom</td>
                    <td align="center" colspan="2">Opérations</td>
                </tr>
            
                <?php
                    $i = 1;
                    foreach ($listeVille as $ville) {
                        echo "
                            <tr class='infos'>
                                <td align='center'>".$i."</td>
                                <td>".$ville['nom_ville']."</td>
                                <td align='right'><a href='others.php?id_ville=".$ville['id_ville']."' id='modifier' class='modifier1' >Modifier</a></td>
                                <td align='right'><a href='srp_ville.php?id_ville=".$ville['id_ville']."' id='supprimer'>Supprimer</a></td>
                            </tr>";
                        $i++;
                    }   
                ?>
            </table>
            <?php
                if (isset($_POST['btnModif1'])) {
                    if (!empty($_POST['box-modif1'])) {
                        $nom_ville = htmlspecialchars($_POST['box-modif1']);
                        $rUpdate = $pdo->prepare("UPDATE `villes` SET `nom_ville`  = ? WHERE `id_ville` = ?");
                        $rUpdate->execute(array($nom_ville, $id_ville));
                           echo '<script>document.location.replace("others.php");</script>';

                    }else{
                        $erreur = "Ecrivez quelque chose.";
                    }
                }
            ?>
            <form id="f-modif1" method="post" action="">
                <input type="text" name="box-modif1" class="box-modif" placeholder="Nom de la ville" value="<?php if(isset($nom_ville)) echo $nom_ville; ?>" />
                <input type="submit" name="btnModif1" id="btnModif1" value="Modifier"/>
                <?php
                    if(isset($erreur)){
                    echo '<p id="erreur">'.$erreur.'</p>';
                    }
                ?>
            </form>
    </div>
    </div>
    </center>
    <script type="text/javascript" src="modal.js"></script>
    <script type="text/javascript" src="modale.js"></script>


    
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