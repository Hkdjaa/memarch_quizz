<?php
session_start();


require_once('Connexion.php');

$queryCategories = "SELECT DISTINCT categorie FROM question";
$stmtCategories = $connect->prepare($queryCategories);
$stmtCategories->execute();
$categories = $stmtCategories->fetchAll(PDO::FETCH_COLUMN);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $libelle = $_POST['libelle'];
    $categorie = $_POST['categorie'];
    $est_active = isset($_POST['est_active']) ? 1 : 0;

    $queryInsertQuestion = "INSERT INTO question (libelle, categorie, est_active) VALUES (:libelle, :categorie, :est_active)";
    $stmtInsertQuestion = $connect->prepare($queryInsertQuestion);
    $stmtInsertQuestion->bindParam(':libelle', $libelle, PDO::PARAM_STR);
    $stmtInsertQuestion->bindParam(':categorie', $categorie, PDO::PARAM_STR);
    $stmtInsertQuestion->bindParam(':est_active', $est_active, PDO::PARAM_INT);
    $stmtInsertQuestion->execute();

    header("Location: confirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une question</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Ajouter une nouvelle question</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label>Libellé de la question :</label>
                <textarea name="libelle" rows="4" cols="50" required></textarea>
            </div>
            <div class="form-group">
                <label>Catégorie :</label>
                <select name="categorie" required>
                    <option value="" selected disabled>Choisir une catégorie</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                    <?php } ?>
                    <option value="nouvelle">Nouvelle catégorie</option>
                </select>
            </div>
            <div class="form-group">
                <input type="checkbox" id="est_active" name="est_active" value="1" checked>
                <label for="est_active">Activer la question</label>
            </div>
            <button type="submit">Ajouter la question</button>
        </form>
    </div>
</body>
</html>
