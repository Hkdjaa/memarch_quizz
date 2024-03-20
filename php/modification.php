<?php
require_once('Connexion.php');

if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['identifiant']) && isset($_POST['numero']) && isset($_POST['bio'])) {

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $identifiant = $_POST['identifiant'];
    $numero = $_POST['numero'];
    $bio = $_POST['bio'];

    $sql = "UPDATE joueur SET prenom = :prenom, nom = :nom, identifiant = :identifiant, numero = :numero, bio = :bio WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':identifiant', $identifiant);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':bio', $bio);
    $user_id = 1;
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();

    header("Location: profil.php");
    exit();
} else {
    header("Location: erreur.php");
    exit();
}
?>