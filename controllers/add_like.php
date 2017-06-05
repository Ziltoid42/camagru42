
<?php
session_start();
include 'connexion.php';
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : NULL;
$sql = $dbh->prepare('SELECT id FROM utilisateur WHERE login = ?');
$sql->execute(array($_SESSION['login']));
if ($donnees = $sql->fetch()) {
    $id_uti = $donnees['id'];
    $sql2 = $dbh->prepare('SELECT jaime FROM image WHERE id = ?');
    $sql2->execute(array($id));
    if ($donnees2 = $sql2->fetch()) {
        $jaime = $donnees2['jaime'];
    }
    $sql3 = $dbh->prepare('SELECT 1 FROM jaime_img WHERE id_utilisateur = ? AND id_image = ?');
    $sql3->execute(array($id_uti, $id));
    if ($donnees3 = $sql3->fetch()) {
        $jaime -=1;
        $sql4 = $dbh->prepare('DELETE FROM jaime_img WHERE id_utilisateur = ? AND id_image = ?');
        $sql4->execute(array($id_uti,$id));
    }
    else
    {
        $jaime +=1;
        $sql4 = $dbh->prepare('INSERT INTO jaime_img (id_utilisateur,id_image) VALUES (?, ?)');
        $sql4->execute(array($id_uti, $id));
    }
    $req = $dbh->prepare('UPDATE image SET jaime = ? WHERE id = ?');
    $req->execute(array($jaime, $id));
}
?>