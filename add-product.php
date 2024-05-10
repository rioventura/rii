<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include_once "conn.php";

if(isset($_POST['submit'])) {
    $category = $_POST['category'];
    $name = $_POST['name'];

    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_path = "uploads/".$image; 

    move_uploaded_file($image_temp, $image_path);

    $sql = "INSERT INTO `product_tbl` (`image`, `product_name`,`category`, `price`,`quantity`, `status`, `description`) VALUES ('$image', '$name', '$category', '$price', '$quantity', '$status', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Pet added successfully.',
                    icon: 'success',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../admin/product.php';
                });
              </script>";
    } else { 
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?> 
</body>
</html>
