<?php
session_start();

$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
$is_joueur = isset($_SESSION['role']) && $_SESSION['role'] === 'joueur';
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="css/menu.css" rel="stylesheet" />
    <title>Menu</title>
    <script>
        function verifierRole() {
            var role = "<?php echo $is_joueur ? 'joueur' : 'admin'; ?>";
            if (role === "joueur") {
                alert("Vous n'avez pas accès à cette page");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="v1_440">
        <div class="v1_441">
            <div class="v1_442">
                <div class="v1_443"></div>
            </div>
            <a href="accueil.php">
            <div class="v1_448">Retour</div></a>
            <a href="profil.php">
            <div class="v1_449">Mon profil</div></a>
            <a href="accueil.php">
            <div class="v1_450">Accueil</div></a>
            <a href="stat.php"><div class="v1_451">Statistiques</div></a>
            <?php if ($is_admin): ?>
                <a href="stat.php"><button class="v1_451">Statistiques</button></a>
                <a href="listejoueurs.php"><button class="v1_452">Joueurs</button></a>
            <?php else: ?>
                <button class="v1_452" onclick="return verifierRole()">Joueurs</button>
            <?php endif; ?>
            <a href="jeux.php">
            <div class="v1_453">Jeux</div></a>
            <div class="v1_479">
                <div class="v1_480"></div>
                <div class="v1_481"></div>
                <div class="v1_482"></div>
            </div>
            <div class="v1_483">
                <div class="v1_484"></div>
            </div>
            <div class="name"></div>
            <div class="v1_488">
                <div class="v1_489"></div>
                <div class="v1_490"></div>
                <div class="v1_491"></div>
                <div class="v1_492"></div>
                <div class="v1_493"></div>
                <div class="v1_494"></div>
            </div>
            <div class="v1_495">
                <div class="v1_496"></div>
                <div class="v1_497"></div>
                <div class="v1_498"></div>
                <div class="v1_499"></div>
                <div class="v1_500"></div>
                <div class="v1_501"></div>
                <div class="v1_502"></div>
                <div class="v1_503"></div>
                <div class="v1_504"></div>
            </div>
            <div class="name"></div>
            <div class="v1_508">
                <div class="v1_509"></div>
                <div class="v1_510"></div>
                <div class="v1_511"></div>
            </div>
            <div class="v1_519">
                <a href="pageconnect.php">
                <div class="v1_520"> Deconnexion</div></a>
                <div class="v1_521">
                    <div class="v1_522"></div>
                    <div class="v1_523"></div>
                    <div class="v1_524"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
