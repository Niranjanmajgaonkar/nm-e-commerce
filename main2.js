function buyProduct(productName) {
    console.log("Product Name:", productName); // Log the product name
    var confirmation = confirm("did you like to  buy " + productName+" this product" + "?");

    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "main.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            console.log("ReadyState:", xhr.readyState, "Status:", xhr.status); // Log readyState and status
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log("Response:", xhr.responseText);
                    alert("Successfully submitted");
                } else {
                    console.error("Error submitting the form. Please try again.");
                    alert("Error submitting the form. Please try again.");
                }
            }
        };

        xhr.send("buyproduct=" + encodeURIComponent(productName));
    } else {
        alert("Continue shopping");
    }
}
let items =document.querySelectorAll(".item")
items.forEach((key)=>{
    key.addEventListener('click',()=>{
        let text =key.innerText
      
        buyProduct(text);

    })

})
// Simulate a purchase for the product named 'niranjna'
