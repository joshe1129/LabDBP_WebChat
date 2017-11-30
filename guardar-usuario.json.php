<?php
//ini_set( 'display_errors', 0 );

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "chatbd";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT nickname FROM usuario WHERE nickname='" . $data["nickname"] . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sql = "UPDATE usuario SET ";
	$sql .= "nombres='" . $data["nombres"] . "',";
	$sql .= "apellidos='" . $data["apellidos"] . "',";
	$sql .= "fecha_registro='" . $data["fecha_registro"] . "'";
	$sql .= "password='" . $data["password"] . "'";
	$sql .= "WHERE nickname='" . $data["nickname"] . "'";
}
else {
	$sql = "INSERT INTO usuario (nickname, nombres, apellidos, fecha_registro, password) ";
	$sql .= " VALUES ('" . $data["nickname"] . "', '" . $data["nombres"] . "', '" . $data["apellidos"] . "', '" . $data["fecha_registro"] . "', '" . $data["password"] . "')" ;
	
}

$result = $conn->query($sql);

if ($result === TRUE) {
	echo '{"nickname": "' . $data["nickname"] . '"}';
}
else {
	echo '{"error": "No se pudo guardar el usuario"}';
}
$conn->close();
?>