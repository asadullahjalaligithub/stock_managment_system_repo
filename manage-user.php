<?php include("db/dbconnection.php"); ?>
<?php include("admin/top.php");?>
<?php include("admin/header.php")?>
<div class="container">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Setting
                </div>
                <div class="card-body">
                    <form>
                    <p class="display-6 border-bottom border-muted pb-3 ">Change Username</p>
                    
                    <div class="text-center">
                        <lable class="fw-bold">Username:</lable>
                        <input type="text" class="w-75" value="<?php echo $result['username']; ?>"><br><br>
                 
                    </div>
                        <input type="submit" value="Save Changes" class="btn btn-success w-25 btnsave" style="margin-left:197px;">
                        <br><br>
                        <p class="display-6 border-bottom border-muted pb-3 ">Change Password</p>
                         
                        <div class="text-center">
                        <lable class="fw-bold">Current Password </lable>
                        <input type="text" class="w-75"><br><br>
                        
                        <lable class="fw-bold">New Password </lable>
                        <input type="text" class="w-75 ms-4"><br><br>
                            
                        <lable class="fw-bold">Confirm Password </lable>
                        <input type="text" class="w-75"><br><br>
                    </div>
                         <input type="submit" value="Save Changes" class="btn btn-info w-25 btnsave" style="margin-left:226px;">
                        <br><br>
                    </form>
                </div>
                
            </div>
        </div>
    
    </div>
    
    
</div>    
<?php include("admin/footer.php");?>