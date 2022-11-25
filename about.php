<?php
    /*TRAITEMENT DU FORMULAIRE*/
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
    
    if (isset($_POST['envoyer'])) {
    /*CHAMPS VIDES*/
        if (empty($_POST['prenoms']) AND empty($_POST['nom']) AND empty($_POST['objet']) and empty($_POST['numero']) AND empty($_POST['adr_mail']) AND empty($_POST['message'])) {
            $erreur = "Veuillez remplir tous les champs!";
                        
        }else{
            $nom = htmlspecialchars($_POST['nom']);
            $prenoms = htmlspecialchars($_POST['prenoms']);
            $objet = htmlspecialchars($_POST['objet']);
            $numero = htmlspecialchars($_POST['numero']);
            $adrMail = htmlspecialchars($_POST['adr_mail']);
            $message = htmlspecialchars($_POST['message']);

            if (filter_var($adrMail, FILTER_VALIDATE_EMAIL)) {
                if (is_numeric($numero)) {
                    if (strlen($numero) == 8) {
                        /*requette*/
                        $laRequete = $pdo->prepare("INSERT INTO `messages` VALUES(null,?,?,?,?,?,?)");
                        $done = $laRequete->execute(array($nom, $prenoms, $objet, $numero, $adrMail, $message));
                        if ($done) {
                            echo"<script>alert('Votre méssage a été bien envoyé. Nous vous répondrons dans les plus brefs délais.');</script>";
                             /*affectation des valeurs nulles*/
                            $nom = " ";
                            $prenoms = " ";
                            $objet = " ";
                            $numero = " ";
                            $message = " ";
                            $adrMail = " ";
                        }else{
                            echo"<script>alert('Erreur lors de l'envoi du méssage!');</script";
                        }

                    }else{
                        echo"<script>alert('Le numéro de téléphone saisi n\'est pas valide!');</script";
                    }
                }else{
                        echo"<script>alert('Le numéro de téléphone saisi n\'est pas valide!');</script";
                    }
            }else{
                    echo"<script>alert('L\'adresse e-mail saisie n\'est pas valide!');</script";
                }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bamsachine Tech - Accueil</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/aboute.css"/>
    
    
        <!-- css files -->
<link rel="stylesheet" href="css/css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/css/styles.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    </head>
    <body>
        <!-- I N C L U S I O N -->
        <?php
            include("header.php");
        ?>
        <h1 id="titre">Bamsachine Tech - A propos</h1>
        <div id="nous">
            <h1>NOUS</h1>
            <p>Bamsachine Tech est une plate-forme internet qui sert de vitrine aux particuliers et aussi aux entreprises de faire passer leurs annonces sur internet à des prix défiants toute concurrence.</p>
            <p> <br/> Vous pouvez y passer les annonces de vos biens immeubles telques Matrier informatique,Matrier Electro Accessoirs,   Smartephone...En vue de la vente ou de la location.</p>
        </div>
       
        <!--         -->
    <div class="team-w3l" id="team">
	<div class="container">
		<h3 class="w3l-title">Notre équipe</h3>
		<div class="w3layouts_header">
			<p>Bamsachine Tech est formé d'une jeune équipe très dynamique</p>
		</div>
		<div class="team-w3l-grid">
			<div class="col-md-4 col-xs-4 about-poleft t1" data-aos="fade-up" data-aos-delay="350">
				<div class="about_img"><img src="img/p1.png" alt="">
				  <h5>Abdou</h5>
				  <div class="about_opa">
					<p>Designer UI/UX</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t2" data-aos="fade-up" data-aos-delay="700">
				<div class="about_img"><img src="img/p2.png" alt="">
				  <h5>Papa</h5>
				  <div class="about_opa">
					<p>Developpeur web/mobile</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t3" data-aos="fade-up" data-aos-delay="1000">
				<div class="about_img"><img src="img/P3.png" alt="">
				  <h5>Ibou</h5>
				  <div class="about_opa">
					<p>Ceo-fondateur</p>
					<ul class="fb_icons2 text-center">
						<li><a class="fa fa-facebook" href="#"></a></li>
						<li><a class="fa fa-twitter" href="#"></a></li>
						<li><a class="fa fa-google" href="#"></a></li>
						<li><a class="fa fa-linkedin" href="#"></a></li>
						<li><a class="fa fa-pinterest-p" href="#"></a></li>
					</ul>
				  </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	
		
	</div>
</div>

        <div id="contact">
            <h1>Nous Contacter</h1>
            <h3>Ecrivez nous sur notre E-mail</h3>
            <form method="post" id="formContact" action="">
                <div>
                    <input type="text" placeholder="Prénoms" maxlength="50" required name="prenoms" class="input"/>
                    <input type="text" placeholder="Nom" maxlength="35" required name="nom" class="input"/>
                </div>
                <div>
                    <input type="text" placeholder="Objet" maxlength="100" required name="objet" class="input"/>
                    <input type="text" placeholder="Adresse" maxlength="100" required name="adresse" class="input"/>
                </div>
                <div>
                    <input type="tel" placeholder="Numéro de téléphone" maxlength="8" required name="numero" class="input"/>
                    <input type="email" placeholder="Adresse E-mail" maxlength="50" required name="adr_mail" class="input"/>
                </div>
                <input class="inputest" placeholder="Message" name="message"/>
                
                <br/>
                <input type="submit" name="envoyer" value="Envoyer" id="btnEnvoyer">
            </form>
            <h3>OU</h3>
            <br/>
            <h3>Contactez nous directement</h3>
            <a href="tel://00221766657278">766657278</a>
            <h3>Bamsachine Tech, Malika - Keur Massar - Dakar - SENEGAL</h3>
        </div>
        <?php
            include("footer.php");
        ?>
    </body>
</html>