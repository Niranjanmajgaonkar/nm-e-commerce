<?php
$loginUsername = $_POST['loginUsername'];
$loginpassword = $_POST['loginpassword'];

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "k";

$conn = new mysqli($servername, $db_username, $db_password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM userlogin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $loginUsername);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $originalusername = $row["username"];
    $originalpassword = $row["password"];

    if ($originalpassword === $loginpassword) {
        // Set only the username as a cookie for 1 day
        setcookie("username", $loginUsername, time() + 86400, "/");
        header('Location: main.html');
        exit();
    } else {
        header('location:loginerror.html');
        exit();
    }
} else {
    header('location:loginerror.html');
    exit();
}

echo "<a href='login.html'>Click here to re-enter</a>";
$conn->close();
?>
