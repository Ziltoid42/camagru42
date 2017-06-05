<?php
include 'connexion.php';
$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;
$password2 = (isset($_POST["password2"])) ? htmlentities($_POST["password2"]) : NULL;
$email = (isset($_POST["email"])) ? htmlentities($_POST["email"]) : NULL;
if($password != $password2)
    echo "different";
else if($password == NULL)
    echo "password";
else if($login == NULL)
    echo "login vide";
else if($password2 == NULL)
    echo "password2";
else if($email == NULL)
    echo "email";
else
{
    $req = $dbh->prepare('SELECT 1 FROM UTILISATEUR WHERE login = :login');
    $req->execute(array('login' => $login));
    if ($donnees = $req->fetch()) {
        echo "login";
        envoie_mail($email, $login, $sha1);
    }
    else {
        $grain = 'l1l1put13n';
        $sel = 'fr1p0n3t';
        $sha1 = sha1($grain.$password.$sel);
        $stmt = $dbh->prepare("INSERT INTO UTILISATEUR (login, password, email) VALUES (:login, :passwd, :email)");
        $stmt->execute(array('login' => $login, 'passwd' => $sha1, 'email' => $email));
        print "OK";
        envoie_mail($email, $login, $sha1);
    }
}
function envoie_mail($email, $login, $sha1)
{
    
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
        $passage_ligne = "\r\n";
    else
        $passage_ligne = "\n";
    $message_txt = "Merci de vous etre inscrit sur mon camagru, nous savons que vous avez le choix en la matiere et vous remercions de votre confiance .";
    $message_html = "<html><head></head><body><b>Bonjour ".$login."</b><br/> Pour valider l'inscription au camagru veuillez cliquer sur ce lien :
    <a href='http://localhost:8080/camagru/validation.php?login=".$login."&key=".$sha1."'>ci</a></body></html>";
    $boundary = "-----=".md5(rand());
    $sujet = "Validation inscription Camagru";
    $header = "From: \"gcadel\"<gcadel_camagru@tatapouet.fr>".$passage_ligne;
    $header.= "Reply-to: \"gcadel\" <gcadel_camagru@tatapouet.fr>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    echo "passage envoie_mail";
    mail($email,$sujet,$message,$header); 
    
    //passe sur hotmail mais pas gmail
    /*$subject = 'Activation du compte';
            $header = 'From: signup@camagru.com';
            $message = 'Bienvenue sur Camagru, pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur.<br />http://localhost:8080/camagru/activation.php?log='.urlencode($login).'&cle='.urlencode($sha1).' <br />Ceci est un mail automatique merci de ne pas y répondre.';
            mail($email, $subject, $message, $header);
            echo "passage envoie_mail";
    */
}
?>