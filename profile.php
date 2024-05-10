<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <style>
    .social-part .fa {
      padding-right: 20px;
    }
    ul li a {
      margin-right: 20px;
    }
    img {
      height: 300px;
    }
    body {
      font-family: Arial;
    }
    .modal-content {
      border-radius: 20px;
      background-color: #f8f9fa; /* Light gray */
    }
    .modal-header {
      border-bottom: none;
    }
    .modal-title {
      font-weight: bold;
    }
    .btn-close {
      color: black;
    }
    .modal-body {
      padding: 2rem;
    }
    .modal-footer {
      border-top: none;
      padding: 1.5rem;
      justify-content: space-between; 
    }
    .modal-footer button {
      border-radius: 20px;
    }
  </style>
</head>
<body>

<?php include "nav.php"; ?>
<br><br>
<?php
include "../config/conn.php";
$sql = "SELECT * FROM `user_tbl` WHERE `user_id` = '$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['user_name'];
$email = $row['email'];
$password = $row['password'];
$photo = $row['photo'];
$role = $row['role'];
$money = $row['balance_money'];
?>
<div class="container mb-2 p-3 d-flex justify-content-center" style="margin-top:-3%;">
  <div class="card p-4">
    <div class="image d-flex flex-column justify-content-center align-items-center">
      <button class="btn btn-light">
        <?php
        if ($photo === "") {
          echo '<img src="pics/default.png" style="height:100px; width:150px;" />';
        } else {
          echo '<img src="../config/' . $photo . '" style="height:150px; width:200px;" />';
        }
        ?>
      </button>
      <span class="mt-3"><b>Username:</b></span>
      <span class="name"><?php echo $name; ?></span>
      <span class="mt-2"><b>Email:</b></span>
      <span class="idd"><?php echo $email; ?></span>
      <span class="mt-2"><b>Hashed password</b></span>
      <span class=""><?php echo $password; ?></span>
      <span class="follow"><b>Balance</b></span>
      <span class="number"><?php echo $money; ?></span>

      <div class="d-flex mt-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="fa fa-edit me-2" aria-hidden="true" style="color:black;"></i> Update Profile
        </button>
      </div>
      <div class="d-flex mt-2">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa fa-credit-card me-2"></i> Balance
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Update Profile Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Profile</h1>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../config/update-profile.php" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="userId" name="userId" value="<?php echo $user_id; ?>">
          <div class="mb-3">
            <label for="userId" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" id="profile" name="profile">
          </div>
          <div class="mb-3">
            <label for="userName" class="form-label">User Name</label>
            <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $name; ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="************">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Deposit Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Deposit</h1>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../config/update-fund.php">
          <input type="hidden" class="form-control" id="userId" name="userId" value="<?php echo $user_id; ?>">
          <div class="mb-3">
            <label for="userId" class="form-label"><b>Add Funds</b></label>
            <input type="number" class="form-control" id="fund" name="fund" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
