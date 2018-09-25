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
    $commentID = (int)$_POST['commentID'];

    $userID = (int)$_SESSION['userID'];
    require("dataBaseAnees.php");
    $stmt = $mysqli->prepare("update comments set content=? where comment_id=?");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit();
    }
    $stmt->bind_param('sd', $content, $commentID);
    $stmt->execute();
    header("Location: myCommentsView.php");
    exit();
?>