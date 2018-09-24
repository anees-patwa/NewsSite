<?php
session_start();
ob_start();

$user_id =   $_POST['user_ID'];
$user_name = $_POST['user_name'];
$password =  $_POST['user_password']; 


require('dataBase.php');
require('nonUserNav.php');

$stmt = $mysqli->prepare("select hash from loginData where username=?");

$stmt->bind_param('s', $user_name);
$stmt->execute();

$stmt->bind_result($pass);

$stmt->fetch();

$pass = str_replace('"',"'",$pass);
$password = str_replace('"',"'",$password);
    if(password_verify($password, $pass)){
        echo "login Successful";
        echo "<p> </p>";
        exit();
        
    }
        else{
            echo "<p> </p>";
            echo $pass;
            echo "<br>";
            echo $password;
            echo "<br>";
            echo password_verify($password, $pass);
            echo 'not working';
        }
    

?>