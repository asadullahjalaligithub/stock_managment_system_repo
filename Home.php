<?php $title = "Home Page"?>

<?php include("db/dbconnection.php");?>
<?php include("admin/top.php");?>
<?php include("admin/header.php");?>
    <div class="container-fluid">
        <?php
            if(isset($_SESSION['delete_item'])){
                echo $_SESSION['delete_item'];
                 unset($_SESSION['delete_item']);
            }
            if(isset($_SESSION['update_item'])){
                echo $_SESSION['update_item'];
                 unset($_SESSION['update_item']);
            }
            
            if(isset($_SESSION['out_item'])){
                echo $_SESSION['out_item'];
                 unset($_SESSION['out_item']);
            }
        
            $id = $_GET['user_id'];
            $res = mysqli_query($con,"SELECT * FROM users WHERE id = $id");
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
            
        ?>
        <h1 class="fw-bold text-center border border-success w-50 m-auto shadow-lg p-3 mb-5 bg-body rounded"> List of Items</h1>
        <div class="row">
            <div class="col-4">
                
<form method="post">
        <div class="card">
            <div class="card-header">
                <p class="display-6 p-2">Add Item</p>
            </div>
            <div class="card-body ">
                <div class="form-floating mb-3">
                      <input type="text" class="form-control" required name="serial" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Serial#</label>
                </div>
                
                <div class="form-floating mb-3">
                      <input type="text" class="form-control" required name="name_item" id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Name Item</label>
                </div>
                
                <div class="form-floating">
                      <input type="Number" class="form-control" required name="qty" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Quantity</label>
                </div>
                <div class="form-floating">
                      <input type="Number" class="form-control" name="price" required id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Price</label>
                </div>
                
                 <div class="form-floating">
                      <input type="date" class="form-control" required name="date_item" id="floatingPassword" placeholder="Password">
                      <label for="floatingPassword">Date</label>
                </div>
                
                 <div class="form-floating">
                      <input type="text" class="form-control" value="<?php echo $name;?>" name="rec_user" required id="floatingPassword" placeholder="name@example.com">
                      <label for="floatingPassword">Recieve User</label>
                </div>
                <div>  
                    <input type="submit" value="Clear" name="clear" class="btn btn-info w-25 float-end m-2 ">
                    <input type="submit" value="Add" name="add" class="btn btn-success w-25 float-end mt-2">
                    
                </div>
            
            
            </div>
        </div>
    </form>
 </div>

<?php

    if(isset($_POST['add'])){
        $serial = $_POST['serial'];
        $name_item = $_POST['name_item'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];
        $date_item = $_POST['date_item'];
        $rec_item = $_POST['rec_user'];
        
        $sql = "INSERT INTO rec_item VALUES(null,'$serial','$name_item','$qty','$price','$date_item','$rec_item')";
        
        $res = mysqli_query($con,$sql);
        
        if($res){
            echo "<script>swal('Good Job!','Successfully Add Item','success');</script>";
        }else{
             echo "<script>swal('Alert!','Unsuccessfully Add Item!Please Try Again!','success');</script>";
          
        }
        
    }
     if(isset($_POST['clear'])){
            $_POST['serial'] = "";
            $_POST['name_item'] = "";
            $_POST['qty'] = "";
            $_POST['price'] = "";
            $_POST['date_item'] = "";
            $_POST['rec_user'] = "";
     }       
            
?>          
        <div class="col-8">
            
            <table class="table table-striped table-hover">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Serial#</th>
                      <th scope="col">Name Items</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Date Receive</th>
                      <th scope="col">User Receive</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php 
                     
                      $total = 0;
                      $res = mysqli_query($con,"SELECT * FROM rec_item");
                        while($row = mysqli_fetch_assoc($res)){
                                 $qty = $row['qty'];
                        ?>
                            <tr>
                              <th scope="row"><?php echo $row['serial']; ?></th>
                              <td><?php echo $row['name_item']; ?></td>
                              <td><?php echo $row['qty']; ?></td>
                              <td><?php echo $row['price']; ?></td>
                              <td><?php echo $row['date_item']; ?></td>
                              <td><?php echo $row['rec_user']; ?></td>
                            <td> <a href="update_item.php?item_id=<?php echo $row['id'];?>&user_id=<?php echo $id;?>" class="btn btn-info">Edit</a>
                                <a href="delete_item.php?item_id=<?php echo $row['id'];?>&user_id=<?php echo $id;?>" name='delete' class="btn btn-danger">Delete</a>
                                    <a href="submit_item.php?item_id=<?php echo $row['id'];?>&user_id=<?php echo $id;?>" class='btn btn-warning'>Out</a>
                                </td>
                        </tr>
                <?php  $total += $qty; } ?>                  
                  </tbody>
                </table>
            <label style="font-size:20px;font-weight:bold;">Total Items:</label>
            <label class="fw-bold ms-2 text-danger"><?php echo $total;?></label>
        </div>
    </div>
</div>
<?php include("admin/footer.php");?>
   