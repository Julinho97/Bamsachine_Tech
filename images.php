<?php
    session_start();
    include('config.php');
    if (isset($_COOKIE['__lingoser'])) {
        echo "
            <style type='text/css'>
                #noconnect{
                    display: none;
                    opacity: 0;
                    visibility: hidden;
                 }
                #user{
                    display: inline-block;
                    opacity: 1;
                    visibility: visible;
                 }
            </style>
        ";
        $leNum = intval($_COOKIE['__lingoser']);
        $requeteUser = $pdo->prepare("SELECT * FROM `utilisateurs` WHERE id_user = ?");
        $requeteUser->execute(array($leNum));
        $userInfo = $requeteUser->fetch();
        $numero= $userInfo['id_user'];
        $nom =  $userInfo['nom_user'];
        $prenoms = $userInfo['prenoms_user'];
        $numero = $userInfo['num_tel'];
        $adresse = $userInfo['adr_mail'];

    }else{
        echo "
            <style type='text/css'>
                #user{
                    display: none;
                    opacity: 0;
                    visibility: hidden;
                 }
            </style>
        ";
    }
    if (isset($_GET['id_ann']) AND is_numeric($_GET['id_ann'])){
        $id_ann = intval($_GET['id_ann']);
    }else{
        header("Location: annonces.php");
        exit(); 
    }
    #SELECTION DES IMAGES
    $reqImg = $pdo->prepare("SELECT `source` FROM `images` WHERE `id_ann` = ?");
    $reqImg->execute(array($id_ann));
    $listeImg = $reqImg->fetchAll();
    $nbImage = $reqImg->rowCount();
    if ($nbImage == 0) {
        $erreur = "Aucune image disponible pour l'annonce.";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Picos Immobilier - Images</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/photo.css"/>
    <link rel="stylesheet" type="text/css" href="css/accueil.css"/>
</head>
<body>
    <?php
        include ("header.php"); 
    ?>
    
    <h1>Images de l'annonce<a href="./annonces.php" id="retour">x</a></h1>
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