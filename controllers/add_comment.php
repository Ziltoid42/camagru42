
<?php

session_start();
include 'connexion.php';
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : NULL;
$com = (isset($_POST["com"])) ? htmlentities($_POST["com"]) : NULL;
if ($com) {
    $sql = $dbh->prepare('SELECT id FROM utilisateur WHERE login = ?');
    $sql->execute(array($_SESSION['login']));
    if ($donnees = $sql->fetch()) {
        $id_uti = $donnees['id'];
        $req = $dbh->prepare('INSERT INTO commentaire (commentaire,id_utilisateur,id_image) values(:com, :id_uti, :id_img)');
        $req->execute(array('com' => $com, 'id_uti' => $id_uti, 'id_img' => $id));
        $sql = $dbh->prepare('SELECT email FROM utilisateur WHERE id = (select id_utilisateur from image where id = ?)');
        $sql->execute(array($id));
        if ($donnees = $sql->fetch()) {
            $subject = 'Commentaire sur camagru';
            $text = '
            <html>
                <head>
                    <title>commentaire sur Camagru</title>
                </head>
                <body>
                    <p>Vous venez de vous recevoir un commentaire sur votre photo.</p>

                </body>
            </html>';

            sendMail($donnees['email'], $text, $subject);
        }
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