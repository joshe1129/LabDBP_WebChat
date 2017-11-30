<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "chatbd";

	$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);
	$conn = "SELECT * FROM mensajes ORDER BY id DESC";
	$ejecutar = $conexion->query($conn); 
	while($fila = $ejecutar->fetch_array()) : 
?>
	<div id="datos-chat">
		<span style="color: #1C62C4;"><?php echo $fila['nombre']; ?></span>
		<span style="color: #848484;"><?php echo $fila['mensaje']; ?></span>
		<span style="float: right;"><?php echo formatearFecha($fila['fecha']); ?></span>
	</div>
	
	<?php endwhile; ?>
