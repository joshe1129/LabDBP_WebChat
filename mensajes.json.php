<?php
header("Content-Type: text/javascript");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "chatbd";
 
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT mensaje_id, remitente, mensaje, tiempo FROM mensajes";
$result = $conn->query($sql);
$mensajes = array();

while($row = $result->fetch_assoc()) {
	$id = $row["mensaje_id"];
    $item = '{"mensaje_id": "' . $id . '", "mensaje_id": "' . $row["mensaje_id"];
    $item .= '", "remitente": "' . $row["remitente"];
    $item .= '", "mensaje": "' . $row["mensaje"];
    $item .= '", "tiempo": "' . $row["tiempo"]. '"}';
    array_push($mensajes, $item);
}
echo "[" . implode(", ", $mensajes) . "]";

$conn->close();
?>
