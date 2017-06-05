<?php
include "connexion.php";
$login = (isset($_GET["login"])) ? htmlentities($_GET["login"]) : NULL;
$key = (isset($_GET["key"])) ? htmlentities($_GET["key"]) : NULL;
$req = $dbh->prepare('UPDATE UTILISATEUR SET validation = 1 WHERE login = :login AND password = :key');
$req->execute(array('login' => $login, 'key' => $key));
$req = $dbh->prepare('SELECT 1 FROM UTILISATEUR WHERE login = :login AND password = :key');
$req->execute(array('login' => $login, 'key' => $key));
if ($donnees = $req->fetch()) {
    echo "Votre compte a bien été validé";
}
else
{
    echo "<p style='color:red'>Une erreur est survenue votre compte n'a pas été validé</p>";
    
}
?>
<script>
    setTimeout(function(){
        document.location.href="../index.php";
    },2000);
</script>