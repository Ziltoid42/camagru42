<?php
include 'connexion.php';
$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;
$password2 = (isset($_POST["password2"])) ? htmlentities($_POST["password2"]) : NULL;
$email = (isset($_POST["email"])) ? htmlentities($_POST["email"]) : NULL;
$grain = 'l1l1put13n';
        $sel = 'fr1p0n3t';
        $sha1 = sha1($grain.$password.$sel);
$text = '
    <html>
        <head>
            <title>Bienvenue sur Camagru</title>
        </head>
        <body>
            <p>Hello ' . $login . ',' . PHP_EOL . 'To finish your registration to camagru click on the link bellow :</p>
            <a href="http://localhost:8080/camagru/controllers/validation.php?login=' . $login. '&key=' . $sha1 . '">Just click here and be done with it.</a>
            <p>See you soon on Camagru !</p>
        </body>
    </html>';
    

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
        //envoie_mail($email, $login, $sha1);
        sendMail($email, $text, "inscription camagru");
    }
    else {
        /*$grain = 'l1l1put13n';
        $sel = 'fr1p0n3t';
        $sha1 = sha1($grain.$password.$sel);*/
        $stmt = $dbh->prepare("INSERT INTO UTILISATEUR (login, password, email) VALUES (:login, :passwd, :email)");
        $stmt->execute(array('login' => $login, 'passwd' => $sha1, 'email' => $email));
        print "OK";
        //envoie_mail($email, $login, $sha1);
        sendMail($email, $text, "inscription camagru");
    }
}

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