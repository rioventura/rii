<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <style>
      body {
    font-family: 'Raleway', sans-serif;
}

.social-part .fa {
    padding-right: 20px;
}

ul li a {
    margin-right: 20px;
}

.card {
    border: none;
}

.form-label {
    color: #333;
}
.btn-red {
    background-color: #FF0000;
    border-color: #FF0000;
    font-family: 'Raleway', sans-serif; /* Change the font family */
}

.btn-red:hover {
    background-color: #CC0000;
    border-color: #CC0000;
}

  </style>
</head>
  <body>

  <?php include "nav.php"; ?>


<!-- Contact 4 - Bootstrap Brain Component -->
<section class="bg-light py-1 py-sm-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <h3 class="fs-6 text-secondary mb-2 text-center">CONTACT US</h3>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card-group">
          <div class="card">
            <div class="card-body">
              <form action="config/message.php" method="POST">
                <div class="form-group">
                  <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="full_name" name="full_name" value="" required>
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" value="" required>
                </div>
                <div class="form-group">
                  <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control" id="phone_number" name="phone_number" value="" required>
                </div>
                <div class="form-group">
                  <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="subject" name="subject" value="" required>
                </div>
                <div class="form-group">
                  <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <div class="form-group">
                <button class="btn btn-primary btn-lg btn-red" type="submit" name="submit">Send Message</button>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>