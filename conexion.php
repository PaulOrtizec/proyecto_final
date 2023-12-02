<?php
$servername = "localhost";
$username = "g@hel";
$password = "g@hel09122022";
$database = "tareas";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}
?>
