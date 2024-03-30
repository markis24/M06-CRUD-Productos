<?php

include "DBconfig.php";

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        
    if(!empty($_POST["nomProducte"])){
        if($_POST["addEdit"]==0){
            $sql = "INSERT INTO products (nom) VALUES ('" . $_POST["nomProducte"] ."')";
        }else{
            $sql = "UPDATE products SET nom='" . $_POST["nomProducte"] . "' WHERE id=" . $_POST["addEdit"];
        }
        

        echo $sql;

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    }
    
    header('Location: FormLlistat.php');

?>
