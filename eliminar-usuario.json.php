<?php

header("Content-Type: text/javascript");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "chatbd";

$codigo = $_GET["codigo"];

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "DELETE FROM usuario WHERE codigo='$codigo'";

$result = $conn->query($sql);
if ($result === TRUE) {
	echo '{"codigo": "' . $codigo . '"}';
}
else {
	echo '{"error": "No se pudo eliminar el usuario"}';
}
$conn->close();
?>