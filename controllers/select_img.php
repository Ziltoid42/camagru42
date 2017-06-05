<?php
include 'connexion.php';
session_start();
$req = $dbh->prepare('SELECT id,nom FROM image where id_utilisateur = (select id from utilisateur where login = :login) order by id desc');
$req->execute(array('login' => $_SESSION['login']));
$rows = array();
while ($donnees = $req->fetch()) {
    $rows[] = $donnees;
}
print json_encode($rows);
?>