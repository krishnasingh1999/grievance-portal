<?php
 session_start();

 if(!isset( $_SESSION['collegename'])){
  echo "You are logged out";
    header('location:college-login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College dashboard</title>
    <?php include 'gcss/links.php' ?>
    <link rel="stylesheet" type="text/css" href="gcss/style.css">

  
</head>
<body>
<?php
          
          include 'dbcon.php';
         
?>
   <div class="container-fluid ">
      <div class="row bg-primary ">
         <div class="col-sm-11 bg-primary m-auto">
         <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item ">
          <a class="nav-link text-light active" aria-current="page" href="college-dashboard.php?qsearch=<?php echo $_SESSION['collegecode']; ?>">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light active" aria-current="page" href="student-list.php?search=<?php echo $_SESSION['collegecode']; ?>">Students List</a>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link text-light" href="#">Link</a> -->
        </li>
        
        
      </ul>
     
      <ul class="navbar-nav d-flex " role="search">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         <?php echo $_SESSION['collegecode']; 
           echo "-";
         echo $_SESSION['collegename']; ?>
          </a>
          <ul class="dropdown-menu">
            <li class="text-center "><a href="col-logout.php" class="text-black p-0"><i class="fa fa-sign-out"></i> Logout</a></li>
            
          </ul>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row m-1">
        <div class="col-sm-12 card w-100 p-1 shadow-lg ">
          <table class="table table-borderless table-responsive col-t">
            <tr class="">
            <td>
                <h5>College Code</h5>
                <p class=" "><?php echo $_SESSION['collegecode']; ?></p>
              </td>
              <td>
                <h5 class="">E-mail</h5>
                <p class=" "><?php echo $_SESSION['collegeemail']; ?></p>
              </td>
              <td>
                <h5>Number</h5>
                <p class=" "><?php echo $_SESSION['collegenumber']; ?></p>
              </td>

              
            </tr>
          
         
             

          
          </table>


        <!-- Button trigger modal -->



        </div>
      
      </div>



   <form class="d-flex m-3 " action="" method="GET"  >
       
       <input class="form-control " type="text"name="qsearch" value="<?php echo $_SESSION['collegecode']; ?>" hidden readonly placeholder="Search" >
      <button class="btn btn-primary d-flex w-25  m-auto " type="submit" id="qsearch" ><p class="m-auto">Query List</p></button>
       
       </form>
    
<div class="form-data">

<table class="table table-bordered text-center  shadow-lg rounded-top table-responsive">
    <thead class="bg-dark text-white rounded-top">
       <tr>
        <th>ID</th> 
        <th>CODE</th>
        <th>NAME</th>
        <th>ROLL NUMBER</th>
        <th>MOBILE</th>
        <th>QUERY</th>
        <th>Date</th>
        <th>Status</th>
        <th >UPDATE</th>
       </tr>
    </thead>
    <tbody>
    <?php 
//Search bar start
if(isset($_GET['qsearch']))
{
  $filtervalues = $_GET['qsearch'];
  $filterquery = "SELECT * FROM `query-st` WHERE collegecode='$filtervalues' " ;
  $filtersearch = mysqli_query($con, $filterquery);

  if(mysqli_num_rows($filtersearch) > 0)
  {
        foreach($filtersearch as $res)
        {
         
                   ?>
         
                   
            
         <tr id="">
<td><?php   echo $res['id'] ?></td>
<td ><?php   echo $res['collegecode'] ?></td> 
<td><?php   echo $res['stname'] ?></td>
<td><?php   echo $res['rollnumber'] ?></td>
<td><?php   echo $res['stmobile'] ?></td>
<td><?php   echo $res['queryask'] ?></td>
<td><?php   echo $res['date'] ?></td>
<td><?php   echo $res['stquery'] ?></td>


<td><a href="queryupdate.php?id=<?php echo $res['id'] ?>"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update">

<i class="fas fa-edit text-success"></i></a></td>

</tr>
            <?php
         
        
  }}
  else{
    ?>
        <tr>
          <td colspan="4"> Record Not Found</td>
        </tr>
    <?php
  }
}
// search bar end
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
</script>

     <!-- <a href="col-logout.php" class="text-black"><i class="fa fa-sign-out"></i> Logout</a> -->



<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update College Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
        <div class="row g-3 align-items-center" hidden>
  <div class="col-auto">
    <label for="collegecode" class="col-form-label">College Code</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-1" name="branch-1" class="form-control" value="<?php echo $_SESSION['collegecode']; ?>" required>
  </div>
 </div>
          
          <div class="row g-3 align-items-center mt-1">
  <div class="col-auto">
    <label for="branch-1" class="col-form-label">Branch 1</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-1" name="branch-1" class="form-control" aria-describedby="" required>
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-2" class="col-form-label">Branch 2</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-2" name="branch-2" class="form-control" aria-describedby="">
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-3" class="col-form-label">Branch 3</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-3" name="branch-3" class="form-control" aria-describedby="">
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-4" class="col-form-label">Branch 4</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-4" name="branch-4" class="form-control" aria-describedby="">
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-5" class="col-form-label">Branch 5</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-5" name="branch-5" class="form-control" aria-describedby="">
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-6" class="col-form-label">Branch 6</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-6" name="branch-6" class="form-control" aria-describedby="">
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-7" class="col-form-label">Branch 7</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-7" name="branch-7" class="form-control" aria-describedby="">
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-8" class="col-form-label">Branch 8</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-8" name="branch-8" class="form-control" aria-describedby="">
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-9" class="col-form-label">Branch 9</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-9" name="branch-9" class="form-control" aria-describedby="">
  </div>
 </div>
 <div class="row g-3 align-items-center  mt-1">
  <div class="col-auto">
    <label for="branch-10" class="col-form-label">Branch 10</label>
  </div>
  <div class="col-auto">
    <input type="text" id="branch-10" name="branch-10" class="form-control" aria-describedby="">
  </div>
 </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="b-submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>

  <!-- <?php
          
          include 'dbcon.php';

         if(isset($_POST['b-submit'])){
           
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
            
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

            $emailquery = "SELECT * FROM `admin-reg` where email='$email'";
            $query = mysqli_query($con, $emailquery);

            $emailcount = mysqli_num_rows($query);

            if( $emailcount>0){

                echo "Email already exist";
            }else{
                if($password === $cpassword){

                    $insertquery = "INSERT INTO `admin-reg` ( `username`, `mobile`, `email`, `password`, `cpassword`) 
                    values('$username','$mobile','$email', '$pass', '$cpass')";

                    $iquery = mysqli_query($con, $insertquery);

                    if($iquery){
                        ?>
                            <script>
                                alert("inserted Successfully");
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                        alert("not saved");
                    </script>
                    <?php
                    }
                
                }

                else{
                    ?>
                        <script>
                        alert("password is not matching");
                    </script>
                    <?php
                }
            }

         }

         

    ?> -->

</div> -->
</body>
</html>