<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Pizza Hut</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar ul li {
            float: left;
        }

        .navbar ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar ul li a:hover {
            background-color: #ddd;
            color: black;
        }

        .about-section {
            height: 100%;
            background-image: url('img/bdrop1.jpg'); 
            background-size: cover;
            background-position: center;
            color: white;
            padding: 50px; 
        }

       
        .card {
            background: rgba(255, 255, 255, 0.7); 
            border: none;
        }
    </style>
</head>
<body>
<div class="navbar">
    <ul>
    <div class="navbar">
<ul>
    <?php include 'nav.php'; ?>
</ul>
</div>
</div>

<section class="about-section">
    <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-7">
                <div class="card">
                    <img src="img/logo2.jpg" class="card-img-top" alt="Pizza Hut">
                    <div class="card-body">
                        <h2 class="card-title">About Pizza Hut</h2>
                        <p class="card-text">Pizza Hut is an American restaurant chain and international franchise which was founded in 1958 in Wichita, Kansas by Dan and Frank Carney. The company is known for its Italian-American cuisine menu, including pizza and pasta, as well as side dishes and desserts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark text-white text-center py-4">
    <p>&copy; 2024 Pizza Hut. All rights reserved. For Educational Purposes Only!</p>
</footer>

<!-- Bootstrap JavaScript and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
