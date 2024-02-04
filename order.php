<html>
    <nav id="navbar">
        <h1>NIRANJAN'S E-COMMERCE</h1>
    <ul id="ulid">
    <li><a href="main.html">HOME</a></li>
    <li><a href="account.php">ACCOUNT ↓</a></li>
    <li><a href="order.php">ORDER</a></li>
    <li><a href="feedback.html">FEEDBACK</a></li>
    <li><a href="card.php">CARD</a></li>
    </ul>
    </nav>
    
   <!-- order.php -->

<?php
// order.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buyproduct'])) {
    $buyProductData = $_POST['buyproduct'];

    // Process the data as needed
    // For example, you can save it to a database, send an email, etc.

    // Send a response (optional)
    echo "Success"; // You can customize this response as needed
} else {
    // Handle invalid or missing data
    // echo "Error: Invalid request";
}
?>
<marquee  direction="left"scrollamount="15" ><h1 id="Maintances">this page are currently under Maintances</h1></marquee>

<style>
#Maintances{
    background-color: red;
    color: white;
    align-items: center;
    display: flex;
    margin-top: 15%;
    padding-left: 5%;
    padding-right: -50%;
    padding-bottom: 30px;
    margin-right: 55%;
    
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