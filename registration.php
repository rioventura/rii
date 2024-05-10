<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <style>
       body{
      font-family:Arial;
    }
    .social-part .fa{
    padding-right:20px;
}
ul li a{
    margin-right: 20px;
}
img{
  height:600px;
}

  </style>
</head>
  <body>

  <?php include "nav.php"; ?>


  <section class="vh-100 mt-4">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-6"> 
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-4"> 
            <div class="row justify-content-center">
              <div class="col-md-12">

                <p class="text-center h1 fw-bold mb-4">Sign up</p> 

                <form action="config/registration.php" method="POST" class="mx-4" enctype="multipart/form-data"> <!-- Tinanggal ang mga espasyo sa paligid -->

                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="username">Unique username</label>
                      <input required type="text" id="username" name="username" class="form-control" placeholder="Joy" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="email">Your Email</label>
                      <input required type="email" id="email" name="email" class="form-control" 
                      placeholder="user@gmail.com" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="pass">Password</label>
                      <input required type="password" id="pass" name="pass" class="form-control"
                       placeholder="*******" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="rpass">Repeat your password</label>
                      <input required type="password" id="rpass" name="rpass" class="form-control"
                       placeholder="*******" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mb-3">
                    <button type="submit" name="submit" id="submit" class="btn btn-success btn-lg">Register</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>