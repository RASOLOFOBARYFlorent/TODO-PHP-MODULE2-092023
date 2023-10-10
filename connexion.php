<?php 

$nomServeur = "localhost";
$nomUtilisateur = "root";
$pass = "";
$nomBaseDonnee = "todolist";

try {
    $conn = new PDO("mysql:host=$nomServeur;dbname=$nomBaseDonnee", 
                    $nomUtilisateur, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "connexion echouee: ". $e->getMessage();
}