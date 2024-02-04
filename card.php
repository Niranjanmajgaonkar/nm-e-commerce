<html>

<body>

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

  <div class="outercard">
    <div class="innercard">

      <?php

// $servername = "sql300.infinityfree.com";
// $username = "if0_35908520";
// $password = "LltFGkwH0HQs";
// $dbname = "if0_35908520_k";



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

      $sql = "SELECT product_name FROM product_details";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          $product = $row['product_name'];

          echo "<h2>$product <button class='buy-btn' class='buy-btn' buy-product='$product'>Buy</button><button class='remove-btn' data-product='$product'>Remove</button></h2><br><br>";
        }
      } else {
        echo "<h1 id='ji'> Your Card is empty</h1>";
      }

      $conn->close();
      ?>

    </div>
  </div>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    var removeButtons = document.querySelectorAll('.remove-btn');

    removeButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var productToRemove = button.getAttribute('data-product');

        // Send an asynchronous request to delete the product
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_product.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
          if (xhr.status === 200) {
            // Reload the page after successful deletion
            location.reload();
          } else {
            console.error('Error deleting product:', xhr.statusText);
          }
        };

        xhr.onerror = function () {
          console.error('Network error while trying to make the request.');
        };

        xhr.send('product=' + encodeURIComponent(productToRemove));
      });
    });
  });
</script>

<!-- 
// <script>
//   key.addEventListener('click', () => {
//     let con = confirm("Did you like to buy this product?");
//     if (con) {
//         var dataToSend = key.innerText;
//         console.log("Data to send:", dataToSend);

//         var xhr = new XMLHttpRequest();
//         xhr.open("POST", "order.php", true);
//         xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//         xhr.onreadystatechange = function () {
//             if (xhr.readyState == 4 && xhr.status == 200) {
//                 console.log("Response:", xhr.responseText);
//             }
//         };
//         xhr.send("buyproduct=" + encodeURIComponent(dataToSend));

//         alert("Successfully submitted");
//     } else {
//         alert("Continue shopping");
//     }
// });
// </script> -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  let buyBtns = document.querySelectorAll('.buy-btn');

  buyBtns.forEach(function (buyBtn) {
    buyBtn.addEventListener('click', function () {
      window.location.href = 'order.php';
    });
  });
});

  </script>

<style>
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

h2{
    padding-top: 48px;
    padding-bottom: 48px;
    padding-right: 233px;
    /* padding: 77px; */
    padding-left: 54px;
    color: white;
    border: 2px solid white;
    font-size:40px;
}
.outercard{
    padding-top :20px;
    display: flex;

}
.innercard{
    /* border: 2px solid white; */
}
button{
    font-size:25px;
    margin-left:20px;
    background-color: red;
    color:white;
    padding:5px;
}
button:hover{
  transform: scale(1.1); 
    background-color: blanchedalmond;
    cursor: pointer;
}
.buy-btn{
padding-right:25px;
padding-left:25px;
background-color: greenyellow;
color:black;
}

#ji{
padding-top:25%;
margin-left: 550px;
}
</style>

<script src="card.js"></script>


</body>
</html>