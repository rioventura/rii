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

            <div class="container ">
                <div class="row  mb-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                       Add Products
                    </button>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT p.`id`, p.`image`,p.`product_name`, p.`category`, c.`category` AS `category_name`, p.`price`, p.`quantity`, p.`status`
            FROM `product_tbl` AS p
            JOIN `category_tbl` AS c ON p.`category` = c.`id`
            ;
            ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                 ?>
            <tr>
                <td><img src="../config/uploads/<?php echo $row['image']; ?>" alt="" style="height:120px;width:120px;"></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>

                <td>
                    <?php
                    // Check if status is 1
                    if ($row['status'] == "1") {
                        echo "<span class='badge bg-success'>Available</span>";
                    } else {
                        echo "<span class='badge bg-danger'>Not Available</span>";
                    }
                    ?>
                </td>


                
                <td>
                    <a href="edit-product.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-success" >Edit</button></a>
                    <a href="../config/delete-product.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-danger mt-2">Delete</button></a>
                 </td>
            </tr>
            <?php }} ?>
            
       
        </tbody>
      
    </table>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Medicine</h1>
                <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="../config/add-product.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input required type="file" accept="images" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Makeup's Name:</label>
                        <input required type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select required class="form-control" id="category" name="category">
                            <option disabled selected>&larr; Select Category &rarr;</option>
                           <?php 
                           $sql = "SELECT * FROM `category_tbl`";
                           $result = mysqli_query($conn, $sql);
                           while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['category'];?></option>
                            <?php }?>
                           
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input required type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input required type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select required class="form-control" id="status" name="status">
                            <option disabled selected>&larr; Select Status &rarr;</option>
                            <option value="1">Available</option>
                            <option value="2">Not Available</option>
                        </select> 
                   </div>
                   
                    <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <?php include 'footer.php'; ?>

</body>

</html>
