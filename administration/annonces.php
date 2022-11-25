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

    #REQUETES DES ANNONCES
    $requeteAnnonce = $pdo->prepare("SELECT * FROM `annonces` ORDER BY `id_ann` DESC");
    $requeteAnnonce->execute();
    $nbAnn = $requeteAnnonce->rowCount();
    $listeAnnonce = $requeteAnnonce->fetchAll();
    
    //ANNONCE EN FONCTION DU TYPE
    if (isset($_GET['type'])) {
        if ($_GET['type'] == "Maisons") {
            $libelle = htmlspecialchars($_GET['type']);
            #SELECTION DU NUMERO POUR LE LIBELLE MAISON
            $reqType = $pdo->prepare("SELECT `id_type` FROM `type_immob` WHERE `libelle_type` = ? ");
            $reqType->execute(array($libelle));
            $result = $reqType->fetch();
            $id_type = $result['id_type'];//NUMERO

            $requeteAnnonce = $pdo->prepare("SELECT * FROM `annonces` WHERE `id_type` = ? ORDER BY `id_ann` DESC");
            $requeteAnnonce->execute(array($id_type));
            $listeAnnonce = $requeteAnnonce->fetchAll();
        }elseif ($_GET['type'] == "Terrains") {
            $libelle = htmlspecialchars($_GET['type']);
            #SELECTION DU NUMERO POUR LE LIBELLE MAISON
            $reqType = $pdo->prepare("SELECT `id_type` FROM `type_immob` WHERE `libelle_type` = ? ");
            $reqType->execute(array($libelle));
            $result = $reqType->fetch();
            $id_type = $result['id_type'];//NUMERO
            
            $requeteAnnonce = $pdo->prepare("SELECT * FROM `annonces` WHERE `id_type` = ? ORDER BY `id_ann` DESC");
            $requeteAnnonce->execute(array($id_type));
            $listeAnnonce = $requeteAnnonce->fetchAll();
        }elseif ($_GET['type'] == "Boutiques") {
           $libelle = htmlspecialchars($_GET['type']);
            #SELECTION DU NUMERO POUR LE LIBELLE MAISON
            $reqType = $pdo->prepare("SELECT `id_type` FROM `type_immob` WHERE `libelle_type` = ? ");
            $reqType->execute(array($libelle));
            $result = $reqType->fetch();
            $id_type = $result['id_type'];//NUMERO
            
            $requeteAnnonce = $pdo->prepare("SELECT * FROM `annonces` WHERE `id_type` = ? ORDER BY `id_ann` DESC");
            $requeteAnnonce->execute(array($id_type));
            $listeAnnonce = $requeteAnnonce->fetchAll();
        }elseif ($_GET['type'] == "Autres") {
            #SELECTION DU NUMERO POUR LE LIBELLE AUTRES
            $reqType = $pdo->prepare("SELECT `id_type` FROM `type_immob` WHERE `libelle_type` <> ? AND `libelle_type` <> ? AND `libelle_type` <> ? ");
            $reqType->execute(array("Maisons", "Terrains", "Boutiques"));
            $result = $reqType->fetchAll();
            $tabListe = [];//tableau qui va contenir les $listeAnnonces
            foreach ($result as $num) {
                $requeteAnnonce = $pdo->prepare("SELECT * FROM `annonces` WHERE `id_type` = ? ORDER BY `id_ann` DESC");
                $requeteAnnonce->execute(array($num['id_type']));
                $listeAnnonce = $requeteAnnonce->fetchAll();
                array_push($tabListe, $listeAnnonce);  //ajout de $listeAnnonce à la fin             
            }
        
        }else{
            header("Location: annonces.php");
        }
    }
        
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bamsachine Tech - Annonces</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/admi.css"/>


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
    top: 5vh;
    left: 5vh;
    height: 10vh;
}
#infos .box-info .chiffres{
    position: relative;
    top: -5vh;
}
</style>
    <body>
        <!-- I N C L U S I O N -->
        <?php
            include("heade.php");
        ?>
         <div id ="infos">
            <div class="box-info">
                <p class="entetes">Nombre d'annonces publiées</p>
                <p class="chiffres"><?php echo $nbAnn;?></p>
            </div>
        </div>
        <div id="corps8">
            <div id="liste">
            <p class="title">Dernières annonces</p>
            <table class="tble" cellpadding="0" cellspacing="0" border="0" id="t8">
                <tr class="entet">
                    <td align="center">Numéro</td>
                    <td align="center">Date pub.</td>
                    <td>Type</td>
                    <td>Etat Biens</td>
                    <td>Ville</td>
                    <td>Description</td>
                    <td>Prix</td>
                    <td align="center">Images</td>
                    <td align="center">Contact</td>
                    <td>Adresse E-mail</td>
                    <td>Opération</td>
                </tr>
                <?php
                //SI LE TYPE EST AUTRE
                  if (isset($_GET['type']) AND $_GET['type'] == "Autres") {
                        //$annonce fait partir de $listeAnnonce et $listeAnnonce fait partir de $tabListe
                        $i = 1;
                        foreach ($tabListe as $listeAnnonce) {  
                            foreach ($listeAnnonce as $annonce) {
                                #RECUPERATION DES CLES ETRANGERES DE UTILISATEUR VILLE ET TYPE
                                $id_user = $annonce['id_user'];
                                $id_type = $annonce['id_type'];
                                $id_ville = $annonce['id_ville'];
                                #REQUETE DES INFOS DES ANNONCEURS
                                $rInfos = $pdo->prepare("SELECT `num_tel`, `adr_mail` FROM `utilisateurs` WHERE `id_user` = ?");
                                $rInfos->execute(array($id_user));
                                $infos = $rInfos->fetch();
                                $numero = $infos['num_tel'];
                                $adresse = $infos['adr_mail'];

                                #REQUETE DU TYPE IMMOBILIER
                                $rType = $pdo->prepare("SELECT `libelle_type` FROM `type_immob` WHERE `id_type` = ?");
                                $rType->execute(array($id_type));
                                $type = $rType->fetch();
                                $libelle_type = $type['libelle_type'];

                                #REQUETE DE LA VILLE
                                $rVille = $pdo->prepare("SELECT `nom_ville` FROM `villes` WHERE `id_ville` = ?");
                                $rVille->execute(array($id_ville));
                                $ville = $rVille->fetch();
                                $nom_ville = $ville['nom_ville'];

                                echo "
                                    <tr class='infos'>
                                        <td align='center'>".$i."</td>
                                        <td align='center'>".$annonce['date_ann']."</td>
                                        <td>".$annonce['lieu_ann']."</td>
                                        <td>".$nom_ville."</td>
                                        <td>".$annonce['titre_ann']."</td>
                                        <td>".$annonce['desc_ann']."</td>
                                        <td>".$annonce['prix_ann']."</td>
                                        <td align='center'><a href='../image_adm.php?id_ann=".$annonce['id_ann']."'><img src='../img/picture_30px.png' alt='image' id='img'/><a></td>
                                        <td align='center'>".$numero."</a></td>
                                        <td>".$adresse."</td>
                                        <td align='center'><a href='srp_ann.php?num=".$annonce['id_ann']."' id='supprimer'>Supprimer</a></td>
                                    </tr>";
                                if ($id_user==0){
$rDelete = $pdo->prepare("DELETE FROM `annonces` WHERE `id_ann` = ");
	$done = $rDelete->execute(array($leNum));                                }
                            }
                            
                            $i++;
                        }
                    }else{
                          $i = 0;
                        foreach ($listeAnnonce as $annonce) {
                            #RECUPERATION DES CLES ETRANGERES DE UTILISATEUR VILLE ET TYPE
                            $id_user = $annonce['id_user'];
                            $id_type = $annonce['id_type'];
                            $id_ville = $annonce['id_ville'];
                            
                            #REQUETE DES INFOS DES ANNONCEURS
                          
                            $rInfos = $pdo->prepare("SELECT `num_tel`, `adr_mail` FROM `utilisateurs` WHERE `id_user` = ?");
                            $rInfos->execute(array($id_user));
                            $infos = $rInfos->fetch();
                            $numero = $infos['num_tel'];
                            $adresse = $infos['adr_mail'];
                                    
                            #REQUETE DU TYPE IMMOBILIER
                            $rType = $pdo->prepare("SELECT `libelle_type` FROM `type_immob` WHERE `id_type` = ?");
                            $rType->execute(array($id_type));
                            $type = $rType->fetch();
                            $libelle_type = $type['libelle_type'];

                            #REQUETE DE LA VILLE
                            $rVille = $pdo->prepare("SELECT `nom_ville` FROM `villes` WHERE `id_ville` = ?");
                            $rVille->execute(array($id_ville));
                            $ville = $rVille->fetch();
                            $nom_ville = $ville['nom_ville'];

                            echo "
                                <tr class='infos'>
                                    <td align='center'>".$i."</td>
                                    <td align='center'>".$annonce['date_ann']."</td>
                                    <td>".$libelle_type."</td>
                                    <td>".$annonce['lieu_ann']."</td>
                                    <td>".$nom_ville."</td>
                                    <td>".$annonce['desc_ann']."</td>
                                    <td>".$annonce['prix_ann']."</td>
                                    <td align='center'><a href='../image_adm.php?id_ann=".$annonce['id_ann']."'><img src='../img/picture_30px.png' alt='image' id='img'/><a></td>
                                    <td align='center'>+221 ".$numero."</td>
                                    <td>".$adresse."</td>
                                    <td>".$annonce['titre_ann']."</td>

                                </tr>";
                            $i++;
                        }
                    }   
                ?>
            </table>
            </div>
        </div>



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
