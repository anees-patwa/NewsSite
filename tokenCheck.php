<?php
    if(!(strcmp($_SESSION['token'],$_POST['token']) == 0)){
        /*echo $_SESSION['token'];
        echo "<br>";
        echo $_POST['token'];
        echo "<br>";
        echo strcmp($_SESSION['token'],$_POST['token']);
        echo "<br>";*/
        die("Request forgery detected");
        exit();
    }
?>