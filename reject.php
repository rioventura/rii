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
// Assuming you have established a database connection using mysqli
include "conn.php";

// Get the request_id from the URL
$req_id = $_GET['id'];

// Fetch the transaction details based on the request_id
$query = "SELECT `id`, `request_id`, `user_id`, `product_id`, `quantity`, `total_price`, `status` FROM `transactions_tbl` WHERE `request_id` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $req_id);
$stmt->execute();
$result = $stmt->get_result();
$transaction = $result->fetch_assoc();

if ($transaction) {
    // Check if the status is pending
    if ($transaction['status'] === 'pending') {
        // If the status is pending, update it to reject
        $updateQuery = "UPDATE `transactions_tbl` SET `status` = 'reject' WHERE `request_id` = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("i", $req_id);
        $stmt->execute();

        // Success SweetAlert
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Transaction status updated to reject.',
                    icon: 'success',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../admin/order.php';
                });
            </script>";
    } else {
        // Transaction status is not pending, so it will not be updated. SweetAlert
        echo "<script>
                Swal.fire({
                    title: 'Info!',
                    text: 'Transaction status is not pending, so it will not be updated.',
                    icon: 'info',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../admin/order.php';
                });
            </script>";
    }
} else {
    // Transaction not found for the given request ID. SweetAlert
    echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Transaction not found for the given request ID.',
                icon: 'error',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = '../admin/order.php';
            });
        </script>";
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>

</body>
</html>