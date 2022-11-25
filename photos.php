<?php
    session_start();
    include('config.php');
    if (isset($_COOKIE['__lingoser'])) {
        $leNum = intval($_COOKIE['__lingoser']);
        $requeteUser = $pdo->prepare("SELECT * FROM `utilisateurs` WHERE id_user = ?");
        $requeteUser->execute(array($leNum));
        $userInfo = $requeteUser->fetch();
        $id_user= $userInfo['id_user'];
        $nom =  $userInfo['nom_user'];
        $prenoms = $userInfo['prenoms_user'];
        $numero = $userInfo['num_tel'];
        $adresse = $userInfo['adr_mail'];
    }else{
        header("Location: connexion.php");
        exit();
    }
    #VERIFCATION DU NUMERO D'ANNONCE
    if (isset($_GET['id_ann']) AND is_numeric($_GET['id_ann']) AND isset($_GET['id_user']) AND is_numeric($_GET['id_user']) AND  intval($_GET['id_user']) == $id_user){
        $reqNumAnn = $pdo->prepare("SELECT * FROM `annonces` WHERE `id_ann` = ?");
        $reqNumAnn->execute(array($_GET['id_ann']));
        $existe = $reqNumAnn->rowCount();
        if ($existe != 0) {
            $id_ann = intval($_GET['id_ann']);
        }else{
           header("Location: dashboard.php");
            exit(); 
        }
    }
    else{
        header("Location: dashboard.php");
        exit();
    }
    #SELECTION DES IMAGES
    $reqImg = $pdo->prepare("SELECT `source` FROM `images` WHERE `id_ann` = ?");
    $reqImg->execute(array($id_ann));
    $nbImage = $reqImg->rowCount();
    $listeImg = $reqImg->fetchAll();
    if ($nbImage == 0) {
        $erreur = "Aucune image disponible pour l'annonce.";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bamsachine Tech - Photos</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/photo.css"/>
    <link rel="stylesheet" type="text/css" href="css/accueil.css"/>
</head>
<body>
    <?php
        include ("header1.php"); 
    ?>
    
    <h1>Photos de l'annonce<a href="account/dashboard.php" id="retour">x</a></h1>

    <?php
        if (isset($erreur)) {
            echo "<p id='erreur'>".$erreur."</p>";
        }else{
            echo '
        <div id="corps">
        <div id="slider">';
         
            echo '                
                

                <img src="img/Petites-Annonces.jpg" alt="Cliquez sur les flêches pour défiler" id="slide">
                <div id="precedent" onclick="ChangeSlide(-1)"><</div>
                <div id="suivant" onclick="ChangeSlide(1)">></div>
            ';
            
            echo '
                <script type="text/javascript">
                    var slide = [];
            ';
                    //AJOUT DES IMAGES AU TABLEAU SLIDE
                        foreach ($listeImg as $img) {
                            echo "
                                slide.push('".$img['source']."');
                            ";
                        }
                    echo'
                    var numero = 0;

                    function ChangeSlide(sens) {
                        numero = numero + sens;
                        if (numero < 0)
                            numero = slide.length - 1;
                        if (numero > slide.length - 1)
                            numero = 0;
                            document.getElementById("slide").src = slide[numero];
                        }
                </script>
                ';
        echo "
        </div>
        </div>";
        }
    ?>
</body>
</html>