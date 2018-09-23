<?php

$mysqli = new mysqli('localhost', 'ArmandoQ', 'Mando433', 'Module3');

$stmt = $mysqli->prepare("select id, from loginData");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($id);

echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<li>%s %s</li>\n",
		htmlspecialchars($id)
	
	);
}
echo "</ul>\n";

$stmt->close();









// if($mysqli->connect_errno) {
// 	echo "not working";
// 	exit;
// }
// $selectID = $mysqli->prepare("SELECT username, FROM loginData");
// $selectID->execute();

// $result = $selectID->get_result();

// echo "$result";


?>