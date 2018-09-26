<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Home</title>

    <?php
    session_start();
    
    if(!isset($_SESSION['userID'])){
      require('nonUserNav.php');
    } else {
      require('userNav.php');
    }
    
    require('dataBaseAnees.php');

      
    ?>
  </head>
  <body>
  <div class="container" style="background-color: white; margin-top: 20px;">
       <?php
        $storyID = $_GET['story_id'];
            $stmt = $mysqli->prepare("select title, content from stories where story_id=?");
            $stmt->bind_param('d', $storyID);
            if(!$stmt){
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit;
            }
            $stmt->execute();
            $stmt->bind_result($title, $content);
            $stmt->fetch();
            echo "<div style='text-align:center'>";
               printf( '<h1>%s</h1>', htmlspecialchars($title));
            echo "</div>";
               printf('<p>%s<p>', htmlspecialchars($content));
            $stmt->close();
       ?>
       </div>
       
       <div class="container" style="margin-top: 20px;">
       <h3 style="text-align:center">Comments</h3>
       <table class="table table-striped table-bordered">
            <?php
              $comment = $mysqli->prepare("select content from comments where story_id=?");
              $comment->bind_param('d', $storyID);
              if(!$comment){
                  printf("Query Prep Failed: %s\n", $mysqli->error);
                  exit;
              }
              $comment->execute();
              $comment->bind_result($content);

              while($comment->fetch()){
                printf("
                <tr><td>%s</td></tr>
                ", htmlentities($content));
              }
              $comment->close();
            ?>
       </table>
       </div>
       <div class="container" style="margin-top: 20px">
       <?php
       
        if(isset($_SESSION['userID'])){
                  
          printf( "
          <form action='newCommentView.php' method='post'>
          <input type='hidden' name='storyID' value='%d'>
          <button type='submit'>New Comment</button> 
          </form>
          ",
          $storyID);
     }
       ?>
       </div>
        

 </body>
 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>