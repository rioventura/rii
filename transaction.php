<!DOCTYPE html>
<html lang="en">
<head>
  <title>orders</title>
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


.ratings i {

  color: green;
}


  </style>
</head>
  <body>

  <?php include "nav.php"; ?>
  <section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Purchased</h3>
        </div>

        <?php 
        $req_id = $_GET['request'];
        include "../config/conn.php";
        $sql = "SELECT 
        pt.`id` AS product_id, 
        pt.`image`, 
        pt.`product_name`, 
        pt.`category`, 
        pt.`price`, 
        pt.`quantity`, 
        pt.`quantity` AS product_quantity, 
        pt.`status` AS product_status, 
        ct.`id` AS category_id,
        ct.`category`,
        tt.`id` AS transaction_id,
        tt.`status` AS transaction_status,
        tt.`quantity` AS transaction_quantity,
        tt.`total_price` AS total_prices

        FROM 
        `product_tbl` pt 
        JOIN 
        `transactions_tbl` tt ON pt.`id` = tt.`product_id` 
        JOIN 
        `user_tbl` ut ON tt.`user_id` = ut.`user_id`
        JOIN
        `category_tbl` ct ON pt.`category` = ct.`id`
        WHERE 
        ut.`user_id` = $user_id 
        AND tt.`request_id` = $req_id;";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $status = $row['transaction_status'];
                ?>
     
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="../config/uploads/<?php echo $row['image']; ?>" class="img-fluid rounded-3" alt="Medicine" style="height:150px; width:200px;">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal  mb-2"><span class="text-muted">Menu Name: </span> <?php echo $row['product_name'];?></p>
                                <p><span class="text-muted">Category: </span> <?php echo $row['category'];?></p>
                                
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <h4>Available : <?php echo $row['transaction_quantity'];?></h4>
                            </div>

                                <div id="price" class="col-md-3 col-lg-2 col-xl-2 offset-lg-1" data-price="">
                                    <h5 id="priceValue" class="mb-0 priceValue">₱ <?php echo $row['total_prices'];?></h5>
                                </div>

                        </div>
                    </div>
                </div>
            <?php }} ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div id="totalPrice" class="mt-3">Total:</div>
                            <div id="status" class="mt-1 mb-2">Status: <?php echo $status;?></div>
                            <a href="../config/cancel.php?id=<?php echo $req_id ?>" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg">Cancel </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var total = 0; // Initialize total price to zero
        
        // Get all elements with class 'priceValue'
        var priceElements = document.getElementsByClassName("priceValue");

        // Loop through each price element
        for (var i = 0; i < priceElements.length; i++) {
            // Get the inner text of the current price element
            var priceValue = priceElements[i].innerText;
            // Remove the currency symbol and convert the price to a number
            var price = parseFloat(priceValue.replace('₱ ', ''));
            // Add the price to the total
            total += price;
        }

        // Set the total price
        document.getElementById("totalPrice").innerText = "Total: ₱ " + total.toFixed(2);
    });
</script>




</body>
</html>