<!DOCTYPE html>
<html lang="en">
<head>
  <title>About Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,500i,700,800i" rel="stylesheet">
  <style>
     body{
      font-family:arial;
      
    }
    .social-part .fa{
    padding-right:20px;
}
ul li a{
    margin-right: 20px;
}

.about-heading {
    text-align: center;
    margin-bottom: 30px;
}

.content {
    display: flex;
    align-items: center;
}

.text {
    flex: 1;
}

.text p {
    font-size: 18px;
    line-height: 1.5;
}

.image {
    flex: 1;
    text-align: right;
}

.image img {
    width: 100%;
    border-radius: 10px;
}
/* Reviews Section */
.reviews {
    background-color: #f9f9f9;
    padding: 50px 0;
}



.card-group {
    display: flex;
    justify-content: center;
}

.card {
    width: 300px;
    margin: 0 15px;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card img {
    width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
}

.card-body {
    padding: 20px;
}

.card-body h3 {
    margin-top: 0;
}


.card-footer {
    background-color: #f5f5f5;
    padding: 10px;
    text-align: right;
    border-top: 1px solid #ddd;
}

.text-body-secondary {
    font-size: 14px;
    color: #666;
}
.stars .fas {
      color: black;
   }
  </style>
</head>
  <body>

  <?php include "nav.php"; ?>


  <div class="container">
        <h1 class="about-heading">ABOUT US</h1>
        <div class="content">
            <div class="image">
                <img src="img/bdrop1.jpg" alt="">
            </div>
            <div class="text">
            <p>Pizza Hut brings satisfaction to everybody's day with its signature pizzas, pastas, wings, and more.</p>
<p>If you want more background check <a href="https://www.pizzahut.com/aboutus.html" target="_blank">Pizza Hut</a> to know more.</p>

               
            </div>
        </div>
    </div> 
</body>
            <div class="card-footer">
               <small class="text-body-secondary" style="font-size: 18px;">Last updated 20 mins ago</small>
            </div>
         </div>
      </div>
   </div>
</section>


<?php include "../footer.php"; ?>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function () {
$('.navbar-light .dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });
});
</body>
</html>
