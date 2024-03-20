<?php
require_once("Connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['numero'], $_POST['id'], $_POST['password'], $_POST['role'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $numero = $_POST['numero'];
        $id = $_POST['id'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $query = $connect->prepare("INSERT INTO joueur (nom, prenom, numero, id, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        $testquery = $query->execute([$nom, $prenom, $numero, $id, $password, $role]);

        if ($testquery) {
            echo "Bien inséré";
            header("Location: accueil.php");
        } else {
            echo "Erreur lors de l'insertion";
        }
    } else {
        echo "Les données nécessaires ne sont pas définies ou vides";
    }
}

$resultats = $connect->query("SELECT * FROM joueur");
?>


<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="css/creation.css" rel="stylesheet" />
    <title>Craation</title>
</head>
<body>
    <form method="post" action="" id="registrationForm" onsubmit="return valider()">
        <div class="v1_6874">
            <div class="v1_6875">
                <span class="v1_6876">Creer un compte</span>
                <div class="v8_0"></div>
                <span class="v1_6961">Remplissez ce formulaire pour avoir acces à cette application</span>
                <a href="pageconnect.php">
                    <h2 class="v1_6962">Vous avez deja un compte? Se connecter</h2>
                </a>
                <input class="v1_6963" id="nom" name="nom" placeholder="Nom" required>
                <div class="v100"></div>
                <input class="v1_6965" id="prenom" name="prenom" placeholder="Prénom" required>
                <div class="v101"></div>
                <input class="v1_6967" placeholder="+221">
                <input class="v1_6968" id="numero" name="numero" placeholder="Numéro de téléphone" required>
                <div class="name"></div>
                <div class="v102"></div>
                <input class="v1_6971" id="id" name="id" placeholder="Identifiant" required>
                <div class="v103"></div>
                <input class="v1_6973" id="password" name="password" type="password" placeholder="Mot de passe" required>
                <div class="v104"></div>
                <input class="v1_6975" id="password_confirm" name="password_confirm" type="password" placeholder="Confirmer le mot de passe" required>
                <div class="v105"></div>
                <select class="v1_6976" id="role" name="role" readonly>
    <option id="joueur" name="joueur" value="joueur">joueur</option>
</select>

                <div class="v1_6977">
                    <div class="v1_6978"></div>
                    <div class="v1_6979"></div>
                </div>
                <div class="v1_6980">
                    <div class="v1_6981"></div>
                    <div class="v1_6982"></div>
                </div>
                <div class="v1_6983">
                    <div class="v1_6984"></div>
                    <button class="v1_6985" type="submit" name="submit">Creer un compte</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function valider() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirm").value;
            
            if (password != confirmPassword) {
                alert("Les mots de passe ne correspondent pas.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
