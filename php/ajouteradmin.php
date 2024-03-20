<?php
include 'Connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $id = $_POST['id'];
    $numero = $_POST['numero'];

    $query = "INSERT INTO joueur (nom, prenom, id, numero, role) VALUES (:nom, :prenom, :id, :numero, :role)";
    $statement = $connect->prepare($query);

    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':numero', $numero, PDO::PARAM_STR);
    $statement->bindValue(':role', 'admin', PDO::PARAM_STR);

    if ($statement->execute()) {
        echo "Utilisateur ajouté avec succès en tant qu'administrateur.";
    } else {
        echo "Une erreur s'est produite lors de l'ajout de l'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="css/infosjoueur.css" rel="stylesheet" />
    <title>Ajout admin</title>
</head>
<body>
    <div class="v1_1339">
        <div class="v1_1340">
            <span class="v1_1341">Ajouter un admin</span>
            <div class="v1_1342">
                <a href="profil.php">
                <button class="v1_1343">Retour</button></a>
            </div>
            <div class="v1_1361">
                <input class="v1_1362" placeholder="Prénom" id="prenom">
                <div class="name"></div>
                <div class="v1_1348"></div>
            </div>
            <div class="v1_1364">
                <input class="v1_1365" placeholder="Nom" id="nom">
                <div class="name"></div>
            </div>
            <div class="v1_1367">
                <input class="v1_1368" placeholder="Identifiant" id="identifiant">
                <div class="name"></div>
            </div>
            <div class="v1_1370">
                <input class="v1_1371" placeholder="Numéro de téléphone" id="numero">
                <div class="name"></div>
            </div>
            <div class="v1_1373">
                <input class="v1_1374" placeholder="Bio" id="bio">
                <div class="name"></div>
            </div>
            <div class="v1_1377">
                <div class="v1_1378"></div>
                <button class="v1_1379" onclick="ajouter()">Ajouter</button>
            </div>
        </div>
        <span class="v26_62">Ajouter un administrateur qui aura accès à l'ensemble des données</span>
    </div>

    <script>
        function modifier() {
            var prenom = document.getElementById('prenom').value;
            var nom = document.getElementById('nom').value;
            var identifiant = document.getElementById('identifiant').value;
            var numero = document.getElementById('numero').value;
            var bio = document.getElementById('bio').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'modification.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send('prenom=' + prenom + '&nom=' + nom + '&identifiant=' + identifiant + '&numero=' + numero + '&bio=' + bio);
        }
    </script>
</body>
</html>
