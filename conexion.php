<?php
session_start();

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "Snakold";
$password = "andromeda1";
$dbname = "tiam";

// Guardar los datos en la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>