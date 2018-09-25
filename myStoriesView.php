<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>My Stories</title>

    <?php
    session_start();
    if(isset($_SESSION['userID'])){
      require('userNav.php');
    } else {
      header("Location: home.php");
      exit();
    }
    ?>
  </head>
  <body>
  <div class="container" style="background-color: gray; margin-top: 20px;">
  <table>
    <tr>
        <th>Story Title</th>
        <th>Content</th>
        <th>Actions</th>
    </tr>
       <?php
            $userID = (int)$_SESSION['userID'];
            require("dataBaseAnees.php");
            $stmt = $mysqli->prepare("select story_id, title, content from stories where user_id=?");
            if(!$stmt){
                printf("Query Prep Failed: %s\n", $mysqli->error);
                exit();
            }
            $stmt->bind_param('d', $userID);
            $stmt->execute();
            $stmt->bind_result($storyID, $title, $content);

            while($stmt->fetch()){
              printf(
                  "<tr>
                  <th>%s</th>
                  <th>%s</th>
                  <th>
                    <form action='storyAction.php' method='post'>
                        <input type='hidden' name='action' value='edit'>
                        <input type='hidden' name='storyID' value='%d'>
                        <button type='submit'>Edit</button>
                    </form>
                    <form action='storyAction.php' method='post'>
                        <input type='hidden' name='action' value='delete'>
                        <input type='hidden' name='storyID' value='%d'>
                        <button type='submit'>Delete</button>
                    </form>
                  ", htmlentities($title), htmlentities($content), 
                  htmlentities($storyID), htmlentities($storyID)
              );
            }
            $stmt->close();
            exit();
       ?>
  </table>  

</div>
 </body>
 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>