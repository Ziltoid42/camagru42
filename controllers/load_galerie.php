<?php
include "connexion.php";
$limit = (isset($_POST["limit"])) ? htmlentities($_POST["limit"]) : NULL;
$limit_under = $limit - 10;
$req = $dbh->prepare('SELECT img.id,img.nom,img.jaime,img.id_utilisateur,u.login FROM image img LEFT JOIN utilisateur u on img.id_utilisateur = u.id order by img.id desc LIMIT '. $limit_under .', '.$limit);
$req->execute();
$rows = array();
$i = 0;
while ($donnees = $req->fetch()) {
    $rows[] = $donnees;
    $sql = $dbh->prepare('SELECT com.id,commentaire,jaime,u.login FROM commentaire com LEFT JOIN utilisateur u on com.id_utilisateur = u.id  where id_image = :id_img order by com.id desc');
    $sql->execute(array('id_img' => $donnees['id']));
    while ($donnees2 = $sql->fetch()) {
        $rows[$i][] = $donnees2;
    }
    $i++;
}
print json_encode($rows);
?>