<?php
session_start();

if(!isset($_SESSION['userID'])){
    header("Location: home.php");
    exit();
}
require('dataBaseAnees.php');
require('userNav.php');

$content = $_POST['commentContent'];
$storyID = $_POST['storyID'];
$userID = $_SESSION['userID'];
$insert = $mysqli->prepare("insert into comments (user_id, story_id, content) values (?, ?, ?)");
if(!$insert){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$insert->bind_param('dds', $userID , $storyID, $content);

$insert->execute();

$insert->close();
header("Location: home.php");

exit();

?>