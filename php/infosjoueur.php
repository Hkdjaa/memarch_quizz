<?php
session_start();

if(isset($_SESSION['id_utilisateur'])) {
    $id_utilisateur = $_SESSION['id_utilisateur'];

    require_once('Connexion.php');

    $query = "SELECT prenom, nom, id, numero, bio FROM joueur WHERE id = :id";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':id', $id_utilisateur);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    $placeholderPrenom = isset($userData['prenom']) ? $userData['prenom'] : "";
    $placeholderNom = isset($userData['nom']) ? $userData['nom'] : "";
    $placeholderIdentifiant = isset($userData['id']) ? $userData['id'] : "";
    $placeholderNumero = isset($userData['numero']) ? $userData['numero'] : "";
    $placeholderBio = isset($userData['bio']) ? $userData['bio'] : "";
} else {
    header("Location: pageconnect.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link href="css/infosjoueur.css" rel="stylesheet" />
    <title>Vos infos</title>
</head>
<body>
    <div class="v1_1339">
        <div class="v1_1340">
            <span class="v1_1341">Modifier le compte</span>
            <div class="v1_1342">
                <a href="profil.php">
                <button class="v1_1343">Retour</button></a>
            </div>
            <div class="v1_1361">
                <input class="v1_1362" placeholder="<?php echo $placeholderPrenom; ?>" id="prenom">
                <div class="name"></div>
                <div class="v1_1348"></div>
            </div>
            <div class="v1_1364">
                <input class="v1_1365" placeholder="<?php echo $placeholderNom; ?>" id="nom">
                <div class="name"></div>
            </div>
            <div class="v1_1367">
                <input class="v1_1368" placeholder="<?php echo $placeholderIdentifiant; ?>" id="identifiant">
                <div class="name"></div>
            </div>
            <div class="v1_1370">
                <input class="v1_1371" placeholder="<?php echo $placeholderNumero; ?>" id="numero">
                <div class="name"></div>
            </div>
            <div class="v1_1373">
                <input class="v1_1374" placeholder="<?php echo $placeholderBio; ?>" id="bio">
                <div class="name"></div>
            </div>
            <div class="v1_1377">
    <div class="v1_1378"></div>
    <button class="v1_1379" onclick="modifier(<?php echo $id_utilisateur; ?>)">Mettre à jour</button>
</div>

        </div>
        <span class="v26_62">Modifiez les données que vous 
            souhaitez puis cliquez sur “Mettre à jour” pour 
            qu’elles soient correctement affectées</span>
    </div>

    <script>
function modifier(idUtilisateur) {
    var prenom = document.getElementById('prenom').value;
    var nom = document.getElementById('nom').value;
    var identifiant = document.getElementById('identifiant').value;
    var numero = document.getElementById('numero').value;
    var bio = document.getElementById('bio').value;
    var url = 'modification.php?id=' + idUtilisateur;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
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
