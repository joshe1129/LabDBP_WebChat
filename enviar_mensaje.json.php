<?php

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "chatbd";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT * FROM mensajes";

$result = $conn->query($sql);

$sql = "INSERT INTO mensajes (remitente, mensaje) ";
$sql .= " VALUES ('" . $data["remitente"] . "', '" . $data["mensaje"] . "')" ;
	


$result = $conn->query($sql);

if ($result === TRUE) {
	echo 'mensaje enviado';
}
else {
	echo 'mensaje no enviado';
}
$conn->close();
?>