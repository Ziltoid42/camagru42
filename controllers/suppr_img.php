<?php
include 'connexion.php';
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : NULL;
$req = $dbh->prepare('DELETE FROM commentaire WHERE id_image = ?');
$req->execute(array($id));
$req = $dbh->prepare('DELETE FROM IMAGE WHERE id = :id');
$req->execute(array('id' => $id));
?>