<?php
header("Content-Type: text/javascript");
session_start();

$data = json_decode(file_get_contents('php://input'), true);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "chatbd";
 
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT nombres FROM usuario WHERE nickname='" .  $data["nickname"] . "' AND password='" .  $data["password"] . "'";
$result = $conn->query($sql);

$usuarios = array();

if($row = $result->fetch_assoc()) {

	echo true;
} else {
	echo false;
}

$conn->close();
?>