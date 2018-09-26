<?php
session_start();
if(!isset($_SESSION['userID'])){
    header("Location: home.php");
    exit();
}


require("dataBaseAnees.php");


?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>New Comment</title>

  </head>
  <body>
  <?php
  require("userNav.php");
  ?>
    <div class="container" style="background-color: red">
        <h1>New Comment</h1>
        <form action="processNewComment.php" method="post">
            <div class="form-group">
                <label>Content</label>
                <input type="text" name="commentContent" class="form-control" placeholder="Comment Text" require>
            </div>
            <div class="form-group">
            <?php
                $storyID = $_POST['storyID'];
            ?>
                <input type="hidden" name="storyID" value="<?php echo $storyID?>"class="form-control">
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       
    </div>
 </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>