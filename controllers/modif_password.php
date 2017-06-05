<?php
include 'connexion.php';
$logmail = (isset($_POST["logmail"])) ? htmlentities($_POST["logmail"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;
$grain = 'l1l1put13n';
$sel = 'fr1p0n3t';
$password = sha1($grain.$password.$sel);
$req = $dbh->prepare('UPDATE UTILISATEUR SET password = :password WHERE login = :logmail OR email = :logmail');
$req->execute(array('logmail' => $logmail, 'password' => $password));
echo "ok";
?>