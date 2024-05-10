<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
session_start();
$_SESSION = array();
session_destroy();
echo "<script>
        Swal.fire({
            title: 'Logged Out',
            text: 'You have been logged out successfully',
            icon: 'success',
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: true,
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href='../login.php';
        });
      </script>";
exit;
?>
</body>
</html>
