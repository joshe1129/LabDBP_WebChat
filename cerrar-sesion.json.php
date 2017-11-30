<?php
header("Content-Type: text/javascript");
session_start();

unset($_SESSION["usuario_id"]);

echo '{"response": "Sesion finalizada"}';
?>