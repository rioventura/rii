<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pet</title>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include_once "conn.php";

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    // Check if image file is uploaded
    if($_FILES['image']['size'] > 0) {
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/".$image; 

        // Move uploaded image to destination folder
        move_uploaded_file($image_temp, $image_path);

        // Prepare SQL statement with prepared statement
        $stmt = $conn->prepare("UPDATE `product_tbl` SET `image`=?, `product_name`=?, `category`=?, `price`=?, `quantity`=?, `status`=? WHERE `id`=?");
        $stmt->bind_param("ssssssi", $image, $name, $category, $price, $quantity, $status, $id);
    } else {
        // Prepare SQL statement with prepared statement
        $stmt = $conn->prepare("UPDATE `product_tbl` SET `product_name`=?, `category`=?, `price`=?, `quantity`=?, `status`=? WHERE `id`=?");
        $stmt->bind_param("sssssi", $name, $category, $price, $quantity, $status, $id);
    }

    // Execute SQL statement
    if ($stmt->execute()) {
        // If successful, display success message
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Updated successfully',
                    icon: 'success',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../admin/product.php';
                });
              </script>";
    } else {
        // If execution fails, display error message
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while updating',
                    icon: 'error',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
              </script>";
    }
}
?>
</body>
</html>
