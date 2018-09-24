<?php
session_start();
if(!isset($_SESSION['userID'])){
    redirect("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>New Post</title>

    <?php
    require('userNav.php');
    ?>
  </head>
  <body>
    <div class="container" style="background-color: gray">
        <h1>New Post</h1>
        <form action="createPostCtrl.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input name="title" id="exampleInputEmail1" type="text" class="form-control" placeholder="Title of your story">
               
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
                <input name="content" type="text" class="form-control" id="exampleInputPassword1" placeholder="Your story goes here">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
  </body>
</html>