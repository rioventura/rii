<?php include "conn.php"; ?>
<!DOCTYPE html>
<html>

<?php include 'cdn.php'; ?>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include 'side.php'; ?>

        <!-- Page Content  -->
        <div id="content">
            <?php include 'nav.php'; ?>


<div class="container">
    <div class="row ">
   
        <div class="col-xl-4 col-lg-5 mt-2">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Customers</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                            $sql = "SELECT COUNT(*) AS total_users FROM `user_tbl`";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['total_users'];
                            ?>
                                
                            </h2>
                        </div>
                       
                    </div>
                  
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 mt-2">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                  
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Menu products</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            <?php
                            $sql = "SELECT COUNT(*) AS total_pets FROM `product_tbl`";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['total_pets'];
                            ?>
                            </h2>
                        </div>
                   
                    </div>
                 
                </div>
            </div>
        </div>
       
            </div>
        </div>
    </div>
</div>
                </div>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>
