<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Home</title>

    <?php
    session_start();
    require('userNav.php');
    require('dataBase.php');

      
    ?>
  </head>
  <body>
  <div class="container" style="background-color: gray; margin-top: 20px;">
       <?php
        $storyID = $_GET['story_id'];
            $stmt = $mysqli->prepare("select title, content from blogData where story_id=?");
            $stmt->bind_param('i', $storyID);
            if(!$stmt){
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit;
            }
            $stmt->execute();
            $stmt->bind_result($title, $content);
               
           $blogArray = array();

            $stmt->fetch();
               echo '<h1>'. htmlspecialchars($title).'</h1>';
               echo '<p>' . htmlspecialchars($content). '<p>';

               if(isset( $_SESSION['user_ID'])){
                  
                    echo '<button type="submit"> Like </button>';
               }
      

        
            $stmt->close();
       ?>
        
</div>
 </body>
 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>