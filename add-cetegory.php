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
include 'conn.php';

if (isset($_POST['submit'])) {

    $category =  $_POST['category'];
    
    $sql = "INSERT INTO `category_tbl`(`category`) VALUES ('$category')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Category added successfully.',
                    icon: 'success',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../admin/category.php';
                });
              </script>";
    } else { 
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?> 
</body>
</html>
