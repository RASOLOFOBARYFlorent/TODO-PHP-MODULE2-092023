<?php 
require 'db-config.php';

try{
   $option = 
   [
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => false
   ];

   $conn = new PDO($DB_DSN, $DB_USR, $DB_PASS,$option);
   
}catch(PDOException $e)
{
   echo "connexion echouee: ". $e->getMessage();
}
?>