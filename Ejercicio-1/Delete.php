<?php

include "DBconfig.php"; // Incluye el archivo de configuración de la base de datos

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT); // Establece la conexión a la base de datos utilizando las constantes definidas en DBconfig.php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Termina el script si hay errores de conexión
}

if(!empty($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM products WHERE id=$id"; // Construye la consulta SQL para eliminar un producto según su ID

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully"; // Muestra un mensaje si el registro se elimina correctamente
    } else {
        echo "Error deleting record: " . $conn->error; // Muestra un mensaje de error si hay problemas al eliminar el registro
    }
} else {
    echo "ID not provided"; // Muestra un mensaje si no se proporciona un ID
}

$conn->close(); // Cierra la conexión a la base de datos

header('Location: Llistat.php'); // Redirige a la página "Llistat.php" después de ejecutar la acción de eliminación
exit; // Termina el script después de redirigir
?>
