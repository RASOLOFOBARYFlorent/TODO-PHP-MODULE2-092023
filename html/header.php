
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- the header section -->
    <div class="header">
        <img src="img/sayna.png" alt="">
        <div class="research">
              <form action="index.php" method="POST">
                 <input type="text" name="key" id="keyresearch">
                 <button type="submit" name="submit" id="research">Rechercher</button>
                 <?php 
                     //require '../connexion.php';
                     include 'connexion.php';
                     
                     if(isset($_POST['submit'])){         
                            if(!empty($key=$_POST['key'])){
                                $req=$conn->prepare("SELECT * FROM todo WHERE title=?");
                                $req->execute([$key]);
                                $resultat=$req->fetchAll(PDO::FETCH_ASSOC);
                                }
                     }
                     
                  ?>

               </form>
          </div>
          <div class="right">
             <ul>
               <li><a href="#">Home</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="#">Profile</a></li>
               <li><a href="#">About us</a></li>
             </ul>
          </div>
    </div>
    
