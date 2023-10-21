<?php
  include 'connexion.php';
  //header('location:index0.php');
  $id=$_GET['id'];
  $change=$conn->prepare("UPDATE todo SET chec=0 WHERE id=?");
  $change->execute(array($id));
  
header('location:index.php');
  
?>
