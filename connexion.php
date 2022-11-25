<?php
    session_start();
    include('config.php');
    if (isset($_POST['btnSubmit'])) {

        $identification = htmlspecialchars($_POST['identification']);//VARIABLE UNIQUE D'IDENTIFICATION(E-MAIL ET NUMERO)
        //$password = sha1($_POST['motPasse']);
        $password = sha1($_POST['motPasse']);

        if (!empty($identification) AND !empty($password)) {
            if (is_numeric($identification))/*SI LA VARIABLE EST UN NUMERO DE TELEPHONE*/ {
                if (strlen($identification) == 9)/*VERIFICATION DE LA LONGUEUR*/ {
                    $requeteUser = $pdo->prepare("SELECT * FROM utilisateurs where num_tel = ? AND password = ?");/*RECHERCHE DANS LA BASE*/
                    $requeteUser->execute(array($identification, $password));
                    $userExiste = $requeteUser->rowCount();

                    if ($userExiste == 1) {
                        $userInfo = $requeteUser->fetch();
                        $_SESSION['id'] = $userInfo['id_user'];
                        #NOM DU COOKIE __LINGOSER = LOGIN + USER
                        setcookie('__lingoser', $userInfo['id_user'], time() + 360*24*3600, null, null, false, true);
                        echo '<script>document.location.replace("index.php");</script>';
                    }
                    else{
                        $erreur = "Le numéro de téléphone ou le mot de passe est incorrect";
                    }
                }
                else{
                    $erreur = "Le numéro de téléphone n'est pas valide!";
                }
            }
            elseif (filter_var($identification, FILTER_VALIDATE_EMAIL)) /*VERIFIE SI C'EST UNE EMAIL VALIDE*/{
                $requeteUser = $pdo->prepare("SELECT * FROM utilisateurs where adr_mail = ? AND password = ?");
                $requeteUser->execute(array($identification, $password));
                $userExiste = $requeteUser->rowCount();

                if ($userExiste == 1) {
                    $userInfo = $requeteUser->fetch();
                    $_SESSION['num'] = $userInfo['id_user'];
                    #NOM DU COOKIE __LINGOSER = LOGIN + USER
                    setcookie('__lingoser', $userInfo['id_user'], time() + 360*24*3600, null, null, false, true);
                    echo '<script>document.location.replace("index.php");</script>';
                }
                else{
                    $erreur = "L'adresse e-mail ou le mot de passe est incorrect";
                }
            }
            else{
                $erreur = "L'adresse e-mail n'est pas valide!";
            }

        }
        else{
            $erreur = "Veuillez remplir tous les champs!";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bamsachine Tech - Connexion</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/log.css"/>
    </head>
    <body>
        <!-- I N C L U S I O N -->
        <?php
           include("header.php");
        ?>
         <div id="corpsSignUp">
             <h2>Bamsachine Account</h2>
             <h4>Connectez-vous à votre compte Bamsachine Account</h4>
             <form id="fSignUp" method="post" action="" align="center">
                 <input type="text" required placeholder="Numéro de téléphone ou adresse e-mail" maxlength="35" name="identification" class="input" value="<?php  if(isset($identification)) echo $identification ;?>" />
                 <input type="password" required placeholder="Mot de passe" maxlength="20" name="motPasse" class="input"/>
                 <div>

                 </div>
                 <input type="submit" value="Se connecter" id="btnSingUp" name="btnSubmit"/>
             </form>
             <?php
                if(isset($erreur)){
                    echo '<p style="color:red;" align="center" >'.$erreur.'</p>';
                }
            ?>
            <div id="otherConnect">
                 <h2>Se connecter avec </h2>
                 <img src="img/google_logo_100px.png" title="Se connecter avec Google"  alt="Google" class="connectImg"/>
                 <img src="img/facebook_circled_100px.png" title="Se connecter avec Facebook"  alt="Facebook" class="connectImg"/>
                 <img src="img/twitter_100px.png" title="Se connecter avec Twitter"  alt="Twitter" class="connectImg"/>
             </div>
             <p><a href="inscription.php">Créér un nouveau compte</a></p>
        </div>
        <!-- I N C L U S I O N -->
        <?php
            include("footer.php");
        ?>
    </body>
</html>
