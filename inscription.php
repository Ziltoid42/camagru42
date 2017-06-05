<?php session_start(); ?>

<?php
    include 'header.php';
?>
    <div class="container">
        <center>
        <div class="connexion">
        <div class="connexion_header">
            Inscription
        </div>
            <input type="text" id="login" placeholder="Identifiant"><br/>
            <div id="inexistant" class="error" style="display:none">
                <p>Vous n'avez pas indiqué de login</p>
            </div>
            <div id="login_error" class="error" style="display:none">
                <p>Login deja existant</p>
            </div>
            <input type="email" id="email" placeholder="Email"><br/>
            <div id="email_error" class="error" style="display:none">
                <p>Email invalide</p>
            </div>
            <input type="password" id="password"  placeholder="Mot de passe"><br/>
            <div id="password_error" class="error" style="display:none">
                <p>Vous n'avez pas indiqué de password</p>
            </div>
            <div id="password_error2" class="error" style="display:none">
                <p>Le password doit contenir au moins un chiffre, une lettre et au moins six charateres </p>
            </div>
            <input type="password" id="password2" placeholder="Vérification Mot de passe"><br/>
            <div id="password2_error" class="error" style="display:none">
                <p>Vous n'avez pas indiqué de password de verification</p>
            </div>
            <div id="different" class="error" style="display:none">
                <p>Les deux mots de passe ne correspondent pas.</p>
            </div>
            <input onclick="inscription(readData)" class="button" type="submit" value="Inscription">
            <div id="valide" class="valid" style="display:none">
                <p>Pour completer votre inscription veuiller consulter vos mails.</p>
            </div>
        </div>
        </center>
    </div>
<?php
    include 'footer.php';
?>
<script src="js/javascript.js"></script>
</body>
</html>