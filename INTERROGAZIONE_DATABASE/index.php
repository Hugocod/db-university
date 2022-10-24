<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

define("DB_SERVERNAME", "localhost:8889");
define("DB_USERNAME","root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db-university");

// Connect
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
}

echo "<p>Connection OK!</p>";

 
 $sql = "SELECT * FROM `teachers`";
 $result = $conn->query($sql);
 
 if ($result && $result->num_rows > 0) {
    
     // output data of each row
     while($row = $result->fetch_assoc()) {
?>
<!-- ////////////////////////////////////////////////////////////////////////////////////// BREAK PHP -->
            <div class="card">

                <div> <?= 'NAME :'.' '. $row['name'] ?></div>
                <div> <?= 'SURNAME :'.' '. $row['surname'] ?></div>
                <div> <?= 'OFFICE NUMBER :'.' '. $row['office_number'] ?></div>
                <div> <?= 'EMAIL :'.' '. $row['email'] ?></div>

            </div>
 <!-- ////////////////////////////////////////////////////////////////////////////////////// BREAK PHP -->
<?php
        }
    } elseif ($result) {
        echo "0 results";
    } else {
        echo "query error";
    }
 
 $conn->close();
?>
    
</body>
</html>



