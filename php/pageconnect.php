<?php
include('Connexion.php');

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM joueur WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($password == $row['password']) {

            header("Location: accueil.html");
            exit();
        } else {
            echo "<script>alert('Mot de passe incorrect.');</script>";
        }
    } else {
        echo "<script>alert('Identifiant inexistant. Veuillez vous inscrire.');</script>";
    }
    if ($rowCount > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $role = $row['role'];
        $_SESSION['role'] = $role;

      header("Location: accueil.php");
      exit();
}

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="../css/pageconnect.css" rel="stylesheet" />
    <title>Page de connexion</title>
</head>
<body>
    <div class="v1_4886">
        <div class="v1_4887">
            <div class="v8_1"></div>
            <span class="v1_4981">Salut :) </span>
            <span class="v1_4982">Connectez-vous pour jouer</span>
            <form method="post" action="">
                <input name="id" class="v1_4983" placeholder="Identifiant">
                <div class="v100"></div>
                <input name="password" class="v1_4985" placeholder="Mot de passe">
                <div class="v101"></div>
                <div class="v1_4987">
                    <div class="v1_4988"></div>
                    <div class="v1_4989"></div>
                </div>
                <div class="v1_4990">
                    <div class="v1_4991"></div>
                    <button type="submit" name="submit" class="v1_4992">Continuer</button>
                </div>
            </form>
            <a href="creation.html" class="v1_4994">Vous n’avez pas de compte ? Créez-en un !!</a>
            <div class="v1_4995">
            </div>
        </div>
    </div>
</body>
</html>
