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
include "conn.php";

// Assuming you have already established a database connection

$req_id = $_GET['id']; // Assuming you're using GET method, adjust accordingly for POST

// Fetch transaction details based on the provided request ID
$query = "SELECT `id`, `request_id`, `user_id`, `product_id`, `quantity`, `total_price`, `status`
          FROM `transactions_tbl` WHERE `request_id` = $req_id";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $transaction_id = $row['id'];
    $user_id = $row['user_id'];
    $product_id = $row['product_id'];
    $quantity = $row['quantity'];
    $status = $row['status'];
    // Check the status of the transaction and perform actions accordingly
    if ($status == "pending") {
        // Update transaction status to "approved"
        $update_query = "UPDATE `transactions_tbl` SET `status` = 'approved' WHERE `request_id` = $req_id";
        mysqli_query($conn, $update_query);

        // Fetch product details
        $product_query = "SELECT `quantity`, `price` FROM `product_tbl` WHERE `id` = $product_id";
        $product_result = mysqli_query($conn, $product_query);
        $product_row = mysqli_fetch_assoc($product_result);
        $product_quantity = $product_row['quantity'];
        $product_price = $product_row['price'];

        // Compute total price of the transaction
        $total_price = $row['total_price'];

        // Update user balance
        $user_query = "SELECT `balance_money` FROM `user_tbl` WHERE `user_id` = $user_id";
        $user_result = mysqli_query($conn, $user_query);
        $user_row = mysqli_fetch_assoc($user_result);
        $user_balance = $user_row['balance_money'];

        // Check if user has sufficient balance
        if ($user_balance >= $total_price) {
            // Deduct total price from user balance
            $new_balance = $user_balance - $total_price;
            
            // Update user balance
            $update_user_query = "UPDATE `user_tbl` SET `balance_money` = $new_balance WHERE `user_id` = $user_id";
            mysqli_query($conn, $update_user_query);
            
            // Deduct quantity from product quantity
            $new_product_quantity = $product_quantity - $quantity;
            $update_product_query = "UPDATE `product_tbl` SET `quantity` = $new_product_quantity WHERE `id` = $product_id";
            mysqli_query($conn, $update_product_query);

            // Check if product quantity becomes zero
            if ($new_product_quantity == 0) {
                $update_product_status_query = "UPDATE `product_tbl` SET `status` = 2 WHERE `id` = $product_id";
                mysqli_query($conn, $update_product_status_query);
            }

            // Success SweetAlert
            echo "<script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Transaction approved. User balance updated. Product quantity updated.',
                        icon: 'success',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = '../admin/order.php';
                    });
                </script>";
        } else {
            // Insufficient balance, SweetAlert
            echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Insufficient balance',
                        icon: 'error',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = '../admin/order.php';
                    });
                </script>";
        }
    } else {
        // Transaction is not pending, SweetAlert
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Transaction is not pending',
                    icon: 'error',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../admin/order.php';
                });
            </script>";
    }
} else {
    // Transaction not found, SweetAlert
    echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Transaction not found',
                icon: 'error',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = '../admin/order.php';
            });
        </script>";
}
?>
   
</body>
</html>
