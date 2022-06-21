<?php
require_once("db/dbconnection.php");
$title = "Update Page";
$id_item = $_GET['item_id'];
require_once("admin/top.php");
?>
<?php
    $res = mysqli_query($con,"SELECT * FROM rec_item WHERE id = $id_item");
    if($res){
        $count = mysqli_num_rows($res);
        if($count == 1){
            $row = mysqli_fetch_assoc($res);
        }
    }

?>
    <div class="row">
        <div class="col-6" style="margin: 50px auto;">
            <form method="post">
            <div class="card">
            <div class="card-header">
                <p class="display-6 p-2">Edit Item</p>
            </div>
            <div class="card-body ">
                <div class="form-floating mb-3">
                      <input type="text" class="form-control" required value="<?php echo $row['serial']?>" name="serial" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Serial#</label>
                </div>
                
                <div class="form-floating mb-3">
                      <input type="text" class="form-control" value="<?php echo $row['name_item']?>" required name="name_item" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Name Item</label>
                </div>
                
                <div class="form-floating">
                      <input type="Number" class="form-control" value="<?php echo $row['qty']?>" required name="qty" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Quantity</label>
                </div>
                <div class="form-floating">
                      <input type="Number" class="form-control" value="<?php echo $row['price']?>" name="price" required id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Price</label>
                </div>
                
                 <div class="form-floating">
                      <input type="date" class="form-control" value="<?php echo $row['date_item']?>" required name="date_item" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Date</label>
                </div>
                
                 <div class="form-floating">
                      <input type="text" class="form-control" value="<?php echo $row['rec_user']?>" name="rec_user" required id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Recieve User</label>
                </div>
                <div>
                    <a href="Home.php" class="btn btn-info w-25 float-end ms-2 mt-2 gx-5">Back</a>  
                    <input type="submit" value="Update" name="update" class="btn btn-success w-25 float-end mt-2">

                </div>
            
            
            </div>
        </div>
    </form>
            <?php
                if(isset($_POST['update'])){
                        $serial = $_POST['serial'];
                        $name_item = $_POST['name_item'];
                        $qty = $_POST['qty'];
                        $price = $_POST['price'];
                        $date_item = $_POST['date_item'];
                        $rec_user = $_POST['rec_user'];
                    
                        $sql = "UPDATE rec_item SET serial='$serial',
                        name_item='$name_item',
                        qty='$qty',
                        price='$price',    
                        date_item ='$date_item',
                        rec_user='$rec_user' WHERE id = $id_item";
                    
                    $res = mysqli_query($con,$sql);
                    if($res){
                    $_SESSION['update_item'] = "<script>swal('Good Job!','Successfully Update Item','success');</script>";
                        header("location:home.php?user_id=$id");
                    }else{
                    $_SESSION['update_item'] = "<script>swal('Warning!','Unsuccessfully Update Item','warning');</script>";
                        header("location:home.php?user_id=$id");
                    }
                    
                }
    
            ?>
            
        </div>
    </div>
        


<?php require_once("admin/footer.php");?>

