<?php require_once("db/dbconnection.php");?>
<?php $title = "Submit Page";?>
<?php require_once("admin/top.php"); ?>
<?php require_once("admin/header.php");?>
<?php
  //  print_r($_POST);
        $id = $_GET['item_id'];
        $sql = "SELECT * FROM rec_item WHERE id = $id";
        $res = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($res);
        
        $user_id = $_GET['user_id'];
            $res1 = mysqli_query($con,"SELECT * FROM users WHERE id = $user_id");
            $row1 = mysqli_fetch_assoc($res1);
            $name = $row1['name'];
    //$url = "submit_item.php?item_id=$id&user_id=$user_id";
    ?>
<?php 
       if(isset($_POST['out'])){
           $serial =$_POST['serial'];
           $name_item = $_POST['name_item'];
           $qty = $_POST['qty'];
           $sub_by = $_POST['submitby'];
           $rec_by = $_POST['rec_by'];
           $date = $_POST['date_out'];
           $qtotal = $row['qty'];
           
           if($row['qty'] > 0 || $row['qty'] != 0){
                 $res1 = mysqli_query($con,"SELECT qty FROM rec_item WHERE id = $id");
                $row = mysqli_fetch_assoc($res1);
                $qty1 = $row['qty'];
                $total =  $qty1 - $qty;
                $sql1 = "Update rec_item SET qty = '$total' where id = $id";
                mysqli_query($con,$sql1);
            
               
               $sql = "INSERT INTO submit_item VALUES(null,$serial,'$name_item',$qty,'$sub_by','$rec_by','$date')";
               $res = mysqli_query($con,$sql);
             if($res){
                $_SESSION['out_item'] = "<script>swal('Warning',' Successfully Out Item','warning');</script>";    
               // echo  "<script>swal('God jobs!','Successfully Out Item','success');</script>";    
                     header("location:home.php?user_id=$user_id");
            }
            else{
                //  $_SESSION['out_item'] = "<script>swal('Warning','Not Successfully Out Item','warning');</script>";    
                  echo "<script>swal('Warning','Not Successfully Out Item','warning');</script>";    
                    //header("location:home.php?user_id=$user_id");
            }
        
           
               
       }else{
              echo "<script>swal('Warning','Item Not Exist','warning');</script>";   
                //header("location:Home.php?user_id=$user_id");
           }
       }
    ?>
<div class="container-fluid">



    <div class="row">
        <div class="col-6 m-auto p-3">
            <form method="post">
                <div class="card">
                    <div class="card-header">
                        <p class="display-6 p-2">Subimt Item</p>
                    </div>
                    <div class="card-body ">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="<?php echo $row['serial'];?>" required
                                name="serial" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Serial#</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" value="<?php echo $row['name_item'];?>" required
                                name="name_item" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Name Item</label>
                        </div>

                        <div class="form-floating">
                            <input type="Number" class="form-control"
                                value="<?php if(!isset($_POST['out'])){echo $row['qty'];}else{echo $total;}?>" required
                                name="qty" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Quantity</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" value="<?php echo $name;?>" name="submitby" required
                                id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Submit By</label>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control" name="rec_by" required id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Recieve By</label>
                        </div>

                        <div class="form-floating">
                            <input type="date" class="form-control" required name="date_out" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Date Out</label>
                        </div>
                        <div>
                            <input type="submit" value="Out Item" name="out"
                                class="btn btn-success w-25 float-end mt-2">
                            <a href="Home.php?user_id=<?php echo $user_id; ?>"
                                class="btn btn-info w-25 float-end mt-2 mx-2">Back</a>

                        </div>


                    </div>
                </div>
            </form>

        </div>
    </div>


</div>


<?php require_once("admin/footer.php");?>