<?php include "conn.php"; 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `product_tbl` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
    $category = $row['category'];
    $price = $row['price'];
    $quantity = $row['quantity'];
    $status = $row['status'];
   





   
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
                <form action="../config/update-product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" accept="images" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Menu Name:</label>
                        <input required type="text" class="form-control" id="name" name="name" value="<?php echo $row['product_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select required class="form-control" id="category" name="category">
                            <option disabled>&larr; Select Category &rarr;</option>
                            <?php 
                            $sql = "SELECT * FROM `category_tbl`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $selected = (isset($category) && $category == $row['id']) ? 'selected' : '';
                                echo "<option value='".$row['id']."' ".$selected.">".$row['category']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input required type="text" class="form-control" id="price" name="price" value="<?php echo isset($price) ? $price : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input required type="number" class="form-control" id="quantity" name="quantity" value="<?php echo isset($quantity) ? $quantity : ''; ?>">
                    </div>
                
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select required class="form-control" id="status" name="status">
                            <option disabled>&larr; Select Status &rarr;</option>
                            <option value="1" <?php if(isset($status) && $status == '1') echo 'selected'; ?>>In Stock</option>
                            <option value="2" <?php if(isset($status) && $status == '2') echo 'selected'; ?>>Out Of Stock</option>
                        </select>
                    </div>
                   
                    <a href="med.php" class="btn btn-danger me-2" >Cancel</a>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
                </div>
            </div>
        </div>


        </div>
    </div>

  

    <?php include 'footer.php'; ?>

</body>

</html>
