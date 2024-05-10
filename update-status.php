<?php include "conn.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit; 
}
?>


<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include 'side.php'; ?>

        <!-- Page Content  -->
        <div id="content">
            <?php include 'nav.php'; ?>

            <div class="container-fluid">
                
            <section class="h-100" style="background-color: #eee; overflow: hidden;">
  <div class="container h-100 py-5" style="overflow-y: auto; max-height: 80vh;">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Buyed Item</h3>
        </div>

        <?php 
        $req_id = $_GET['request'];
        include "../config/conn.php";
        $sql = "SELECT 
        pt.`id` AS product_id, 
        pt.`image`, 
        pt.`product_name`, 
        pt.`category`, 
        pt.`price`, 
        pt.`quantity`, 
        pt.`quantity` AS product_quantity, 
        pt.`status` AS product_status, 
        ct.`id` AS category_id,
        ct.`category`,
        tt.`id` AS transaction_id,
        tt.`status` AS transaction_status,
        tt.`quantity` AS transaction_quantity,
        tt.`total_price` AS total_prices

        FROM 
        `product_tbl` pt 
        JOIN 
        `transactions_tbl` tt ON pt.`id` = tt.`product_id` 
        JOIN 
        `user_tbl` ut ON tt.`user_id` = ut.`user_id`
        JOIN
        `category_tbl` ct ON pt.`category` = ct.`id`
        WHERE 
         tt.`request_id` = $req_id;";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $status = $row['transaction_status'];
                ?>
     
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="../config/uploads/<?php echo $row['image']; ?>" class="img-fluid rounded-3" alt="Medicine" style="height:150px; width:200px;">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal  mb-2"><span class="text-muted">Product Name: </span> <?php echo $row['product_name'];?></p>
                                <p><span class="text-muted">Category: </span> <?php echo $row['category'];?></p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <h4>Quantity: <?php echo $row['transaction_quantity'];?></h4>
                            </div>

                                <div id="price" class="col-md-3 col-lg-2 col-xl-2 offset-lg-1" data-price="">
                                    <h5 id="priceValue" class="mb-0 priceValue">₱ <?php echo $row['total_prices'];?></h5>
                                </div>

                        </div>
                    </div>
                </div>
            <?php }} ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div id="totalPrice" class="mt-3">Total:</div>
                            <div id="status" class="mt-1 mb-2">Status: <?php echo $status;?></div>
                            <a href="../config/aprroved.php?id=<?php echo $req_id ?>" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-block btn-lg">Approved </a>
                            <a href="../config/reject.php?id=<?php echo $req_id ?>" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger btn-block btn-lg">Reject </a>

                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


            </div>


        </div>
    </div>

  

   <!-- jQuery CDN - Slim version (=without AJAX) -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Include DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        className: 'btn btn-success',
                        text: '<i class="fas fa-file-excel"></i> Excel'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-outline-primary',
                        text: '<i class="fas fa-file-csv"></i> CSV'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-outline-info',
                        text: '<i class="fas fa-print"></i> Print'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-outline-danger',
                        text: '<i class="fas fa-file-pdf"></i> PDF'
                    }
                ],
                lengthMenu: [10, 25, 50, 100],
                order: [],
                initComplete: function () {
                    // Adjust length dropdown width
                    $('.dataTables_length select').css('width', '100px'); // Adjust width as needed
                }
            });
        });



        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var total = 0; // Initialize total price to zero
        
        // Get all elements with class 'priceValue'
        var priceElements = document.getElementsByClassName("priceValue");

        // Loop through each price element
        for (var i = 0; i < priceElements.length; i++) {
            // Get the inner text of the current price element
            var priceValue = priceElements[i].innerText;
            // Remove the currency symbol and convert the price to a number
            var price = parseFloat(priceValue.replace('₱ ', ''));
            // Add the price to the total
            total += price;
        }

        // Set the total price
        document.getElementById("totalPrice").innerText = "Total: ₱ " + total.toFixed(2);
    });
</script>
</body>

</html>
