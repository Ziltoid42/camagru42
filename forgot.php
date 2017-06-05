
<?php
    include 'header.php';
     if (!$_SESSION)
        $_SESSION['login'] = '';
?>
<div class="container">
    <center>
        <div class="connexion">
            <div class="connexion_header">
                Recupération de mot de passe
            </div>
            <input type="text" id="login" placeholder="Identifiant ou Email"><br/>
            <input onclick="forgot()" class="button" type="submit" value="Récupération">
            <div id="valide" class="valid" style="display:none;">
                <p>Un e-mail viens de vous être envoyez pour réinitialiser votre mot de passe.</p>
            </div>
            <div id="fail" class="error" style="display:none;">
                <p>Nous n'avons pas pu trouver de compte associé</p>
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