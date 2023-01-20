<?php

$civilite = $_POST['civilite'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$adressLine1 = $_POST['adressLine1'];
$adressLine2 = $_POST['adressLine2'];
$adressPostalCode = $_POST['adressPostalCode'];
$adressCity = $_POST['adressCity'];
$adressState = $_POST['adressState'];
$DDN = $_POST['DDN'];
$sport = $_POST['sport'];
$regionRadio = $_POST['regionRadio'];

$lat = 0;
$long = 0;

switch ($regionRadio) {
    case "Bretagne":
        $lat = 48.2641;
        $long = -2.9202;
        break;
    case "Basse Normandie":
        $lat = 48.8789;
        $long = -0.5157;
        break;
    case "Ile de France":
        $lat = 48.85;
        $long = 2.6371;
        break;
    case "Haute Normandie":
        $lat = 49.5247;
        $long = 0.8829;
        break;
    case "Nord Pas de Calais":
        $lat = 50.4802;
        $long = 2.7938;
        break;
    case "Picardie":
        $lat = 49.6637;
        $long = 2.5281;
        break;
    case "Champagne Ardenne":
        $lat = 48.7935;
        $long = 4.4726;
        break;
    case "Lorraine":
        $lat = 48.8745;
        $long = 6.2081;
        break;
    case "Alsace":
        $lat = 48.3182;
        $long = 7.4417;
        break;
    case "Franche Comté":
        $lat = 47.1344;
        $long = 6.0224;
        break;
    case "Bourgogne":
        $lat = 47.0526;
        $long = 4.3838;
        break;
    case "Centre":
        $lat = 46.2277;
        $long = 2.2138;
        break;
    case "Pays de la Loire":
        $lat = 47.7633;
        $long = -0.3299;
        break;
    case "Poitou Charentes":
        $lat = 46.2277;
        $long = 2.2138;
        break;
    case "Poitou Charentes":
        $lat = 45.9036;
        $long = -0.3091;
        break;
    case "Limousin":
        $lat = 45.8933;
        $long = 1.5697;
        break;
    case "Auvergne":
        $lat = 45.7033;
        $long = 1.5697;
        break;
    case "Rhône Alpes":
        $lat = 45.1696;
        $long = 5.4503;
        break;
    case "Provence Alpes Côte D'Azur":
        $lat = 43.9352;
        $long = 6.068;
        break;
    case "Languedoc Roussillon":
        $lat = 43.5913;
        $long = 3.2584;
        break;
    case "Provence Alpes Côte D'Azur":
        $lat = 44.086;
        $long = 1.5209;
        break;
    case "Aquitaine":
        $lat = 44.7003;
        $long = -0.2995;
        break;
    case "Corse":
        $lat = 42.0397;
        $long = 9.0129;
        break;
}

$content = file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=$lat&longitude=$long&current_weather=true");
$postContent = json_decode($content);
$weather = $postContent->current_weather;
$temp = $weather->temperature;
$vent = $weather->windspeed;
$direction = $weather->winddirection;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link href="../CSS Files/Global.css" rel="stylesheet" />
    <link href="../CSS Files/Contact.css" rel="stylesheet" />
    <title>Le monde de la glisse</title>
</head>

<body>
<header class="square, square-animation">
        <div class="settingsHeader">
            <div>
                <a class="logo" href="index.html">
                    <logo>Le monde de la glisse</logo>
                </a>
            </div>
            <div class="home_menu">
                <div class="dropdown">
                    <a class="dropbtn" href="Vetement.html">Vêtements</a>
                    <div class="dropdown-content">
                        <a href="Homme.php">Hommes</a>
                        <a href="Femme.php">Femmes</a>
                        <a href="Enfant.php">Enfants</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="dropbtn" href="Accessoires.html">Accessoires</a>
                    <div class="dropdown-content">
                        <a href="Ski_nautique.php">Ski nautique</a>
                        <a href="Planche_à_voile.php">Planche à voile</a>
                        <a href="SUP.php">SUP</a>
                        <a href="Canoë_Kayak.php">Canoë Kayak</a>
                    </div>
                </div>
                <a class="notImg" href="Tutoriels.html">Tutoriels</a>
                <a class="notImg" href="Contact.html">Contact</a>
                <a href="Panier.php"><img class="logo_panier" src="../content/shopping-cart.png" width="45" /></a>
            </div>
        </div>
    </header>
    <div class="main">
        <img class="imgFull" src="../src/ocean-1867285_1920.webp" alt="" height="962em" />
        <div class="form">
            <div class="resumeText">
                <h3>Ce que vous avez renseigné :</h3>
                <p>Votre sexe : <i><?php echo $civilite; ?></i></p>
                <p>Votre prénom : <i><?php echo $firstname; ?></i></p>
                <p>Votre nom : <i><?php echo $lastname; ?></i></p>
                <p>Votre addresse : <i><?php echo $adressLine1; ?> <?php echo $adressLine2; ?></i></p>
                <p><i><?php echo $adressPostalCode; ?> <?php echo $adressCity; ?>, <?php echo $adressState; ?></i></p>
                <p>Votre date de naissance : <i><?php echo $DDN; ?></i></p>
                <p>Vos sprots pratiqués : <i><?php echo $sport; ?></i></p><br>
                <p>Votre région : <i><?php echo $regionRadio; ?></i></p><br>
                <p>Il fait acctuelement <?php echo $temp ?>°C avec un vent de <?php echo $vent ?>km/h dans une direction <?php echo $direction ?>°Nord</p>
            </div>
        </div>
    </div>
    <footer>
        <div class="flexPart">
            <div>
                <a href="index.html" class="titreFooter">Accueil</a>
                <a href="Tutoriels.html">Tutoriels</a>
                <a href="Contact.html">Contact</a>
                <a href="Panier.php">Panier</a>
            </div>
            <div>
                <a href="Vetement.html" class="titreFooter">Vêtements</a>
                <a href="Homme.php">Homme</a>
                <a href="Femme.php">Femme</a>
                <a href="Enfant.php">Enfant</a>
            </div>
            <div>
                <a href="Accessoires.html" class="titreFooter">Accessoires</a>
                <a href="Ski_nautique.php">Ski nautique</a>
                <a href="Planche_à_voile.php">Planche à voile</a>
                <a href="SUP.php">SUP</a>
                <a href="Canoë_Kayak.php">Canoë Kayak</a>
            </div>
            <div>
                <a class="titreFooter">Langues</a>
                <a href="../Pages/index.html">Français</a>
                <a href="../Pages_en/index.html">Anglais</a>
            </div>
        </div>
        <div class="endFooter">
            <hr />
            <p>Copyright © 2022 CADEL - MILLIES-LACROIX. Tous droits réservés.</p>
        </div>
    </footer>
</body>

</html>