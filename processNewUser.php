<?php
session_start();
ob_start();
require('dataBase.php');
require('userNav.php');

$user_id =   $_POST['user_ID'];
$user_name = $_POST['user_name'];
$password =  $_POST['user_password']; 

//check if valid int for ID

if(!filter_var($user_id, FILTER_VALIDATE_INT)){
	ob_end_clean();
	header("Location: createAccount.php");
	exit();
}

//check valid username
if( !preg_match('/^[\w_\-]+$/', $user_name) ){
	ob_end_clean();
	header("Location: createAccount.php");
	echo "invalid username";
	exit();
}

$hash = password_hash('$password', PASSWORD_BCRYPT);


$insert = $mysqli->prepare("insert into loginData (id, username, hash) values (?, ?, ?)");
if(!$insert){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$insert->bind_param('sss',$user_id ,$user_name , $hash);

$insert->execute();

$insert->close();

ob_end_flush();

?>