<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit; 
}
include "../config/conn.php";
$user_id = $_SESSION['user_id'];
$query = "SELECT `user_id`, `user_name`, `email`, `password`, `photo`, `role` FROM `user_tbl` WHERE `user_id` = $user_id";
$result = $conn->query($query);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_name = $row['user_name'];
} else {
    
    echo "Error: Unable to retrieve user data.";
    exit;
}
?>
<style>
    
    .navbar-nav .nav-item .nav-link:hover,
    .navbar-nav .nav-item .nav-link.active {
        color: black; 
        border-bottom: 3px black; 
    }
</style>




<nav class="navbar navbar-expand-sm" style="background-color: gray; ">
    <div class="container">
        <a class="navbar-brand" href="#">
            
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
         aria-label="Toggle navigation" style="background-color: light; ">
            <span class="navbar-toggler-icon" style="background-color: light; "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color:black;">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-active dropdown dmenu">
                    <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbardrop" data-toggle="dropdown">
                        Menu
                    </a>
                    <div class="dropdown-menu sm-menu">
                        <?php
                        include "../config/conn.php";
                        $sql = "SELECT * FROM category_tbl";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <a class="dropdown-item" href="product.php?cetegory=<?php echo $row['id'];?>" style="color:black;"><?php echo $row['category'];?></a>
                        <?php }?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" style="color:black;">Contact Us</a>
                </li>
              
                
         
                <li class="nav-item">
    <div class="social-part" style="display: flex; gap: 5px;">
        <a href="cart.php" class="btn btn-sm nav-link" style="box-shadow: none; color: white;">My Cart</a>
    </div>
</li>

                 <div class="dropdown" >
                    <a class="btn-lg btn dropdown-toggle" href="#" role="button" id="userDropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                     style="box-shadow: none;" style="color: white;">
                         <i class="fa fa-user" aria-hidden="true" ></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="record.php">Transaction</a>

                        <a class="dropdown-item" href="../config/logout.php">Logout</a>
                    </div>
                </div>
            </div>
              </li>
            </div>
            </ul>
        </div>
    </div>
</nav>