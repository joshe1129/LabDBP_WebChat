<?php
header("Content-Type: text/javascript");
session_start();

if (isset($_SESSION["usuario_id"])) {
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "chatbd";
	 
	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

	$sql = "SELECT id, nickname FROM usuario WHERE id='" .  $_SESSION["usuario_id"] . "'";
	$result = $conn->query($sql);

	$usuarios = array();

	if($row = $result->fetch_assoc()) {
		$_SESSION["usuario_id"] = $row["id"];
		echo '{"response": "Usuario valido", "usuario_id": "' . $row["id"] . '", "nickname": "' . $row["nickname"] . '"}';
	} else {
		echo '{"response": "No hay usuario asociado a la sesion"}';
	}

	$conn->close();
} else {
	echo '{"response": "No hay sesion activa"}';
}
?>