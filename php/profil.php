<?php
include 'Connexion.php';

$id_joueur = 1;
$categories_quizz = array(
    1 => "Quizz animés",
    2 => "Quizz séries sénégalaises",
    3 => "Quizz foot",
    4 => "Quizz applications",
    5 => "Quizz religieux"
);
function getScoreQuizz($id_joueur, $categories_quizz, $connect) {
    $query = "SELECT COUNT(*) AS score 
    FROM reponse_utilisateur 
    INNER JOIN question ON reponse_utilisateur.id_question = question.id_question 
    WHERE reponse_utilisateur.id_joueur = :id_joueur 
    AND question.categorie = :id_categorie 
    AND reponse_utilisateur.est_correcte = 1";

    $statement = $connect->prepare($query);
    $statement->bindParam(':id_joueur', $id_joueur, PDO::PARAM_INT);
    $statement->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['score'];

}

function getRoleUtilisateur($id_joueur, $connect) {
    $query = "SELECT role FROM joueur WHERE id = :id_joueur";
    $statement = $connect->prepare($query);
    $statement->bindParam(':id_joueur', $id_joueur, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result['role'];
}

$role_utilisateur = getRoleUtilisateur($id_joueur, $connect);

?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="../css/profil.css" rel="stylesheet" />
    <title>Profil</title>
</head>
<body>
    <div class="v1_3954">
    <div class="v1_3955">
            <span class="v1_3956">Informations <?php echo ($role_utilisateur == 'admin') ? 'de l\'administrateur' : 'du joueur'; ?></span>
            <?php if ($role_utilisateur == 'admin') : ?>
                <a href="ajouteradmin.php">
                    <button class="v1_4045">Ajouter un admin</button>
                </a>
            <?php endif; ?>
            <span class="v1_3982">CATEGORY</span>
            <div class="v1_4044">
            <a href="menu.php">
                <div class="v1_4045"></div></a>
                <div class="v1_4046"></div>
            </div>
        </div>
        <div class="v27_64">
            <div class="v27_65"></div>
            <span class="v27_66">JOUEUSE</span>
            <div class="v27_67"></div>
            <div class="v27_68">
                <div class="v27_69"></div>
            </div>
            <div class="v27_70">
                <div class="v27_71">
                    <div class="v27_72">
                        <div class="v27_73"></div>
                    </div>
                </div>
            </div>
            <span class="v27_74">Fanianglabelle</span>
            <span class="v27_75">Coucou C’est Ndeye Faniang Et je suis la best !</span>
            <span class="v27_76">BIO</span>
            <div class="v27_77">
                <div class="v27_78"></div>
                <a href="infosjoueur.php">
                    <span class="v27_79">Modifier </span></a>
            </div>
        </div>
        <div class="v27_80"></div>
        <span class="v27_84">Scores du joueur</span>
        <div class="v27_85"></div>
        <div class="v135_5"></div>
        <span class="v135_7">Meilleur score</span>
        <span class="v135_13">Quizz applications</span>
        <span class="v135_52"><?php echo getScoreQuizz($id_joueur, 5, $connect); ?>/6</span>
        <span class="v27_86">Quizz animés</span>
        <span class="v27_87">Meilleur score</span>
        <span class="v27_88"><?php echo getScoreQuizz($id_joueur, 1, $connect); ?>/6</span>
        <div class="v27_97"></div>
        <div class="v27_101"></div>
        <span class="v135_50">Quizz foot</span>
        <div class="v135_48"></div>
        <span class="v135_51">Meilleur score</span>
        <span class="v27_102">Quizz religion</span>
        <span class="v27_103">Meilleur score</span>
        <span class="v27_104"><?php echo getScoreQuizz($id_joueur, 3, $connect); ?>/6</span>
        <span class="v135_8"><?php echo getScoreQuizz($id_joueur, 4, $connect); ?>/6</span>
        <div class="v27_89"></div>
        <div class="v27_93"></div>
        <span class="v27_94">Quizz séries sen</span>
        <span class="v27_95">Meilleur score</span>
        <span class="v27_96"><?php echo getScoreQuizz($id_joueur, 2, $connect); ?>/6</span>
    </div>
</body> 
</html> 