<?php

if(isset($_POST['title'])){
    require '../connexion.php';

    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todo (title,description) VALUE(?,?)");
        $res = $stmt->execute([$title,$description]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}
?>