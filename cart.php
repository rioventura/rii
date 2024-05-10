<!DOCTYPE html>
<html lang="en">
<head>
  <title>My cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

body {
    font-family: Arial;
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
        border-radius: 1rem;
       
}







  </style>
</head>
  <body>

  <?php include "nav.php"; ?>
  <section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <form method="POST" action="../config/buy.php">
        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
      <div class="col-10">

      <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black"> My Cart</h3>
          <div>
          <input type="checkbox" id="checkAll" onchange="checkAllItems(this)">
  <label for="checkAll">Select All</label>
          </div>
        </div>
        </div>
        <?php
    include "../config/conn.php";

    $sql = "SELECT 
                cart_tbl.id AS cart_id,
                cart_tbl.product_id,
                cart_tbl.user_id,
                cart_tbl.status AS cart_status,
                product_tbl.id AS product_id,
                product_tbl.image,
                product_tbl.product_name,
                product_tbl.category,
                product_tbl.price,
                product_tbl.quantity,
                product_tbl.status AS product_status,
                category_tbl.category AS product_category,
                user_tbl.user_name,
                user_tbl.email,
                user_tbl.photo,
                user_tbl.role
            FROM 
                cart_tbl
            JOIN 
                product_tbl ON cart_tbl.product_id = product_tbl.id
            JOIN 
                category_tbl ON product_tbl.category = category_tbl.id
            JOIN 
                user_tbl ON cart_tbl.user_id = user_tbl.user_id
            WHERE 
                cart_tbl.status = 'np'
                AND cart_tbl.user_id = $user_id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card rounded-3 mb-1">
                <div class="card-body p-4">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                            <img src="../config/uploads/<?php echo $row['image']; ?>" class="img-fluid rounded-3" alt="Medicine" style="height:150px; width:200px;">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <p class="lead fw-normal  mb-2"><span class="text-muted">Menu Name: </span><?php echo $row['product_name']; ?></p>
                            <p><span class="text-muted">Category: </span><?php echo $row['product_category']; ?> </p>
                            
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" onclick="updateQuantity(this.nextElementSibling, this.nextElementSibling, -1)">
                                <i class="fa fa-minus"></i>
                            </button>
                            <input id="quantity_<?php echo $row['cart_id']; ?>" min="1" name="quantity[]" max="5" value="1" type="number" class="form-control form-control-sm" data-price="<?php echo $row['price']; ?>" onchange="updatePrice(this, <?php echo $row['price']; ?>)">
                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2" onclick="updateQuantity(this.previousElementSibling, this.previousElementSibling, 1)">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                        <div id="price_<?php echo $row['cart_id']; ?>" class="col-md-3 col-lg-2 col-xl-2 offset-lg-1" data-price="<?php echo $row['price']; ?>">
                            <h5 class="mb-0">₱<?php echo $row['price']; ?></h5>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <!-- Checkbox for specific item -->
                            <input type="checkbox" id="product_<?php echo $row['cart_id']; ?>" name="buy_item[]" value="<?php echo $row['product_id']; ?>">
                            <input type="hidden" name="cart_id[]" value="<?php echo $row['cart_id']; ?>">

                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <!-- Checkbox for specific item -->
                            <a href="../config/delete-cart.php?id=<?php echo $row['cart_id']; ?>" class="text-danger me-5"><i class="fa fa-trash fa-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        }
    }
?>

        <div class="">
          <div class="card-body">
          <div id="totalPrice" class="mt-3"></div>
          <input type="hidden" name="total_price" id="totalPriceInput">

            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg">Buy now</button>
          </div>
        </div>

      </div>
      </form>
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