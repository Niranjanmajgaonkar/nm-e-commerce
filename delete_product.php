<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "k";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the product name from the POST request
$productToRemove = $_POST['product'];

// Decode the product name
$productToRemove = urldecode($productToRemove);

// Prepare and execute the SQL query to delete the record
$sql = "DELETE FROM product_details WHERE product_name = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $productToRemove);

if ($stmt->execute()) {
  echo "Product deleted successfully";
} else {
  echo "Error deleting product: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
