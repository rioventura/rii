<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <style>
    .social-part .fa {
        padding-right: 20px;
    }
    ul li a {
        margin-right: 20px;
    }
    img {
        height: 300px;
    }
    body {
        font-family: Arial;
    }
    body {
      background-color: #eee;
    }
    .add {
        border-radius: 20px;
    }
    .card {
        border: 1px solid #ccc;
        border-radius: 20px;
        transition: all 1s;
        cursor: pointer;
    }
   
    /* Custom CSS for the card */
    .card .card-body .title {
        font-weight: bold;
    }
    .card .card-body .text-primary {
        color: blue; /* Change color as desired */
    }
  </style>
</head>
<body>

<?php include "nav.php"; ?>
<br>
<div class="">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    
                </div>
            </div>
            <div class="row">
                <?php include "../config/conn.php"; 
                $category = $_GET["cetegory"];
                $sql = "SELECT p.`id`, p.`image`, p.`product_name`, c.`category` AS `category_name`, p.`price`, p.`quantity`, p.`status` 
                        FROM `product_tbl` AS p 
                        JOIN `category_tbl` AS c ON p.`category` = c.`id` 
                        WHERE p.`category` = $category";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card mb-4">
                            <img src="../config/uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <div class="title">Menu Name: <span class="text-primary"><?php echo $row['product_name'];?></span></div>
                                <div class="title">Category: <span class="text-primary"><?php echo $row['category_name'];?></span></div>
                                <div class="text-primary"><span class="text-dark">₱ </span><span class="text-primary"><?php echo $row['price'];?></span></div>
                                <div class="text-primary"><span class="text-dark">Available :</span><span class="text-primary"><?php echo $row['quantity'];?></span></div>
                                <div class="text-primary">
                                    <span class="text-dark">Status now: </span>
                                    <?php
                                        if ($row['status'] == 1) {
                                            echo "<span class='text-primary'>available</span>";
                                        } else {
                                            echo "<span class='text-primary'>not available</span>";
                                        }
                                    ?>
                                </div>
                                <form action="../config/add-cart.php" method="POST">
                                    <input type="hidden" value="<?php echo $category; ?>" name="category">
                                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <a href="buy.php?id=<?php echo $row['id']; ?>" class="btn btn-primary w-100">Buy now</a>
                                    <button type="submit" class="btn btn-tomato w-100 mt-2">Add cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
