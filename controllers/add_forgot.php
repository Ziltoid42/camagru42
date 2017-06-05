<?php
include 'connexion.php';
$logmail = (isset($_POST["logmail"])) ? htmlentities($_POST["logmail"]) : NULL;
$req = $dbh->prepare('SELECT email,password FROM UTILISATEUR WHERE login = :login OR email = :email');
$req->execute(array('login' => $logmail, 'email' => $logmail));
if ($donnees = $req->fetch()) {
    $email = $donnees['email'];
    $subject = 'modification password camagru';
    $text = "<html><head></head><body><b>Bonjour</b><br/>Pour réinitialiser votre mot de passe <br/>
    cliquez : <a href='http://localhost:8080/camagru/modif.php?logmail=".$logmail."&key=".$donnees['password']."'>ici</a></body></html>";
    sendMail($email, $text, $subject);
 
    echo "ok";
}
else
    echo "fail";

function sendMail($email, $text, $subject){
        $headers = 'From: noreply@camagru.fr' . "\r\n" .
            'Reply-To: noreply@camagru.fr' . "\r\n" .
            'X-Mailer: PHP/' . phpversion() .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        if (mail($email, $subject, $text, $headers) === false)
            return (-1);
        else
            return (1);
    }
?>