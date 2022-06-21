<?php include("db/dbconnection.php"); ?>
<?php $title = "Add User";?>  
<?php include("admin/top.php");?>  
<?php include("admin/header.php");?>

<div class="container">
<form method="post">
    <div class="row text-center">
        <div class="col-6" style="margin: 150px auto;">
                  <div class="card">
            <div class="card-header">
                <p class="display-6 p-2">Add User</p>
            </div>
            <div class="card-body ">
                <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="name" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Name</label>
                </div>
                
                <div class="form-floating mb-3">
                      <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Username</label>
                </div>
                
                <div class="form-floating">
                      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Password</label>
                </div>
                <div>
                    <a href="Home.php?user_id=<? echo $id;?>" class="btn btn-info w-25 float-end ms-2 mt-2 gx-5">Back</a>  
                    <input type="submit" value="Add" name="add" class="btn btn-success w-25 float-end mt-2">

                </div>
            
            
            </div>
        </div>
   
        </div>
    </div>
   </form>
</div>

<?php
    if(isset($_POST["add"])){
        $name = $_POST['name'];        
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO users SET 
                name = '$name',
                username = '$username',
                password = '$password'";
        if($name != "" and $username != "" and $password != ""){
            $res = mysqli_query($con,$sql);

            if($res){
                echo "<script>swal('Good Job!','Successfully Add User','success');</script>";
            }
            else{
                  echo "<script>swal('Warning','Not Successfully Add User','warning');</script>";    
           }
        }
        else{
            echo "<script>swal('Warning','Please Check Your Input','warning');</script>";
        }
        
        
    }
?>

<?php include("admin/footer.php");?>