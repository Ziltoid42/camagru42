<?php
include "database.php";
try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    $dbh->exec($sql);
    $sql = "use camagru;";
    $sql .= "CREATE TABLE `commentaire` (`ID` int(11) NOT NULL,`COMMENTAIRE` varchar(255) DEFAULT NULL,`JAIME` int(11) DEFAULT '0',`ID_UTILISATEUR` int(11) DEFAULT NULL,`ID_IMAGE` int(11) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $sql .= "CREATE TABLE `image` (`ID` int(11) NOT NULL,`NOM` mediumtext,`JAIME` int(11) NOT NULL DEFAULT '0',`ID_UTILISATEUR` int(11) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $sql .= "CREATE TABLE `jaime_com` (`id` int(11) NOT NULL,`id_utilisateur` int(11) DEFAULT NULL,`id_com` int(11) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    $sql .= "CREATE TABLE `jaime_img` (`id` int(11) NOT NULL,`id_utilisateur` int(11) DEFAULT NULL,`id_image` int(11) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
    $sql .= "CREATE TABLE `utilisateur` (`ID` int(11) NOT NULL,`LOGIN` varchar(50) DEFAULT NULL,`PASSWORD` varchar(255) DEFAULT NULL,`email` varchar(255) NOT NULL,`validation` int(11) NOT NULL DEFAULT '0') ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $sql .= "ALTER TABLE `commentaire` ADD PRIMARY KEY (`ID`),ADD KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`),ADD KEY `ID_IMAGE` (`ID_IMAGE`);";
    $sql .= "ALTER TABLE `image` ADD PRIMARY KEY (`ID`),ADD KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`);";
    $sql .= "ALTER TABLE `jaime_com` ADD PRIMARY KEY (`id`);";
    $sql .= "ALTER TABLE `jaime_img` ADD PRIMARY KEY (`id`);";
    $sql .= "ALTER TABLE `utilisateur` ADD PRIMARY KEY (`ID`);";
    $sql .= "ALTER TABLE `commentaire` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
    $sql .= "ALTER TABLE `image` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
    $sql .= "ALTER TABLE `jaime_com` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
    $sql .= "ALTER TABLE `jaime_img` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
    $sql .= "ALTER TABLE `utilisateur` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";
    $sql .= "ALTER TABLE `commentaire` ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID`), ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`ID_IMAGE`) REFERENCES `image` (`ID`);";
    $sql .= "ALTER TABLE `image` ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID`);";
    $dbh->exec($sql);
    echo "Création de la db réussi.";
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>