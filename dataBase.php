<?php

$mysqli = new mysqli('localhost', 'ArmandoQ', 'Mando433', 'Module3');

if($mysqli->connect_errno) {
	echo "not working";
	exit;
}
?>