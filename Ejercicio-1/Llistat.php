<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llistat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<?php

include "DBconfig.php";


// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$sql = "SELECT * FROM products";

    $result = $conn->query($sql);

    $array = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($array, array("id" =>$row["id"], "nom"=>$row["nom"]));            
        }
    } else {
        echo "0 results";
    }

    $conn->close();
?>


<body class="container mt-5 w-80">
    <h2 class="mb-3">Llistat</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Editar</th>
                <th scope="col">Esborrar</th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                for($i=0; $i<sizeof($array); $i++){
                    echo '<tr>
                                <th scope="row">' . $array[$i]["id"] . '</th>
                                <td>' . $array[$i]["nom"] . '</td>
                                <td><a href="Form.php?id=' . $array[$i]["id"] . '" class="btn btn-outline-info">Editar</a></td>
                                <td><a href="Delete.php?id=' . $array[$i]["id"].'" class="btn btn-outline-danger">Eliminar</a></td>
                            </tr>';
                }
                 
                    
                        

            ?>
    
        </tbody>
    </table>


</body>
</html>