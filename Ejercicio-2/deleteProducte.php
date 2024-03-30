<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){
    include "DBconfig.php";

// Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products WHERE id=" . $_POST["id"];

    $result = $conn->query($sql);

    $array = array();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $object = new stdClass();
        $object->nom = $row["nom"];
        $object->addEdit = $row["id"];

        echo json_encode($object);

    } else {
        echo "0 results";
    }

    $conn->close();
}


?>