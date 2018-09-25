<?php
    session_start();
    if(isset($_SESSION['userID'])){
      require('userNav.php');
    } else {
      header("Location: home.php");
      exit();
    }
    
    $action = $_POST['action'];
    $commentID = (int)$_POST['commentID'];
    if($action == "delete"){

        $deleteComment = $mysqli->prepare("delete from comments where comment_id=?");
        if(!$deleteComment){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit();
        }

        $deleteComment->bind_param('d', $commentID);

        $deleteComment->execute();

        $deleteComment->close();

        //redirect back to my comments page
        header("Location: myCommentsView.php");
        exit();
    } else if ($action == "edit"){
        printf("
            <form action='editComment.php' method='post'>
                <input type='text' name='content' placeholder=''>
                <input type='hidden' name='commentID' value='%d'>
                <button type='submit'>Submit</button>
            </form>        
        ",
        htmlentities($commentID)
    );
    exit();
    }
?>