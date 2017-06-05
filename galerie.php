<?php session_start();
if ($_SESSION['login']) {
    $logged = TRUE;
    ?>
    <!doctype html>

        <?php
        include 'header.php';
        ?>
        <div class="container">

            <div>
                <div id="ladiv2">
                    <center><p class="pagination" >0 - 10</p>
                    <?php
                    include "connexion.php";
                    $req = $dbh->prepare('SELECT img.id,img.nom,img.jaime,img.id_utilisateur,u.login FROM image img LEFT JOIN utilisateur u on img.id_utilisateur = u.id order by img.id desc LIMIT 10');
                    $req->execute();
                    while ($donnees = $req->fetch()) {
                        ?>
                        <div class="img" ><img width="320" height="240"
                            src="<?php echo $donnees['nom'] ?>">
                        <div style="padding:10px;"><span
                                style="margin:5px"><img width="150" height="100" onclick="add_like(<?php echo $donnees['id']; ?>)" src="img/like.png"> <?php echo $donnees['jaime']; ?> </span>
                            <div><input id="commentaire<?php echo $donnees['id'] ?>" style="width:69%;" type="text"
                                        placeholder="Votre commentaire...">
                                <button class="button" onclick="add_comment(<?php echo $donnees['id'] ?>)">Ajouter</button>
                            </div><?php
                            $sql = $dbh->prepare('SELECT com.id,commentaire,jaime,u.login FROM commentaire com LEFT JOIN utilisateur u on com.id_utilisateur = u.id  where id_image = :id_img order by com.id desc');
                            $sql->execute(array('id_img' => $donnees['id']));
                            while ($donnees2 = $sql->fetch()) {
                                ?>
                                <div style="margin:5px">
                                <div><span
                                        style="font-weight: bold;color:#3646ff"><?php echo $donnees2['login'] ?></span><?php echo "  " . $donnees2['commentaire']?>
                                </div></div><?php
                            }
                            ?></div></div><?php
                    }
                    ?>
                    </center>
                    <button id="prev" class="button" onclick="prev('true')" style="float:left">Prev</button>
                    <button id="next" class="button" onclick="next('true')" style="float:right">Next</button>
                    
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
    <script src="js/javascript.js"></script>
    </body>
    </html>
    <?php
}
else{
        
        include 'header.php';
        ?>
        <div class="container">

            <div>
                <div id="ladiv2">
                    <center><p class="pagination" >0 - 10</p>
                    <?php
                    include "connexion.php";
                    $req = $dbh->prepare('SELECT img.id,img.nom,img.jaime,img.id_utilisateur,u.login FROM image img LEFT JOIN utilisateur u on img.id_utilisateur = u.id order by img.id desc LIMIT 10');
                    $req->execute();
                    while ($donnees = $req->fetch()) {
                        ?>
                        <div class="img" ><img width="320" height="240"
                            src="<?php echo $donnees['nom'] ?>">
                        <div style="padding:10px;"><span
                                style="margin:5px"><img width="150" height="100"  src="img/like.png"> <?php echo $donnees['jaime']; ?> </span>
                            <?php
                            $sql = $dbh->prepare('SELECT com.id,commentaire,jaime,u.login FROM commentaire com LEFT JOIN utilisateur u on com.id_utilisateur = u.id  where id_image = :id_img order by com.id desc');
                            $sql->execute(array('id_img' => $donnees['id']));
                            while ($donnees2 = $sql->fetch()) {
                                ?>
                                <div style="margin:5px">
                                <div><span
                                        style="font-weight: bold;color:#3646ff"><?php echo $donnees2['login'] ?></span><?php echo "  " . $donnees2['commentaire']?>
                                </div></div><?php
                            }
                            ?></div></div><?php
                    }
                    ?>

                    </center>
                    
                    
                </div>
                <button id="prev" class="button" onclick="prev()" style="float:left">Prev</button>
                    <button id="next" class="button" onclick="next()" style="float:right">Next</button>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
    <script src="js/javascript.js"></script>
    </body>
    </html>
    <?php
}
?>