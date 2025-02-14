<?php
include('dbcon.php');
if(isset($_POST['add_students'])){
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if($fname == "" || empty($fname)){
        header('location:index.php?message=One of champ is empty');
    }else{
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) 
                    VALUES ('$fname', '$lname', '$age')";
        $result = mysqli_query($connection,$query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }

        else{
            header('location:index.php?insert_msg=Your data has been added successefully');
        }
    }
}

?>