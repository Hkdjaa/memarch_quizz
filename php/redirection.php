<?php
include('Connexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_joueur = $_POST['id'];
    $id_question = $_POST['id_question'];
    $reponse_utilisateur = $_POST['reponse_utilisateur'];

    $query = "SELECT reponse_correcte FROM question WHERE id = :id_question";
    $statement = $connect->prepare($query);
    $statement->execute(array(':id_question' => $id_question));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $reponse_correcte = $result['reponse_correcte'];

    $est_correcte = ($reponse_utilisateur == $reponse_correcte) ? 1 : 0;

    $query = "INSERT INTO reponse_utilisateur (id, id_question, reponse_utilisateur, est_correcte) VALUES (:id, :id_question, :reponse_utilisateur, :est_correcte)";
    $statement = $connect->prepare($query);
    $statement->execute(array(':id' => $id_joueur, ':id_question' => $id_question, ':reponse_utilisateur' => $reponse_utilisateur, ':est_correcte' => $est_correcte));

    header("Location: jeux.php"); 
    exit();
}
?>