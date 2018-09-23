<?php

$mysqli = new mysqli('localhost', 'ArmandoQ', 'Mando433', 'Module3');

if(!$mysqli){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}


?>