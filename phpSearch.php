<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "bob";
$password = "123456";
$db = "classDB";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from students where name like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["rock"]."  ".$row["classical"]."  ".$row["pop"]." ".$row["country"]." ".$row["jazz"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>