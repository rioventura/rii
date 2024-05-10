<!DOCTYPE html>
<html lang="en">
<head>
  <title> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  
</head>
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
<body>
  
<?php include "nav.php"; ?>

<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <form method="POST" action="../config/buy.php">
        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
        <div class="col-10">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">My Cart</h3>
          </div>
          
          <?php
          include "../config/conn.php";
          $id = $_GET['id'];
          $sql = "SELECT p.`id`, p.`image`, p.`product_name`, c.`category` AS `product_category`, p.`price`, p.`quantity`, p.`status`
          FROM `product_tbl` p JOIN `category_tbl` c ON p.`category` = c.`id` WHERE p.`id` = $id";

          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $price = $row['price'];
          ?>
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img src="../config/uploads/<?php echo $row['image']; ?>" class="img-fluid rounded-3" alt="Medicine" style="height:150px; width:200px;">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2"><span class="text-muted">Menu Name: </span><?php echo $row['product_name']; ?></p>
                  <p><span class="text-muted">Category: </span><?php echo $row['product_category']; ?></p>
                 
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
  <button type="button" class="btn btn-link px-2" onclick="updateQuantity(this.nextElementSibling, this.nextElementSibling, -1)">
    <i class="fa fa-minus"></i>
  </button>
  <input id="quantity_<?php echo $row['id']; ?>" min="1" name="quantity[]" max="5" value="1" type="number" class="form-control form-control-sm" data-price="<?php echo $row['price']; ?>" onchange="updatePrice(this, <?php echo $row['price']; ?>)" style="width: 100px;">
  <button type="button" class="btn btn-link px-2" onclick="updateQuantity(this.previousElementSibling, this.previousElementSibling, 1)">
    <i class="fa fa-plus"></i>
  </button>
</div>

                <div id="price_<?php echo $row['id']; ?>" class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">₱<?php echo $row['price']; ?></h5>
                </div>
                <input type="hidden" name="buy_item[]" value="<?php echo $row['id']; ?>">
              </div>
            </div>
          </div>
          <?php 
            }
          }
          ?>

          <div class="card">
            <div class="card-body">
              <div id="totalPrice" class="mt-3"></div>
              <input type="hidden" name="total_price" id="totalPriceInput" value="<?php echo $price; ?>">
              <button type="submit" class="btn btn-success btn-block btn-lg">Buy now</button>
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
  function updateQuantity(inputField, priceElement, change) {
    var currentValue = parseInt(inputField.value);
    var newValue = currentValue + change;
    if (newValue < 1 || newValue > 5) {
      return; // Limit the quantity between 1 and 5
    }
    inputField.value = newValue;
    updatePrice(inputField, parseInt(inputField.getAttribute('data-price')));
  }

  function updatePrice(inputField, pricePerItem) {
    var quantity = parseInt(inputField.value);
    var totalPrice = quantity * pricePerItem;
    var priceElementId = inputField.id.replace('quantity_', 'price_');
    document.getElementById(priceElementId).innerHTML = '₱' + totalPrice;
    calculateTotalPrice();
  }

  function calculateTotalPrice() {
    var total = 0;
    var priceElements = document.querySelectorAll('[id^="price_"]');
    priceElements.forEach(function(element) {
      total += parseInt(element.innerHTML.replace('₱', ''));
    });
    document.getElementById('totalPrice').innerHTML = '<h4>Total: ₱' + total + '</h4>';
    document.getElementById('totalPriceInput').value = total;
  }
</script>

</body>
</html>
