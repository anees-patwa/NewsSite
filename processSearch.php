<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Search</title>
    <?php
    session_start();

    if(!isset($_SESSION['userID'])){
        require("nonUserNav.php");
    } else {
        require('userNav.php');
    }
    require('dataBaseAnees.php');
    
    ?>
  </head>
<body>
<div class='container' style='margin-top:50px'>
<?php



$search = $_POST['title'];

$insert = $mysqli->prepare("select title, link FROM stories WHERE LOCATE(?, title) > 0");
if(!$insert){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit();
}

$insert->bind_param('s', $search);

$insert->execute();
$insert->bind_result($title, $storyLink);
$count = 0;
while($insert->fetch()){
    $count++;
    printf( "<h2><a href='%s'>%s</h2>",  $storyLink, htmlspecialchars($title));
}
if($count == 0){
    echo "<h1>No Results Found</h1>";
}
$insert->close();
exit();

?>
</div>
 </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>