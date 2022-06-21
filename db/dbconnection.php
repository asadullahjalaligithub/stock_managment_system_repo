<?php

    define("LOCALHOST","localhost");
    define("DB_USERNAME","root");    
    define("PASSWORD","root");
    define("DB_NAME","stock_system");

    $con = mysqli_connect(LOCALHOST, DB_USERNAME,PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($con, DB_NAME) or die(mysqli_error());
?>