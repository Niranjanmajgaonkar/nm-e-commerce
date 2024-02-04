<?php

$username = $_POST['username'];
$password = $_POST['password'];
$mobile = $_POST['Mobail'];
$submit =$_POST['submit'];

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "k";

$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to check for an existing record
$checkStmt = $conn->prepare("SELECT * FROM userlogin WHERE username = ? OR mobail_no = ?");
$checkStmt->bind_param("ss", $username, $mobile);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    // echo "This Username or Mobile Number already exists <br><br>";
    header('location:createerror.html');
    // echo "<a href='createlogin.html'>click here for re-enter</a>";
    exit();
} else {
    // Continue with the insert operation
    $stmt = $conn->prepare("INSERT INTO `userlogin` (`username`, `password`, `mobail_no`, `currenttime`) VALUES (?, ?, ?, current_timestamp())");
    $stmt->bind_param("sss", $username, $password, $mobile);

    if ($stmt->execute()) {
        // echo "Record inserted successfully <br><br>";

        // echo "<a href='login.html'>Click here for Login/a>";
        header('location:createsuccfully.html');
        exit();
    } else {
        echo "Error inserting record";
        echo "<a href='createlogin.html'>Click here for re-enter</a>";
        exit();
    }

    $stmt->close();
}





$checkStmt->close();
$conn->close();

?>
