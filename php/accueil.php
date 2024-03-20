<?php
require_once('Connexion.php');

session_start();

$queryAdmins = "SELECT COUNT(*) AS numAdmins FROM joueur WHERE role = 'admin'";
$stmtAdmins = $connect->prepare($queryAdmins);
$stmtAdmins->execute();
$numAdmins = $stmtAdmins->fetchColumn();

$queryPlayers = "SELECT COUNT(*) AS numPlayers FROM joueur WHERE role = 'joueur'";
$stmtPlayers = $connect->prepare($queryPlayers);
$stmtPlayers->execute();
$numPlayers = $stmtPlayers->fetchColumn();

$queryQuestions = "SELECT COUNT(*) AS numQuestions FROM question WHERE est_active = 1"; // Assurez-vous que la condition est_active est correcte
$stmtQuestions = $connect->prepare($queryQuestions);
$stmtQuestions->execute();
$numQuestions = $stmtQuestions->fetchColumn();

$queryCategories = "SELECT COUNT(DISTINCT categorie) AS numCategories FROM question";
$stmtCategories = $connect->prepare($queryCategories);
$stmtCategories->execute();
$numCategories = $stmtCategories->fetchColumn();

$id_utilisateur = $_SESSION['id_utilisateur'] ?? null;

if ($id_utilisateur) {
    $queryUsername = "SELECT username FROM joueur WHERE id = :id_utilisateur";
    $stmtUsername = $connect->prepare($queryUsername);
    $stmtUsername->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $stmtUsername->execute();
    $userData = $stmtUsername->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        $username = $userData['username'];
    }
}

$connect = null;
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="css/accueil.css" rel="stylesheet" />
    <title>Accueil</title>
    <script>
        function checkAccess() {
            var role = "<?php echo $_SESSION['role'] ?? ''; ?>";
            if (role !== 'joueur') {
                return true;
            } else {
                return false;
            }
        }

        function showAccessDeniedMessage() {
            alert("Vous n'avez pas le droit d'accéder à ces pages");
        }
    </script>

</head>
<body>
    <div class="v1_6036">
        <div class="v1_6037">
            <div class="v1_6038">
                <a href="menu.php">
                <button class="v1_6039"></button>
                <div class="v1_6040"></div>
                <div class="v1_6041"></div> </a>
            </div>
            <div class="v1_6042">
                <div class="v1_6043"></div>
                <div class="v1_6044">
                    <div class="v1_6045"></div>
                </div>
            </div>
            <a href="profil.php">
            <button class="v1_6047"><?php if(isset($username)) echo $username; ?></button></a>
            <div class="v1_6048">
                <a href="jeux.php">
                <button class="v1_6049"></button></a>
                <div class="v1_6050">
                    <div class="v1_6051"></div>
                    <div class="v1_6052"></div>
                </div>
                <span class="v1_6053">Questions</span>
                <span class="v1_6054"><?php echo $numQuestions; ?></span>
                <div class="v8_4"></div>
                <div class="v1_6112">
                    <div class="v1_6113"></div>
                    <div class="v1_6114"></div>
                </div>
                <div class="v1_6115">
                    <div class="v1_6116"></div>
                    <div class="v1_6117"></div>
                </div>
            </div>
            <div class="v1_6118">
                <a href="jeux.php">
                <button class="v1_6119"></button></a>
                <div class="v1_6120">
                    <div class="v1_6121"></div>
                    <div class="v1_6122"></div>
                </div>
                <span class="v1_6123"> Catégories de jeux </span>
                <div class="v1_6124"></div>
                <span class="v1_6191"><?php echo $numCategories; ?></span>
                <div class="v8_3"></div>
            </div>
            <div class="v1_6185">
            <button class="v1_6186">
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] != 'joueur'): ?>
                <a href="admins.php">
            <?php endif; ?>
            </button>
                <div class="v1_6187">
                    <div class="v1_6188"></div>
                    <div class="v1_6189"></div>
                </div>
                <span class="v1_6190">Administrateurs</span>
                <span class="v1_6191"><?php echo $numAdmins; ?></span>
                <div class="v8_5"></div>
            </div>
            <div class="v1_6278">
            <button class="v1_6279">
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] != 'joueur'): ?>
                <a href="listejoueurs.php">
            <?php endif; ?>
            </button>
                <div class="v1_6280">
                    <div class="v1_6281"></div>
                    <div class="v1_6282"></div>
                </div>
                <span class="v1_6283">Joueurs</span>
                <span class="v1_6284"><?php echo $numPlayers; ?></span>
                <div class="v8_6"></div>
            </div>
            <div class="v1_6399">
                <div class="v1_6400">
           
