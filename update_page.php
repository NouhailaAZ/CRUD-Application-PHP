<?php include('header.php')?>
<?php include('dbcon.php')?>


    <?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $query = "select * from `students` where `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("query Failed".mysqli_error());
    }else{
        $row = mysqli_fetch_assoc($result);
        }
    

    ?>
    <?php
    if(isset($_POST['update_students'])){
        if(isset($_GET['id_new'])){
            $newId = $_GET['id_new'];
        
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];

        $query = "update `students` set 
                                    `first_name`= '$fname' , 
                                    `last_name`= '$lname', 
                                    `age`= '$age'
                                    where `id`= '$newId'";    
        }
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("query Failed".mysqli_error());
        }else{
           header('location:index.php?update_msg=Your data has been updated successefully');
        }
        }

    ?>
    
    <form action="update_page.php?id_new=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>">
        </div>
        <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control" value= "<?php echo $row['last_name']; ?>">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value= "<?php echo $row['age']; ?>">
        </div>
        <input type="submit" class="btn btn-success mt-4" name="update_students" value="UPDATE"/>

    </from>


<?php include('footer.php')?>