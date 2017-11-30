<?php
header("Content-Type: text/javascript");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "chatbd";
 
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT id, nickname, password, nombres, apellidos, fecha_registro FROM usuario";
$result = $conn->query($sql);
$usuarios = array();

while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    $item = '{"id": "' . $id . '", "nombres": "' . $row["nombres"];
    $item .= '", "apellidos": "' . $row["apellidos"];
    $item .= '", "nickname": "' . $row["nickname"];
    $item .= '", "fecha_registro": "' . $row["fecha_registro"]. '"}';
    array_push($usuarios, $item);
}
echo "[" . implode(", ", $usuarios) . "]";

$conn->close();
?>