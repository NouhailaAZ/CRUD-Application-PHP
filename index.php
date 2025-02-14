<?php include('header.php')?>
<?php include('dbcon.php')?>

        <div class="box  mt-5">
            <h2>ALL Students</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add students </button>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Age</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                $query = "select * from `students`";
                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("query Failed".mysqli_error());
                }else{
                    while($row = mysqli_fetch_assoc($result)){
                
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>

        <?php
            if(isset($_GET['message'])){
                echo '<h6 class="text-danger">'.$_GET['message']."</h6>";
            }
            
        ?>

        <?php
            if(isset($_GET['insert_msg'])){
                echo '<h6 class="text-success">'.$_GET['insert_msg']."</h6>";
            }
            
        ?>

        <?php
            if(isset($_GET['update_msg'])){
                echo '<h6 class="text-info">'.$_GET['update_msg']."</h6>";
            }
            
        ?>
        <?php
            if(isset($_GET['delete_msg'])){
                echo '<h6 class="text-danger">'.$_GET['delete_msg']."</h6>";
            }
            
        ?>

        <form action="insert_data.php" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENT</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="f_name">First Name</label>
                                    <input type="text" name="f_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="l_name">Last Name</label>
                                    <input type="text" name="l_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="text" name="age" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" name="add_students" value="ADD"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php include('footer.php')?>
