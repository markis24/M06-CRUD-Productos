<?php
if(!empty($_POST["id"])){
    include "DBconfig.php";

    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST["id"];

    // Verificar si el producto existe
    $sql_check = "SELECT * FROM products WHERE id = $id";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Borrar el producto
        $sql_delete = "DELETE FROM products WHERE id = $id";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Producto borrado exitosamente";
        } else {
            echo "Error al borrar el producto: " . $conn->error;
        }
    } else {
        echo "El producto no existe";
    }

    $conn->close();
}
?>
