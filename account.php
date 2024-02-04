<html>
    
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

if(!isset($_COOKIE['username'])) {
} else {
 
 $name= $_COOKIE['username'];
}
$sql = "SELECT username, password ,mobail_no ,currenttime FROM userlogin WHERE username ='$name' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $username =$row["username"];
        $registration_time =$row["currenttime"];
        $mobail_no =$row["mobail_no"];
   
        }
} else {
    echo "0 results";
}
$conn->close();
?> 

<nav id="navbar">
    <h1>NIRANJAN'S E-COMMERCE</h1>
    <ul id="ulid">


<li><a href="main.html">HOME</a></li>
<li><a href="account.php">ACCOUNT ↓</a></li>
<li><a href="order.php">ORDER</a></li>
<li><a href="feedback.html">FEEDBACK</a></li>
<li><a href="card.html">CARD</a></li>
</ul>
</nav>
<div class="profile">
    <div class="innerprofile">
    <h1>USER NAME :- <?php echo "$username"?></h1>
    <h1>MOBILE NUMBER :- <?php echo "$mobail_no"?></h1>
    <h1>REGISTRATION DATE & TIME :- <?php echo "$registration_time"?></h1>
</div>
</div>
<style>
    .profile{
        margin-top: 150px;
    margin-left: 300px;
    margin-right: 300px;
    }
    .innerprofile{
        padding-left: 48px;
    padding-top: 24px;
    color: antiquewhite;
    border: 2px solid wheat;
    padding-bottom :40px;
    background-color :"yellow";
    }
   *{
    margin: 0;
    padding: 0;
    
}
#navbar{

        width: 100%;
    background-color: black;
    margin: 0;
    height: 70px;

}

#navbar ul {
list-style-type: none;
}

#navbar ul li{
    float: right;
    width: 200px;
    border: 2px solid wheat;
    text-align: center;               
    display: block; /*  mean puran display la access zal pahoje             */
}

#navbar ul li a{
    color: aliceblue;
    text-decoration: none;
   line-height: 50px;
   display: block;
}

#navbar ul li :hover{
    background-color: aqua;
}

#navbar ul li a:hover{
    color: black;
}
#navbar ul li ul li{
    display: none;
    background-color: black;
}

#navbar ul li:hover ul li{
display: block;
}

h1{ padding-left: 48px;  
     padding-top: 24px;
    color: antiquewhite;
}

#ulid{
margin-top: -40px;
}
body{
    background-color: #413838;
}

</style>
</html>