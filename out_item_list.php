<?php $title = "Out Item Page";?>

<?php 
require_once ('db/dbconnection.php');
require_once("admin/top.php");?>
<?php require_once("admin/header.php");?>
<div class="container">
    <div class="row">
        <?php
            if(isset($_SESSION['delete_item_out'])){
                echo $_SESSION['delete_item_out'];
                unset( $_SESSION['delete_item_out']);
            }
            if(isset($_SESSION['update_item_out'])){
                echo $_SESSION['update_item_out'];
                unset( $_SESSION['update_item_out']);
            }
        
        
        ?>
        
        
        <div class="col py-5">
            <h2     class="fw-bold text-center border border-success w-50 m-auto shadow-lg p-3 mb-5 bg-body rounded">List Of Out Item </h2>
            <table class="table table-striped table-hover">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Serial#</th>
                      <th scope="col">Name Items</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Submit By</th>
                      <th scope="col">Receive By</th>
                      <th scope="col">Date Out</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php 
                     
                      $total = 0;
                      $res = mysqli_query($con,"SELECT * FROM submit_item");
                        while($row = mysqli_fetch_assoc($res)){
                                 $qty = $row['qty'];
                        ?>
                            <tr>
                              <th scope="row"><?php echo $row['serial']; ?></th>
                              <td><?php echo $row['name_item']; ?></td>
                              <td><?php echo $row['qty']; ?></td>
                              <td><?php echo $row['submit_by']; ?></td>
                              <td><?php echo $row['recieve_by']; ?></td>
                              <td><?php echo $row['date_out']; ?></td>
                            <td> <a href="update_item_out.php?item_id=<?php echo $row['id'];?>&user_id=<?php echo $id;?>" class="btn btn-info">Edit</a>
                                <a href="delete_item_out.php?item_id=<?php echo $row['id'];?>&user_id=<?php echo $id;?>" name='delete' class="btn btn-danger">Delete</a>
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



<?php require_once("admin/footer.php");?>