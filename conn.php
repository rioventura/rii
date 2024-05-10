<?php
    $server = 'localhost';
    $username = 'root';
    $dbpass = '';
    $dbname = 'ph_db';

    $conn = mysqli_connect($server, $username, $dbpass, $dbname);
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    };
?>