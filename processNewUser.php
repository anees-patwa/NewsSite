<?php
session_start();
require('dataBase.php');
require('userNav.php');

$user_id =   $_POST['user_ID'];
$user_name = $_POST['user_name'];
$password =  $_POST['user_password']; 

$hash = password_hash($password, PASSWORD_BCRYPT);


$insert = $mysqli->prepare("insert into loginData (id, username, hash) values (?, ?, ?)");
if(!$insert){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$insert->bind_param('sss',$user_id ,$user_name , $password);

$insert->execute();

$insert->close();



?>