<?php
 session_start();

 if(!isset( $_SESSION['username'])){
  echo "You are logged out";
    header('location:admin-login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include 'gcss/links.php' ?>
    <link rel="stylesheet" type="text/css" href="gcss/style.css">
</head>
<body class="container-fluid" >
    <?php  include 'dbcon.php'; ?>
    <?php  include 'back.php'; ?>
    
   <div class="container-fluid ">
       <div class="row p-2 shadow border rounded admin">
            <div class="col-sm-3 bg-primary rounded">
            <i class="fa text-white fa-user fa-5x d-flex justify-content-center mt-5"></i>
            <h5 class="d-flex justify-content-center text-white"> <?php echo $_SESSION['username']; ?></h5>

            <div class="border-top ">
                <ul class="admin-nav">
                    <li><a href="#"><i class="fa fa-solid fa-user"></i> Profile</a></li>
                    <li><a href="new admin register.php"><i class="fa fa-address-book-o" aria-hidden="true"></i> Add Admin</a></li>
                    <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
            </div>
            <div class="col-sm-9 bg-light  rounded"> 
           <nav class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin-dashboard.php">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
       <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add College
</button>

<!-- The Modal -->
<div class="modal " id="staticBackdrop" data-bs-backdrop="static">
  <div class="modal-dialog p-5">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header text-danger">
        <h4 class="modal-title text-danger text-center">Register New College</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body m-auto text-center ">
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST" class="college-form form">
        <input type="text" placeholder="College Name" name="collegename"class="input-col" required><br><br>
        <input type="text" placeholder="College Code" name="collegecode"class="input-col"  required ><br><br>
        <input type="email" placeholder="E-mail id" name="collegeemail" class="input-col"required ><br><br>
        <input type="tel" placeholder="Contact" name="collegenumber" class="input-col"required maxlength="10"><br><br>
        <input type="password" placeholder="Create New Password" class="input-col" name="collegepassword" required><br><br>
        <input type="password" placeholder="Confirm Password" class="input-col" name="ccpassword" required><br><br>

        <input type="text" placeholder="Branch 1" name="branch1" class="input-col"required ><br><br>
        <input type="text" placeholder="Branch 2" name="branch2" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 3" name="branch3" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 4" name="branch4" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 5" name="branch5" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 6" name="branch6" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 7" name="branch7" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 8" name="branch8" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 9" name="branch9" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 10" name="branch10" class="input-col" ><br><br>
        <button type="submit" name="csubmit" class="btn btn-success">Register</button>
        </form>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>
      </ul>
      
      <!-- <form class="d-flex" action="" method="GET">
       
      <input class="form-control " type="text"name="search" value="" placeholder="Search">';
          
       
      <button class="btn btn-primary" type="submit" id="search">Search</button>
      
      </form> -->
    </div>
  </div>
</nav>

<div class="form-data">

            <table class="table table-bordered text-center table-responsive">
                <thead class="bg-dark text-white">
                   <tr>
                    <th>ID</th>
                    <th>COLLEGE</th>
                    <th>CODE</th>
                    <th>EMAIL</th>
                    <th>MOBILE </th>
                    <th colspan="2">OPERATIONS </th>
                   </tr>
                </thead>
                <tbody>
                <?php 
 $selquery = "SELECT * FROM `college-list` " ;
       
                     $query2 = mysqli_query($con, $selquery);

                     $nums = mysqli_num_rows($query2);
                     while( $res = mysqli_fetch_array($query2)){
                              ?>
  <tr>
                    <td><?php   echo $res['id'] ?></td>
                    <td><?php   echo $res['collegename'] ?></td>
                    <td><?php   echo $res['collegecode'] ?></td>
                    <td><?php   echo $res['collegeemail'] ?></td>
                    <td><?php   echo $res['collegenumber'] ?></td>

                    <td><a href="updates.php?id=<?php echo $res['id'] ?>"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update">
                     
                      <i class="fas fa-edit text-success"></i></a></td>

                    <td><a href="coldelete.php?id=<?php echo $res['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                      <i class="fas fa-trash text-danger"></i></a></td>
                   </tr>
                  <?php   }
                     ?>
                </tbody>
            </table>

</div>
                </div>
            </div>
       </div>

   </div>
   <script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

 
</script>
</body>
</html>