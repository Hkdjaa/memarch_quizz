<?php
include 'Connexion.php';

$user_id = 1;

$query = "SELECT SUM(temps_connexion) AS total_temps_connexion FROM statistiques_connexion WHERE joueur_id = :user_id";
$statement = $connect->prepare($query);
$statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

$total_temps_connexion = $result['total_temps_connexion'];

$heures = floor($total_temps_connexion / 3600);
$minutes = floor(($total_temps_connexion % 3600) / 60);

$temps_de_jeu = $heures . 'h ' . $minutes . 'min';

$queryTopScore = "SELECT q.libelle, ru.reponse_utilisateur, ru.est_correcte 
                 FROM reponse_utilisateur ru 
                 JOIN question q ON ru.id_question = q.id_question 
                 WHERE ru.id_joueur = :user_id AND ru.est_correcte = 1";
$statementTopScore = $connect->prepare($queryTopScore);
$statementTopScore->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$statementTopScore->execute();
$topScoreQuestions = $statementTopScore->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT q.categorie, ru.id_joueur, SUM(ru.est_correcte) AS total_correct_answers
          FROM reponse_utilisateur ru
          JOIN question q ON ru.id_question = q.id_question
          GROUP BY q.categorie, ru.id_joueur
          ORDER BY q.categorie, total_correct_answers DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$bestPlayers = array();

foreach ($result as $row) {
    $categorie = $row['categorie'];
    $id_joueur = $row['id_joueur'];
    $total_correct_answers = $row['total_correct_answers'];

     if (!isset($bestPlayers[$categorie])) {
       $bestPlayers[$categorie] = array(
            'id_joueur' => $id_joueur,
            'total_correct_answers' => $total_correct_answers
        );
    }
}
if (empty($bestPlayers)) {
    echo '<div class="no-data">Aucun résultat disponible</div>';
} else {
    foreach ($bestPlayers as $categorie => $playerInfo) {
        echo '<div class="player-info">';
        echo '<span class="player-id">' . $playerInfo['id_joueur'] . '</span>';
        echo '<span class="player-score">' . $playerInfo['total_correct_answers'] . '/6</span>';
        echo '<span class="player-category">' . $categorie . '</span>';
        echo '</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="../css/stat.css" rel="stylesheet" />
    <title>Statistiques</title>
</head>
<body>
    <div class="v1_919">
        <div class="v1_920">
            <span class="v1_921">Statistiques</span>
            <div class="v1_922">
                <a href="menu.php">
                <button class="v1_923"></button></a>
                <div class="v1_924"></div>
            </div>
            <div class="v1_941">
                <div class="v1_942"></div>
                <div class="v1_943"></div>
                <span class="v1_944">Temps de jeu </span>
                <span class="v1_945" id="temps_de_jeu"><?php echo $temps_de_jeu; ?></span>
                <div class="v1_946">
                    <div class="v1_947">
                        <div class="v1_948"></div>
                        <div class="v1_949"></div>
                    </div>
                </div>
            </div>
            <span class="v1_950">Top score</span>
            <?php foreach ($bestPlayers as $categorie => $playerInfo) : ?>
            <?php if ($categorie == 'animes') : ?>
            <div class="v1_971">
            <div class="v1_972"></div>
            <span class="v1_974"><?php echo $playerInfo['id_joueur']; ?> <?php echo $playerInfo['total_correct_answers']; ?>/6</span>
            <span class="v1_975"><?php echo $categorie; ?></span>
        </div>
        <?php elseif ($categorie == 'series') : ?>
        <div class="v26_54">
            <div class="v26_55"></div>
            <span class="v26_56"><?php echo $playerInfo['id_joueur']; ?> <?php echo $playerInfo['total_correct_answers']; ?>/6</span>
            <span class="v26_57"><?php echo $categorie; ?></span>
        </div>
    <?php elseif ($categorie == 'foot') : ?>
        <div class="v26_58">
            <div class="v26_59"></div>
            <span class="v26_60"><?php echo $playerInfo['id_joueur']; ?> <?php echo $playerInfo['total_correct_answers']; ?>/6</span>
            <span class="v26_61"><?php echo $categorie; ?></span>
        </div>
    <?php elseif ($categorie == 'applications') : ?>
        <div class="v26_100">
            <div class="v26_101"></div>
            <span class="v26_102"><?php echo $playerInfo['id_joueur']; ?> <?php echo $playerInfo['total_correct_answers']; ?>/6</span>
            <span class="v26_103"><?php echo $categorie; ?></span>  
        </div>
    <?php elseif ($categorie == 'religion') : ?>
        <div class="v26_104">
            <div class="v26_105"></div>
            <span class="v26_106"><?php echo $playerInfo['id_joueur']; ?> <?php echo $playerInfo['total_correct_answers']; ?>/6</span>
            <span class="v26_107"><?php echo $categorie; ?></span>  
        </div>
    <?php endif; ?>
<?php endforeach; ?>

        </div>
    </div>

    <script>
        stat(function() {
            var tempsDeJeuElement = document.getElementById("temps_de_jeu");
            var tempsDeJeuTexte = tempsDeJeuElement.innerText;
            var heures = parseInt(tempsDeJeuTexte.split('h')[0]);
            var minutes = parseInt(tempsDeJeuTexte.split(' ')[1].split('min')[0]);
            minutes++;
            if (minutes == 60) {
                heures++;
                minutes = 0;
            }
            tempsDeJeuElement.innerText = heures + 'h ' + minutes + 'min';
        }, 60000);
    </script>
</body>
</html>