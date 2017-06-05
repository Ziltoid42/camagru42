<?php session_start();?>


<?php
    include 'header.php';
     if (!$_SESSION)
        $_SESSION['login'] = '';
?>


    <div class="container">
        
        <center id="javascript_test">
            <div class="connexion">
                <div class="connexion_header">
                    Connectez-vous !
                </div>
                <input type="text" id="login" value="" placeholder="identifiant"><br>
                <div id="inexistant" class="error" style="display:none;opacity:0;">
                    <p>Vous n'avez pas indiqué d'identifiant</p>
                </div>
                <input type="password" id="password" value="" placeholder="Mot de passe"><br>
                <div id="password_error" class="error" style="display:none;opacity:0;">
                    <p>Vous n'avez pas indiqué de mot de passe</p>
                </div>
                <div id="error" class="error" style="display:none;opacity:0;">
                    <p>Mauvaise combinaison mot de passe / identifiant, Merci de reesayer.</p>
                </div>
                <input onclick="login(readData)" class="button" type="submit" value="Connection"><br>
                <a href="inscription.php" id="href" style="font-size:20px; text-decoration:none">Je m'inscrit !</a><br/>
                <a href="forgot.php" id="href" style="font-size:20px; text-decoration:none">Mot de passe oublié ?</a>
            </div>
         </center>
	</div>

    <script src="js/javascript.js"></script> 

<?php
    include 'footer.php';
?>
