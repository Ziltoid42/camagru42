<body>
<?php
include 'header.php';
?>
<div class="container">
    <center>
        <div class="connexion">
            <div class="connexion_header">
                Recupération de mot de passe
            </div>
            <input type="password" id="passwd" placeholder="Nouveau Mot de passe"><br/>
            <input type="hidden" id="logmail" value="<?php echo $_GET['logmail'] ?>">
            <input onclick="modif_password()" type="submit" value="Valider">
            <div id="valide" class="valid" style="display:none;">
                <p>Votre mot de passe a bien été modifié</p>
            </div>
            <div id="fail" class="error" style="display:none;">
                <p>Il y a eu une erreur</p>
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