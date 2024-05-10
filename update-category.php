<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include 'conn.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
   
    $sql = "UPDATE `category_tbl` SET `category`='$category' WHERE `id`='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Updated category successfully',
                    icon: 'success',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../admin/category.php';
                });
              </script>";
    } else { 
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while updating category',
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
