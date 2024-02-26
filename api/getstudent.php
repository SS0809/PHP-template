<?php
include '../db.php';
if($_SERVER["REQUEST_METHOD"] == "GET") {
if ($conn) {
    $sql = "SELECT * FROM learn_users WHERE student = true";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
         echo $result->num_rows;
    } else {
        echo "No results found";
    }
    $conn->close();
} else {
    die("Connection failed: " . mysqli_connect_error());
}
}
?>
