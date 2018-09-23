<?php
if(!isset($_SESSION['userID'])){
    redirect("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Home</title>

    <?php
    require('UserNav.php');
    ?>
  </head>
  <body>
    

  </body>
</html>