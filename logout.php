<?php
    session_start();
    if(!(isset($_SESSION['userID']))){
        header("Location: home.php");
    }
    ob_start();
    session_unset();
    session_destroy();
    ob_end_clean();
    header("Location: home.php");
    exit();
    ob_end_flush();
?>