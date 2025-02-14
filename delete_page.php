<?php include('dbcon.php')?>

<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // print_r($id);
    }

    $query = "delete from `students`where `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("query Failed".mysqli_error());
    }else{
       header('location:index.php?delete_msg=Your data has been deleted successefully');
    }

?>