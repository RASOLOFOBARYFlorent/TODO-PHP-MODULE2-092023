<?php
    //connexion a la base de données
    require '../connexion.php';

    //récupération de l'id dans le lien
    $id= $_GET['id'];

    //requête de suppression
    $stmt = $conn->prepare("DELETE FROM todo WHERE id=$id");
    $stmt->execute();
    
    //redirection vers la page index.php
    header("Location: ../index.php");
?>