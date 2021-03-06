<?php
    session_start();
    if(isset($_SESSION['userID'])){
      require('userNav.php');
    } else {
      header("Location: home.php");
      exit();
    }
    
    require("tokenCheck.php");
    $action = $_POST['action'];
    $storyID = (int)$_POST['storyID'];
    if($action == "delete"){
        require("dataBaseAnees.php");
        $deleteComment = $mysqli->prepare("delete from stories where story_id=?");
        if(!$deleteComment){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit();
        }

        $deleteComment->bind_param('d', $storyID);

        $deleteComment->execute();

        $deleteComment->close();

        //redirect back to my comments page
        header("Location: myStoriesView.php");
        exit();
    } else if ($action == "edit"){
        require("dataBaseAnees.php");
        $deleteComment = $mysqli->prepare("select title, content from stories where story_id=?");
        if(!$deleteComment){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit();
        }

        $deleteComment->bind_param('d', $storyID);

        $deleteComment->execute();
        $deleteComment->bind_result($title, $content);
        $deleteComment->fetch();
        $deleteComment->close();
        printf("
            <form action='editStory.php' method='post'>
                <input type='text' name='title' placeholder='%s'>
                <input type='text' name='content' placeholder='%s'>
                <input type='hidden' name='storyID' value='%d'>
                <input type='hidden' name='token' value='%s'>
                <button type='submit'>Submit</button>
            </form>        
        ",
        htmlentities($title), 
        htmlentities($content),
        htmlentities($storyID),
        $_SESSION['token']
    );
    
    }
?>