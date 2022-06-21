<?php
    session_start();
    require_once("db/dbconnection.php");
    $id = $_GET['item_id'];
    $user_id = $_GET['user_id'];
    
    $sql = "DELETE FROM submit_item WHERE id = $id";

    $res = mysqli_query($con,$sql);
    
    if($res){
        $_SESSION['delete_item_out'] = "<script>swal('Good Job!','Successfully Delete Item','success');</script>";
        header("location:out_ltem_list.php?user_id=$user_id");
    }else{
       $_SESSION['delete_item_out'] = "<script>swal('Warning!','Unsuccessfully Delete Item','warning');</script>";
        header("location:out_ltem_list.php?user_id=$user_id");
    }
    
?>