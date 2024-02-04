<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "k";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productName = $_POST['buyproduct'];

$sql = $conn->prepare("INSERT INTO product_details (product_name) VALUES (?)");
$sql->bind_param("s", $productName);

if ($sql->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql->close();
$conn->close();
?>
