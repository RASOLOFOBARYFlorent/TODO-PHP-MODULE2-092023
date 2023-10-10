<?php 
require 'connexion.php';
require 'html/header.php';

?>

    <div class="main-section">

        <!-- section ajouter -->
       <div class="add-section">

            <!-- formulaire -->
            <form action="app/ajouter.php" method="POST" autocomplete="off">

                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                    <input type="text" 
                        name="title" 
                        style="border-color: #ff6666"
                        placeholder="Completez le champ s'il vous plait :)" />
                    <button type="submit">Add &nbsp; <span>&#43;</span></button>

                <?php }else{ ?>

                <input type="text" 
                     name="title" 
                     placeholder="Qu'est-ce que vous voulez faire?" />
              <button type="submit">Ajouter &nbsp; <span>&#43;</span></button>
             <?php } ?>
            </form>
            <!-- Fin Formulaire -->
       </div>
       <!-- Fin section Ajouter -->

       <!-- Affichage to do list -->
       <?php 
          $todos = $conn->query("SELECT * FROM todo ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() >= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.jpg" width="50%" />
                        <br>
                        <img src="img/Ellipsis.gif" width="30px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>cree le: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>
        </div>
        <!-- Fin Affiche to do list -->


    </div>
    <?php
       require 'html/footer.php';

    ?>
    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/supprimer.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });  

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
            });
        });
    </script> 
</body>
</html>