<?php
session_start();
if(!isset($_SESSION['userID'])){
	header("Location: home.php");
	exit();
}

require("tokenCheck.php");

$userID = $_SESSION['userID'];
$title = $_POST['title'];
$content = $_POST['content'];
$link = "";
require("dataBaseAnees.php");

$insertNewStory = $mysqli->prepare("insert into stories (user_id, title, link, content) values (?, ?, ?, ?)");
if(!$insertNewStory){
	
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit();
}

$insertNewStory->bind_param('ssss', $userID, $title, $link, $content);

$insertNewStory->execute();

$insertNewStory->close();

$getStoryID = $mysqli->prepare("select story_id from stories where title=?");
if(!$getStoryID){
	
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit();
}
$getStoryID->bind_param('s', $title);
$getStoryID->execute();
$getStoryID->bind_result($storyID);

$getStoryID->fetch();
$getStoryID->close();
$storyID = (int) $storyID;
$link = sprintf("http://ec2-18-223-143-71.us-east-2.compute.amazonaws.com/~apatwa/module3Grp/storyView.php?story_id=%i", $storyID);

$updateLink = $mysqli->prepare("update stories set link=? where story_id=?");
if(!$updateLink){
	
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit();
}
$updateLink->bind_param('si', $link, $storyID);
$updateLink->execute();
$updateLink->close();

header("Location: home.php");
exit();
?>