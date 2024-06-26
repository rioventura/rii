<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Message</title>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include 'conn.php';

if (isset($_POST['submit'])) {

    $full_name =  $_POST['full_name'];
    $email =  $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $subject =  $_POST['subject'];
    $message =  $_POST['message'];
    
    $sql = "INSERT INTO `message_tbl` (`full_name`, `email`, `phone_number`, `subject`, `message`) VALUES ('$full_name', '$email', '$phone_number', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Message submitted successfully.',
                    icon: 'success',
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../index.php';
                });
              </script>";
    } else {
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while submitting the message.',
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
