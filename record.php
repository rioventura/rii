<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Purchases</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <style>
    .social-part .fa{
    padding-right:20px;
}
ul li a{
    margin-right: 20px;
}
img{
  height:600px;
}
@import url('https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap');

body {
    font-family: 'Maven Pro', sans-serif
}

body{
  background-color: #eee;
}

.add{

  border-radius: 20px;
}

.card{

  border:none;
  border-radius: 10px;
  transition: all 1s;
  cursor: pointer;
}

.card:hover{

   -webkit-box-shadow: 3px 5px 17px -4px #777777; 
box-shadow: 3px 5px 17px -4px #777777;
}

.ratings i {

  color: green;
}

.apointment button{

  border-radius: 20px;
  background-color: #eee;
  color: #000;
  border-color: #eee;
  font-size: 13px;
}

.dropdown-toggle{}

  </style>
</head>
  <body>

  <?php include "nav.php"; ?>
  <section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Request ID</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "../config/conn.php";
    $sql ="SELECT DISTINCT `request_id`, `status` FROM `transactions_tbl` WHERE `user_id` = $user_id;";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows >0 ){
        while ($row = mysqli_fetch_assoc($result)){

   ?>
        
    <tr>
      <th scope="row"><?php echo $row['request_id'];?></th>
      <td><?php echo $row['status'];?></td>
      <td>
        <a href="transaction.php?request=<?php echo $row['request_id'];?>" class="btn btn-outline-success"><i class='fa fa-eye'></i></a>
      </td>
    </tr>
  <?php }} ?>
  </tbody>
</table>
    </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
function updateQuantity(buttonElement, quantityInput, change) {
    var currentValue = parseInt(quantityInput.value);
    var newValue = currentValue + change;
    
    // Ensure the new value is within the min and max limits
    if (newValue >= parseInt(quantityInput.min) && newValue <= parseInt(quantityInput.max)) {
        quantityInput.value = newValue;
        // Trigger the change event to update the price
        quantityInput.dispatchEvent(new Event('change'));
    }
}

function updatePrice(inputElement, unitPrice) {
    var quantity = inputElement.value;
    var totalPrice = quantity * unitPrice;
    var cartId = inputElement.id.split('_')[1]; // Extract cart_id from input id
    var totalPriceElement = document.getElementById('price_' + cartId);
    totalPriceElement.innerHTML = '<h5 class="mb-0">₱' + totalPrice.toFixed(2) + '</h5>';
}
// Function to extract price from h5 element and display it
function displayPrice() {
    // Get all checkboxes with name 'buy_item'
    var checkboxes = document.querySelectorAll('input[name="buy_item[]"]');
    var totalPrice = 0;

    // Iterate through each checkbox
    checkboxes.forEach(function(checkbox) {
        // Check if checkbox is checked
        if (checkbox.checked) {
            // Get the parent element of the checkbox
            var parent = checkbox.parentElement.parentElement.parentElement.parentElement;
            // Find the h5 element containing the price
            var priceElement = parent.querySelector('h5');
            // Extract the price
            var price = parseFloat(priceElement.innerText.replace('₱', ''));
            // Add the price to total price
            totalPrice += price;
        }
    });

    // Update the hidden input field with the total price
    document.getElementById('totalPriceInput').value = totalPrice.toFixed(2);

    // Optionally, you can display the total price to the user
    document.getElementById('totalPrice').innerHTML = '<h4>Total Price: ₱' + totalPrice.toFixed(2) + '</h4>';
}


// Attach event listener to checkboxes to trigger displayPrice function when checked/unchecked
var checkboxes = document.querySelectorAll('input[name="buy_item[]"]');
checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', displayPrice);
});

function updateQuantity(buttonElement, quantityInput, change) {
    var currentValue = parseInt(quantityInput.value);
    var newValue = currentValue + change;
    
    // Ensure the new value is within the min and max limits
    if (newValue >= parseInt(quantityInput.min) && newValue <= parseInt(quantityInput.max)) {
        quantityInput.value = newValue;
        // Trigger the change event to update the price
        quantityInput.dispatchEvent(new Event('change'));
        
        // Call displayPrice to update total price when quantity is changed
        displayPrice();
    }
}

function checkAllItems(checkbox) {
  var productCheckboxes = document.querySelectorAll('input[type="checkbox"][id^="product_"]');
  for (var i = 0; i < productCheckboxes.length; i++) {
    productCheckboxes[i].checked = checkbox.checked;
    // Trigger change event for each product checkbox
    productCheckboxes[i].dispatchEvent(new Event('change'));
  }
}

</script>




</body>
</html>