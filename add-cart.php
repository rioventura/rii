<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<?php
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $category = $_POST['category'];


    $sql = "INSERT INTO cart_tbl (product_id, user_id, status) VALUES ('$product_id', '$user_id', 'np')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                Swal.fire({
                  title: 'Added to Cart',
                  text: 'Product has been added to your cart.',
                  icon: 'success',
                  confirmButtonText: 'OK'
                }).then(() => {
                 
                    window.location.href = '../customer/product.php?cetegory=$category';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                  title: 'Error',
                  text: 'Error adding product to cart. Please try again.',
                  icon: 'error',
                  confirmButtonText: 'OK'
                }).then(() => {
                 
                    window.location.href = 'cart.php';
                });
              </script>";
    }
}
?>

</body>
</html>