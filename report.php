<?php $title = "Report Page";?>
<?php include("admin/top.php");?>
<?php include("db/dbconnection.php");?>
<?php include("admin/header.php");?>


<div class="container">
    
    <div class="card">
        <div class="card-header">
            <p class="display-6 p-3">Report</p>
        </div>
        
        <div class="card-bdoy text-center">
           <form method="post"> <label class="fw-bold display-6 mt-3 mb-4">Choose Date</label><br>
            <label>Start Date:</label>
            <input type="date" name="sdate" class="p-3"> <span class="ms-5 me-5" style="font-size:30px;">  |  </span> 
            <label>End Date:</label>
            <input class="p-3" name="edate" type="date">
            <input type="submit" name="search" value="Search" class="btn btn-primary ms-3 p-3">
            </form>
            <br><br>
            
         <div class="p-2">
              
             <table class="table table-striped table-hover">
                  <thead class="table-dark">
                     <tr>
                      <th scope="col">#</th>
                      <th scope="col">Serial#</th>
                      <th scope="col">Name Items</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Date Receive</th>
                      <th scope="col">User Receive</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php
                      $total = 0;
                    if(isset($_POST['search'])){
                       $start = $_POST['sdate'];
                       $end = $_POST['edate'];
                        $sql = "select * from rec_item where date_item between  '$start' and '$end'";
                       $res = mysqli_query($con,$sql);
                        $id = 1;
                        ?>
                        <label class="mx-3 text-danger" style="margin-bottom:20px;"><?php echo $start;?></label>
                        <label class="fw-bold" style="font-size:25px;">|</label>
                        <label class="mx-3 text-danger" style="margin-bottom:20px;"><?php echo $end;?></label>
                      
                      <?php
                        while($row = mysqli_fetch_assoc($res)){?>
                          <tr>
                              <th scope="row"><?php echo $id++; ?></th>
                              <th scope="row"><?php echo $row['serial']; ?></th>
                              <td><?php echo $row['name_item']; ?></td>
                              <td><?php echo $row['qty']; ?></td>
                              <td><?php echo $row['price']; ?></td>
                              <td><?php echo $row['date_item']; ?></td>
                              <td><?php echo $row['rec_user']; ?></td>
                            </tr>
                            
                     <?php $total += $row['qty'];  }
                      
                    }
             
                ?>
                  </tbody>
                </table>
             <label style="font-size:20px;font-weight:bold;">Total Items:</label>
            <label class="fw-bold ms-2 text-danger"><?php  echo $total;?></label>
        </div>
   
            <input type = "button" value="Print" id="print" class="btn btn-info m-2" onclick="print();"> 
        </div>
    
    </div>
    
</div>
<script type="text/javascript">
    fucntion print(){
        window.print();
    }
</script>


<?php include("admin/footer.php");?>