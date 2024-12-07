<?php
session_start();

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "Snakold";
$password = "andromeda1";
$dbname = "pweb802";


// Guardar los datos en la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$name = $_POST['nombre'];
$email = $_POST['correo'];
$password = $_POST['contraseña'];
$file = $_POST['foto'];

$max_id = 0;
$sql = "SELECT MAX(id_login) AS max_id FROM login";
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $max_id = $fila["max_id"];
}
$id = $max_id + 1;
$roll = 'visitante';

$sql = "INSERT INTO login (id_login, nombre, correo ,contraseña , foto, roll)
VALUES ('$id', '$name', '$email', '$password', '$file', '$roll' )";

if ($conn->query($sql) === TRUE) {
   // Limpiar los campos del formulario
   $_POST = array();
   $name = " ";
   $email = " ";
   $password = " ";
   
    // Mensaje de éxito
    $_SESSION['mensaje'] = "Los datos se han guardado correctamente";
    echo "<script>alert('Los datos se han guardado correctamente.'); window.location.href = 'index.html';</script>";
} else {
    // Mensaje de error
    $_SESSION['mensaje'] = "Error: " . $sql . "<br>" . $conn->error;
}

// Mostrar mensaje flotante
if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              ' . $_SESSION['mensaje'] . '
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              
          </div>';
    unset($_SESSION['mensaje']);
}





$conn->close();

?>