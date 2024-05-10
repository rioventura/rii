<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
</head>
<style>
    
.cart-message {
    background-color: #ffcccc;
    padding: 10px;
    border-radius: 5px;
    text-align: center; /* Center text */
    margin: 0 auto; /* Center horizontally */
    width: 50%; /* Set width to control centering */
}

.cart-message p {
    font-weight: bold;
    margin-bottom: 10px; /* Add space between paragraphs */
}

.cart-message a {
    color: blue;
    text-decoration: underline;
}

</style>
<body>
<?php include "nav.php"; ?>
    <br>
    <!-- Display a message informing the user to log in -->
    <div class="cart-message">
        <p>Attention:</p>
        <p>You need to <a href="login.php">log in</a> first to view your cart.</p>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
