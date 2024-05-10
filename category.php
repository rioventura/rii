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
                        Add Category
                    </button>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr class="text-center">
              
                <th>ID</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM category_tbl";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   ?>
                    <tr class="text-center">
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["category"];?></td>
                        <td>
                            <a href="edit-category.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-success" >Edit</button></a>
                            <a href="../config/delete-cetegory.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    <?php
                }
            }
           ?>
            
       
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
                    <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
                <div class="modal-body">
                <form method="POST" action="../config/add-cetegory.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Category" name="category">
                    </div>
                    
                 
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
              
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>
