<?php
session_start();
ob_start();
require('dataBaseAnees.php');
require('userNav.php');


$user_name = $_POST['user_name'];
$password =  $_POST['user_password']; 


//check valid username
if( !preg_match('/^[\w_\-]+$/', $user_name) ){
	ob_end_clean();
	header("Location: createAccount.php");
	echo "invalid username";
	exit();
}

$hash = password_hash($password, PASSWORD_BCRYPT);


$insert = $mysqli->prepare("insert into users (username, hash) values (?, ?)");
if(!$insert){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$insert->bind_param('ss', $user_name , $hash);

$insert->execute();

$insert->close();

ob_end_flush();

?>