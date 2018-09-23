<?php

$mysqli = new mysqli('localhost', 'ArmandoQ', 'Mando433', 'Module3');

$stmt = $mysqli->prepare("select id, from loginData");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}


?>