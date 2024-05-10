<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
// Include the connection file
include 'conn.php';

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Get user ID and fund amount from the form
    $userId = $_POST['userId'];
    $fund = $_POST['fund'];

    // Retrieve current balance from the database
    $query = "SELECT balance_money FROM user_tbl WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $currentBalance = $row['balance_money'];

    // Calculate new balance
    $newBalance = $currentBalance + $fund;

    // Update the balance in the database
    $updateQuery = "UPDATE user_tbl SET balance_money = $newBalance WHERE user_id = $userId";
    $updateResult = mysqli_query($conn, $updateQuery);

    if($updateResult) {
        // Success message with timeout
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Balance updated successfully.',
                    icon: 'success',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '../customer/profile.php';
                });
             </script>";
    } else {
        // Error message with timeout
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to update balance.',
                    icon: 'error',
                    timer: 1500,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '../customer/profile.php';
                });
             </script>";
    }
} else {
    // Redirect back to the page with an error message if form is not submitted
    header("Location: ../your-page.php?error=1");
    exit();
}
?>

</body>
</html>
