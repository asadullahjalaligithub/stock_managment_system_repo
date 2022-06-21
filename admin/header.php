<?php

            $id = $_GET['user_id'];
            $res = mysqli_query($con,"SELECT * FROM users WHERE id = $id");
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <span class="navbar-brand border-end p-2">Stock Management System</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php?user_id=<?php echo $id;?>">Home</a>
        </li>
        
          <li class="nav-item">
          <a class="nav-link" href="add-user.php?user_id=<?php echo $id;?>">Add User</a>
        </li>
            
          <li class="nav-item">
          <a class="nav-link" href="report.php?user_id=<?php echo $id;?>" tabindex="-1" aria-disabled="true">Report</a>
        </li>
          
          <li class="nav-item">
          <a class="nav-link" href="out_item_list.php?user_id=<?php echo $id;?>" tabindex="-1" aria-disabled="true">Out Item</a>
        </li> 
        
          <li class="nav-item">
          <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">About Us</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="login.php?logout=true"  class="btn btn-light fw-bold">LogOut</a>
      </form>
    </div>
  </div>
</nav>