<?php
session_start();
if(!isset($_SESSION['userID']))
ob_start();
$user_id =   $_POST['user_ID'];
$user_name = $_POST['user_name'];
$password =  $_POST['user_password']; 


require('dataBaseAnees.php');
require('nonUserNav.php');

$stmt = $mysqli->prepare("select id, hash from users where username=?");

$stmt->bind_param('s', $user_name);
$stmt->execute();

$stmt->bind_result($userID, $pass);

$stmt->fetch();
// $pass = '$2y$10$.JjE5/umvxBVfTxAxdprfeRB9hRiYnAUvdzdsZBI4K9NkcH/AUQny'
$pass = str_replace('"',"'",$pass);
$password = str_replace('"',"'",$password);
if(password_verify($password, $pass)){
    $_SESSION['userID'] = $userID;
    ob_end_clean();
    header("Location: home.php");
    exit();
    
}
else{
    ob_end_clean();
    header("Location: home.php");
    exit();
}

ob_end_flush();
?>