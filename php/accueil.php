<?php
session_start(); 
include 'Connexion.php';

if(isset($_GET['id_utilisateur'])) {
    $id_utilisateur_connecte = $_GET['id_utilisateur']; 

} else {
    header("Location: pageconnect.php");
    exit();
}

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
            <div class="v1_6047"><?php echo $id_utilisateur_connecte; ?></div></a>
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
                    <div class="name"></div>

                    <div class="v1_6409">
                        <div class="v1_6410"></div>
                        <div class="v1_6411"></div>
                        <div class="v1_6412"></div>
                        <div class="v1_6413"></div>
                        <div class="v1_6414"></div>
                        <div class="v1_6415"></div>
                    </div>
                    <div class="name"></div>
                    <div class="v1_6419">
                        <div class="v1_6420"></div>
                        <div class="v1_6421"></div>
                        <div class="v1_6422"></div>
                        <div class="v1_6423"></div>
                    </div>
                    <div class="name"></div>
                    <div class="v1_6427">
                        <div class="v1_6428"></div>
                        <div class="v1_6429"></div>
                        <div class="v1_6430"></div>
                        <div class="v1_6431"></div>
                        <div class="v1_6432"></div>
                        <div class="v1_6433"></div>
                        <div class="v1_6434"></div>
                        <div class="v1_6435"></div>
                        <div class="v1_6436"></div>
                    </div>
                </div>
                <div class="v1_6437">
                    <div class="v1_6438"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
