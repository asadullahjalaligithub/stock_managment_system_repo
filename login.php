<?php
$con = mysqli_connect('localhost','root','root','stock_system');
if(!isset($_GET['logout'])){
session_start();
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='Stylesheet' href='bootstrap5/css/bootstrap.min.css'>
    <script type='text/javascript' src='sweetalert.js'></script>
    <title>Login Page</title>
    <style>
        *{
            padding: 0;
            margin:0;
            box-sizing: border-box;
        } 
        body{
            background-color: rgb(219,226,226);
        }
        .row{
            background:white;
            border-radius:30px;
            box-shadow:12px 12px 22px gray;
        }
        img{
            border-top-left-radius:30px;
            border-bottom-left-radius:30px;
        }
        .btn1{
            border:none;
            outline:none;
            height: 50px;
            width:100%;
            background-color:black;
            color:white;
            border-radius:4px;
            font-weight:bold;
        }
        .btn1:hover{ 
            background:white;
            border:1px solid;
            color:black;
        }
    </style>
</head>
<body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-5">
                    <img src="image/bg2.jpg" class='img-fluid' alt="">
                </div>
                <div class="col-7 px-5 pt-5">
                    <h1 class='font-weigth-bold py-3'>Stock Management System</h1>
                    <h4>Login Into System</h4>
                    <form method="post" autocomplete="off">
                        <div class="form-row">
                            <div class="col-7">
                                <input type="text" name="username" class='form-control my-3 p-4' placeholder='Username' id="">
                            </div>
                        </div>

                        
                        <div class="form-row">
                            <div class="col-7">
                                <input type="password" name="password" class='form-control my-3 p-4' placeholder='Password' id="">
                            </div>
                        </div>

                        
                        <div class="form-row">
                            <div class="col-7">
                                <button type='submit' name='submit' class='btn1'>Login</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
    if(isset($_POST['submit'])){
        $name = $_POST['username'];
        $pass = md5($_POST['password']);

          

        $sql = "SELECT * FROM users WHERE username = '$name' AND password = '$pass'";
        $res = mysqli_query($con,$sql);
        $count = mysqli_num_rows($res);
        
        if($count == 1){
            $res1 = mysqli_query($con,"SELECT * FROM users");
            $row = mysqli_fetch_assoc($res1);
            $user_id = $row['id'];
          
            $_SESSION['user'] = $row['username'];
            $_SESSION['pass'] = $row['password'];
        
      
            header("location:home.php?user_id=$user_id");
        }
        else{
            echo "<script>swal('Please Try Agin!', 'Username Or Password Is Incorrect!', 'warning');</script>";
        }
    }
    
    
    
?>

    <script type='text/javascript' src='bootstrap5/js/bootstrap.bundle.js'></script>
</body>
</html>