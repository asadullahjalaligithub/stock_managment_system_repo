<?php
    session_start();
    require_once("db/dbconnection.php");
    $id = $_GET['item_id'];
    $user_id = $_GET['user_id'];
    
    $sql = "DELETE FROM rec_item WHERE id = $id";

    $res = mysqli_query($con,$sql);
    
    if($res){
        $_SESSION['delete_item'] = "<script>swal('Good Job!','Successfully Delete Item','success');</script>";
        header("location:home.php?user_id=$user_id");
    }else{
       $_SESSION['delete_item'] = "<script>swal('Warning!','Unsuccessfully Delete Item','warning');</script>";
        header("location:home.php?user_id=$user_id");
    }
    
?>