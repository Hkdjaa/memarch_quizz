<?php
include('Connexion.php');

$sql = "SELECT * FROM joueur WHERE role = 'admin'";
$stmt = $connect->query($sql);
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="css/listejoueurs.css" rel="stylesheet" />
    <title>Liste des administrateurs</title>
</head>
<body>
    <div class="v1_642">
        <div class="v1_643">
            <div class="v1_644">
                <div class="v1_645"></div>
            </div>
            <span class="v1_646">Liste des administrateurs</span>
            <!-- Boucle pour afficher chaque joueur -->
            <?php foreach ($admins as $admin) { ?>
                <span class="v1_658"><?php echo $admin['nom']; ?></span>
                <div class="v1_659"></div>
            <?php } ?>
            <div class="v1_684">
                <a href="menu.php">
                    <button class="v1_685"></button>
                </a>
                <div class="v1_686"></div>
            </div>
        </div>
    </div>
</body>
</html>
