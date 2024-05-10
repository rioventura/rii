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
include "conn.php";

if(isset($_POST['submit'])){
    $id = $_POST['userId'];
    $user_name = $_POST['userName'];
    $email = $_POST['email'];
    $new_password = $_POST['password']; 
    
    // Initialize an array to store the fields and their values for the update query
    $fields = array();

    // Check if a new password is provided
    if(!empty($new_password)) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $fields[] = "`password`='$hashed_password'";
    }
    
    if($_FILES['profile']['name'] != ""){
        $target = "uploads/";
        $file = $target . basename($_FILES['profile']['name']);
        move_uploaded_file($_FILES['profile']['tmp_name'], $file);
        $photo = $file;
        
        $fields[] = "`photo`='$photo'";
    }
    
    // Construct the SET clause of the SQL query
    $set_clause = implode(", ", $fields);

    // Construct the full SQL query
    $sql = "UPDATE `user_tbl` SET `user_name`='$user_name', `email`='$email'";
    if (!empty($set_clause)) {
        $sql .= ", " . $set_clause;
    }
    $sql .= " WHERE `user_id`='$id'";

    // Execute the query
    $result = $conn->query($sql);

    if($result){
        // Show SweetAlert success message
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Profile updated successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../customer/profile.php';
            });
        </script>";
    } else {
        // Show SweetAlert error message
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Failed to update profile.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../customer/profile.php';
            });
        </script>";
    }
}
?>  
</body>
</html>
