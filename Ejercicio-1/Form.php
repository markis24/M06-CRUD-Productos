<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<?php
include "DBconfig.php";

    if(isset($_GET["id"]) && !empty($_GET["id"])){

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products WHERE id=" . $_GET["id"];

        $result = $conn->query($sql);

        $array = array();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nom = $row["nom"];
            $addEdit = $row["id"];
        } else {
            echo "0 results";
        }

        $conn->close();
    }else{
        $nom = "";
        $addEdit = 0;
    }

?>
<body class="container mt-5 w-80">
<h2 class="mb-3">Formulari</h2>
<form action="AddEdit.php" method="POST">
    <div class="form-group mb-2">
        <input type="text" class="form-control" id="nomProducte" name="nomProducte" placeholder="Nom" value="<?php echo isset($nom) ? $nom : ''; ?>">
    </div>

    <input type="hidden" name="addEdit" value="<?php echo isset($addEdit) ? $addEdit : ''; ?>"/>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>