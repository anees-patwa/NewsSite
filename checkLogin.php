<?php
session_start();
require('dataBase.php');
$username = $_POST['userID'];

//check valid username
if( !preg_match('/^[\w_\-]+$/', $username) ){
    return "Invalid username";
}

?>