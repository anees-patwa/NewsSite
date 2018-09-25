<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Home</title>

    <?php
    session_start();
    if(isset($_SESSION['userID'])){
      require('userNav.php');
    } else {
      require('nonUserNav.php');
    }
    ?>
  </head>
  <body>
  <div class="container" style="background-color: gray; margin-top: 20px;">
       <?php
            require("dataBaseAnees.php");
            $stmt = $mysqli->prepare("select title, content, link from blogData");
            if(!$stmt){
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit;
            }
            $stmt->execute();
            $stmt->bind_result($title, $content, $link);
               
           $blogArray = array();

            while($stmt->fetch()){
              echo '<a href= '. $link . '>' . htmlspecialchars($title). '>';
      

        }
            $stmt->close();
       ?>
            
                 <!-- for($i = 0; $i < 1; $i++){
                     $blogArray[i][0]= $title; 
                     echo $blogArray[i][0];
                     echo '<p></p>';
                     for($b =0; $b < 1; $b++){
                         $blogArray[0][b]= $content; 
                         echo $blogArray[0][b];
                     }
                } -->
</div>
 </body>
 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>