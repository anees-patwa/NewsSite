<?php
session_start();

if(!isset($_SESSION['userID'])){
    header("Location: home.php");
    exit();
}
require('dataBaseAnees.php');
require('userNav.php');


$search = $_POST['title'];

$insert = $mysqli->prepare("select title, link FROM stories WHERE LOCATE(?, title) > 0");
if(!$insert){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit();
}

$insert->bind_param('s', $search);

$insert->execute();
$insert->bind_result($title, $storyLink);
while($insert->fetch()){
    printf( "<h2><a href='%s'>%s</h2>",  $storyLink, htmlspecialchars($title));
}
$insert->close();
exit();

?>