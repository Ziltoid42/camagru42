<?php session_start();
if ($_SESSION['login']) {
    ?>
    
        <?php
        include 'header.php';
        ?>
        <div class="container" style="height: 500px;">


                <div class="webcam">

                    <button id="start" class="button" onclick="start()" style="display:none;">Start</button>
                    <button id="stop" class="button" onclick="stop()" style="display:none;">Stop</button>
                    <button id="snapshot" class="button" onclick="snapshot()" style="display:none;">Snapshot</button>

                   

                    <form id ="form" action="controllers/add_img.php" method="post" enctype="multipart/form-data" style="float: right;display:none;">
                        <p>
                        Formulaire d'envoi de fichier (uniquement .png) :<br />
                        <input type="file" name="files" required/><br />
                        <input type="hidden" id="filtre_img" value="img/img1.png" name="img_filtre">
                        <input type="submit" class="button" value="Envoyer le fichier" />
                        </p>
                    </form>

                    <div style="padding: 2%;">
                        <video id="video" style="float:left;padding:2%;" width="320" height="240" autoplay></video>
                        <canvas id="canvas" style="padding-left:2%;display:none" width="320" height="240"></canvas>   
                    </div>
                        <div id="filtre" style="margin-left: auto;margin-right: auto;">
                            <p>Cliquez sur une image pour la choisir</p>
                            <img src="img/img1.png" width="160" height="120" onclick="image_choose('img1.png')">
                            <img src="img/img2.png" width="160" height="120" onclick="image_choose('img2.png')">
                            <img src="img/img3.png" width="160" height="120" onclick="image_choose('img3.png')">
                        </div>

                </div>
        </div>

        <div id="ladiv" class="container">
                    <?php
                    include "connexion.php";
                    $req = $dbh->prepare('SELECT id,nom FROM image where id_utilisateur = (select id from utilisateur where login = :login) order by id desc');
                    $req->execute(array('login' => $_SESSION['login']));
                    while ($donnees = $req->fetch()) {
                        ?>
                        <div class="img" onclick="supprimer(<?php echo $donnees['id'] ?>)"><img width="320" height="240"
                            id="<?php echo $donnees['id'] ?>" src="<?php echo $donnees['nom'] ?>">
                        <div class="hover"></div></div>
                    <?php
                    }
                    ?>
        </div>
        <?php
        include 'footer.php';
        ?>

    <script src="js/javascript.js"></script>
    <script src="js/webcam.js"></script>
    </body>
    </html>
    <?php
}
else{
    echo "Vous n'avez pas accès a cet page connectez vous d'abord.";
}
?>