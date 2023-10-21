<?php
  include 'connexion.php';
  header('location:index.php');
  $id=$_GET['id'];
  $change=$conn->prepare("UPDATE todo SET chec=1 WHERE id=?");
  $change->execute(array($id));
  
?>
