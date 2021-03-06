<?php
    session_start();
    if(isset($_SESSION['userID'])){
      require('userNav.php');
    } else {
      header("Location: home.php");
      exit();
    }

    require("tokenCheck.php");
    $content = $_POST['content'];
    $storyID = (int)$_POST['storyID'];
    $title = $_POST['title'];

    $userID = (int)$_SESSION['userID'];
    require("dataBaseAnees.php");
    $stmt = $mysqli->prepare("update stories set content=? where story_id=?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit();
    }
    $stmt->bind_param('sd', $content, $storyID);
    $stmt->execute();
    header("Location: myStoriesView.php");
    exit();
?>