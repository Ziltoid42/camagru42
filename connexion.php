<?php
include "config/database.php";
try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $sql = "use camagru;";
    $dbh->exec($sql);
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>