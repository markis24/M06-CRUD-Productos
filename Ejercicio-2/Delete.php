<?php

include "DBconfig.php";

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(!empty($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM products WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID not provided";
}

$conn->close();

header('Location: Llistat.php');
exit; // Termina el script después de redirigir
?>
