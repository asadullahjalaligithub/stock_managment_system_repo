<?php
require_once("db/dbconnection.php");
$title = "Update Page";
$id_item = $_GET['item_id'];
require_once("admin/top.php");
?>
<?php
    $res = mysqli_query($con,"SELECT * FROM submit_item WHERE id = $id_item");
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
                      <input type="text" class="form-control" value="<?php echo $row['submit_by']?>" name="sb" required id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Submit By</label>
                </div>
                
                 <div class="form-floating">
                      <input type="text" class="form-control" value="<?php echo $row['recieve_by']?>" required name="rb" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Recieve By</label>
                </div>
                
                 <div class="form-floating">
                      <input type="date" class="form-control" value="<?php echo $row['date_out']?>" name="date" required id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Date Out</label>
                </div>
                <div>
                    <a href="out_item_list.php?user_id=<?php echo $id;?>" class="btn btn-info w-25 float-end ms-2 mt-2 gx-5">Back</a>  
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
                        $submitby = $_POST['sb'];
                        $recieveby = $_POST['rb'];
                        $date = $_POST['date'];
                    
                        $sql = "UPDATE submit_item SET serial='$serial',
                        name_item='$name_item',
                        qty='$qty',
                        submit_by='$submitby',    
                        recieve_by ='$recieveby',
                        date_out='$date' WHERE id = $id_item";
                    
                    $res = mysqli_query($con,$sql);
                    if($res){
                    $_SESSION['update_item_out'] = "<script>swal('Good Job!','Successfully Update Item','success');</script>";
                        header("location:out_item_list.php?user_id=$id");
                    }else{
                    $_SESSION['update_item_out'] = "<script>swal('Warning!','Unsuccessfully Update Item','warning');</script>";
                        header("location:out_item_list.php?user_id=$id");
                    }
                    
                }
    
            ?>
            
        </div>
    </div>
        


<?php require_once("admin/footer.php");?>

