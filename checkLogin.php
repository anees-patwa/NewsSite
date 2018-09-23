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
// $pass = '$2y$10$.JjE5/umvxBVfTxAxdprfeRB9hRiYnAUvdzdsZBI4K9NkcH/AUQny'
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
    


// if($user_name == $id){
//     echo "users match";
// }
// else {
//     echo "error";
//}

// if($cnt == 1 && password_verify($pwd_guess, $hash)){
// 	// Login succeeded!
// 	$_SESSION['user_id'] = $user_id;
// 	// Redirect to your target page
// } else{
//     ob_end_clean();
//     header("Location: createAccount.php");
// }
// ob_end_flush();
?>