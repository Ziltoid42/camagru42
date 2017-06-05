<?php
include 'connexion.php';
session_start();
$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;
$grain = 'l1l1put13n';
$sel = 'fr1p0n3t';
$sha1 = sha1($grain.$password.$sel);
$req = $dbh->prepare('select 1 from UTILISATEUR where login = :login and password = :passwd and validation = 1');
$req->execute(array('login' => $login, 'passwd' => $sha1));
if ($donnees = $req->fetch()) {
    echo "OK";
    $_SESSION["login"] = $login;
}