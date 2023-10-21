<?php 
require '../connexion.php';
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- the header section -->
    <div class="header">
          <img src="../img/sayna.png" alt="">
          <div class="right">
             <ul>
               <li><a href="#">Home</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="#">Profile</a></li>
               <li><a href="#">About us</a></li>
             </ul>
          </div>
    </div>
    
       <?php 
           echo $id=$_GET['id'];
           $sql1 = "SELECT * FROM todo WHERE id=$id";
           $todos1 = $conn->prepare($sql1);
           $todos1->execute();
           $show=$todos1->fetchAll(PDO::FETCH_ASSOC);
            
       ?>
        <?php foreach($show as $tache)  :?>
    <div class="main-section">
        <!-- section ajouter -->
       <div class="add-section">
            <!-- formulaire -->
            <form action="" method="POST" autocomplete="off">
                <input type="text" 
                     name="title" 
                     placeholder="Voulez-vous modifier <?=$tache['title'] ;?> "
                     value=""
                      />
                    <textarea name="description" id="description" cols="30" rows="10" 
                    placeholder="Voulez-vous modifier <?=$tache['description']; ?>"></textarea>
              <button type="submit" name="submit">Modifier &nbsp; <span>&#43;</span></button>
            </form>
            <!-- Fin Formulaire -->
       </div>
       <!-- Fin section Ajouter -->
        <?php endforeach; ?>
      <!-- Modify section  -->
      <?php 
   if(isset($_POST['submit'])){
       echo $id;
       $task=$_POST['title'];
       $description=$_POST['description'];
       $modify=$conn->prepare("UPDATE todo SET title=?,description=? WHERE id=$id");
       $modify->execute([$task,$description]);
       header('location:../index.php');    
   }
      ?>
    </div>
    <?php
       require '../html/footer.php';

    ?>
