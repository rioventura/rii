<?php include "conn.php"; 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT `category` FROM `category_tbl` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $category = $row['category'];

   
}
?>
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
               
                <div class="row justify-content-center">
                <form method="POST" action="../config/update-category.php">
                    <div class="mb-3  text-center">
                        <label for="exampleInputEmail1" class="form-label">Update Category</label>
                        <input type="hidden" value="<?php echo $id; ?>" name="id">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" name="category" value="<?php echo $category; ?>">
                    </div>
                    <div class="modal-footer justify-content-center">
                    <a href="category.php" class="btn btn-danger me-2" >Cancel</a>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        </div>
    </div>

  

    <?php include 'footer.php'; ?>

</body>

</html>
