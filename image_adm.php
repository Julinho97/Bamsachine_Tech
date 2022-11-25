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
    <title>Bamsacine Tech - Images</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/photo.css"/>
    <link rel="stylesheet" type="text/css" href="css/accueil.css"/>

            <link rel="shortcut icon" type="image/x-icon" href="img/path/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/path/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="css/path/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="css/path/line-awesome.min.css">
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="css/path/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="css/path/style.css">
</head>

<style>

h1 {
    margin-top: 3.5%;
    text-align: center;
    text-transform: uppercase;
    font-weight: lighter;
    color: #333;
    background-color: white;
    padding: 1%;
    width: 805px;
    margin-right: auto;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
    margin-left: auto;
    position :relative;
    top: 2vh;
    
}


#retour {
    cursor: pointer;
    opacity: 1;
    position: absolute;
    right: 35px;
    top: 12px;
    text-align: center;
    font-size: 40px;
    height: 105px;
    text-decoration: none;
    color: rgb(39, 38, 38);
}

#retour:hover {
    transition: 1s;
    content: "jul";
    cursor: pointer;
    opacity: 1;
    position: absolute;
    right: 35px;
    top: 12px;
    text-align: center;
    font-size: 43px;
    height: 105px;
    text-decoration: none;
    color: rgba(255, 53, 27, 0.8);
}
</style>
<body>
    <?php
        include ("administration/heade2.php"); 
    ?>
    
    <h1>Annoces de <?php echo" $prenoms";?><a href="administration/annonces.php" id="retour">x</a></h1>
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
    


     <script src="js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="js/jquery.slimscroll.min.js"></script>
		
		<!-- Chart JS -->
		<script src="plugins/morris/morris.min.js"></script>
		<script src="plugins/raphael/raphael.min.js"></script>
		<script src="js/chart.js"></script>
		
		<!-- Custom JS -->
		<script src="js/app.js"></script>
</body>
</html>