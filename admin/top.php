<?php    session_start();?>
<?php

            
            $id = $_GET['user_id'];
            $res = mysqli_query($con,"SELECT * FROM users WHERE id = $id");
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
?>
<?php 
    if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])){
        header("location:http://localhost:81/stock_management_system/login.php");
    }

?>
<!DOCTYPE  html>
<html>
<head>
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="sweetalert.js"></script>
</head>
<body>
