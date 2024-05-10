<?php
    include 'config/conn.php';

    
        $username = 'username';
        $email = 'admin@gmail.com';
        $pass = 'admin';
        $rpass = 'admin';
        $role = 'Admin';

        if ($pass == $rpass){
            
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `admin_tbl`(`email`, `password`, `role`) VALUES ('$email','$hashed_password','$role')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>alert('Registered Successfully');</script>";
                echo "<script>window.location.href = '../login.php';</script>";
            }
            else
            {
                echo "<script>awindow.location.href = '../registration.php';</script>";

            }
        }
        else{
            echo "<script>alert('Passwords do not match');</script>";
        }
    
?>
