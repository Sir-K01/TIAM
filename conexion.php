<?php
session_start();

// Configuración de la conexión a la base de datos
$servername = "******";
$username = "******";
$password = "*********";
$dbname = "****";

// Guardar los datos en la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>
