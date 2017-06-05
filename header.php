


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Camagru">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="global">

<video id="cover_video" class="cover" loop muted preload="auto" autoplay data-reactid="56">
<source src="img/cover.mp4" type="video/mp4" data-reactid="57">
</video>

<div class="header">
    <table class="navigation-container">
        <tbody>
        <tr>
            <td id="logo" class="navigation-alignement">
                <img src="img/my-saucisson-logo.png" height="30" width="30">
            </td> 
            <?php
            if (!$_SESSION["login"]) {
            ?>
            <td id="home" class="navigation-alignement">
                <a href="index.php">Home</a>
            </td>
            <td id="galerie" class="navigation-alignement">
                    <a href="galerie.php">Galerie</a>
            </td>
                <?php
            }
            else {
                ?>
                <td id="home" class="navigation-alignement">
                <a href="index.php">Home</a>
                </td>
                <td id="webcam" class="navigation-alignement">
                    <a href="webcam.php">Webcam</a>
                </td>
                <td id="galerie" class="navigation-alignement">
                    <a href="galerie.php">Galerie</a>
                </td>
                <?php
            }
            ?>
        <?php
        if ($_SESSION["login"])
        {
            ?>
            <td class="navigation-alignement" style=" margin-top: 25px; float: right;">Bonjour <?php echo $_SESSION["login"]; ?> 
                <button class="button" onclick="logout()">Deconnexion</button> 
            </td> 

            <?php
        }
    ?>


        </tr>
        </tbody>
    
    
    </table>
</div>

