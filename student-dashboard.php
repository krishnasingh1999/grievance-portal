<?php
 session_start();

 if(!isset( $_SESSION['stname'])){
  echo "You are logged out";
    header('location:student-login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT dashboard</title>
    <?php include 'gcss/links.php' ?>
    <link rel="stylesheet" type="text/css" href="gcss/style.css">
  <style>
    h6 {
      color: red;
    }
    option.line1{
      color: red;
    }
     option.line1{
      color: red;
    }
  </style>
</head>
<body>
<?php
          
          include 'dbcon.php';
          include 'back.php';
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
          <a class="nav-link text-light active" aria-current="page" href="student-dashboard.php">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light active" aria-current="page" href="#"></a>
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
            <li class="text-center "><a href="st-logout.php" class="text-black p-0"><i class="fa fa-sign-out"></i> Logout</a></li>
            
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
      <div class="row m-3">
        <div class="col-sm-12 card w-100 p-2 shadow-lg ">
          <table class="table table-borderless table-responsive">
            <tr class="">
              <td>
                <h6>Student Name</h6>
                <p class=" "><?php echo $_SESSION['stname']; ?></p>
              </td>
              <td>
                <h6>Roll Number</h6>
                <p class=" "><?php echo $_SESSION['rollnumber']; ?></p>
              </td>
              <td>
                <h6>Father,s Name</h6>
                <p class=" "><?php echo $_SESSION['fname']; ?></p>
              </td>
              <td></td>
            </tr>
            <tr>
            <td>
                <h6> Date of Birth</h6>
                <p class=" "><?php echo $_SESSION['dob']; ?></p>
              </td>
              <td>
               <h6> Degree</h6>
                <p class=" "><?php echo $_SESSION['degree']; ?></p>
              </td>
              <td>
               <h6>Branch</h6>
                <p class=""><?php echo $_SESSION['branch']; ?></p>
              </td>
              <td>
               
            </tr>
            <tr>
          
             <td>
             <h6>Year</h6>
                <p class=" "><?php echo $_SESSION['year']; ?></p>
              
             </td>
              <td>
                <h6 >Mobile Number</h6>
                <p class=" "><?php echo $_SESSION['stmobile']; ?></p>
              </td>
              <td>
                <h6>E-mail Id</h6>
                <p class=" "><?php echo $_SESSION['stemail']; ?></p>
              </td>

            </tr>
          </table>
        </div>
      </div>
      <div class="row mt-4">


      <?php
          
          include 'dbcon.php';

        
          if(isset($_POST['qsubmit'])){
           
            $collegecode = mysqli_real_escape_string($con, $_POST['collegecode']);
            $stname = mysqli_real_escape_string($con, $_POST['stname']);
            $rollnumber = mysqli_real_escape_string($con, $_POST['rollnumber']);
            $stmobile = mysqli_real_escape_string($con, $_POST['stmobile']);
            $queryask = mysqli_real_escape_string($con, $_POST['queryask']);
            $stquery = mysqli_real_escape_string($con, $_POST['stquery']);
            
           

           

                    $insertquery = "INSERT INTO `query-st`(`id`, `collegecode`, `stname`, `rollnumber`, `stmobile`, `queryask`, `stquery`)
                     VALUES (null,'$collegecode','$stname','$rollnumber','$stmobile','$queryask','$stquery')";

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


         

    ?>


        <!-- Button to Open the Modal -->
        <form class="d-flex m-3 " action="" method="GET"  >
<button type="button" class="btn btn-primary col-4 m-auto" data-bs-toggle="modal" data-bs-target="#myModal">
Ask Your Query
</button>
<button class="btn btn-primary d-flex w-25  m-auto " type="submit" id="qsearch" ><p class="m-auto">Query List</p></button>

       
       <input class="form-control " type="text"name="qsearch" value="<?php echo $_SESSION['rollnumber']; ?>"  hidden readonly placeholder="Search" >
     
       
       </form>
    
<div class="form-data">

<table class="table table-bordered text-center table-responsive">
    <thead class="bg-dark text-white">
       <tr>
       
     
        <!-- <th>ROLL NUMBER</th> -->
        
        <th>QUERY</th>
        <th>Date</th>
        <th>Status</th>
      
       </tr>
    </thead>
    <tbody>
    <?php 
//Search bar start
if(isset($_GET['qsearch']))
{
  $filtervalues = $_GET['qsearch'];
  $filterquery = "SELECT * FROM `query-st` WHERE rollnumber='$filtervalues' " ;
  $filtersearch = mysqli_query($con, $filterquery);

  if(mysqli_num_rows($filtersearch) > 0)
  {
        foreach($filtersearch as $res)
        {
         
                   ?>
         
                   
            
         <tr id="">
<!-- <td><?php   echo $res['id'] ?></td> -->
<!-- <td ><?php   echo $res['collegecode'] ?></td>  -->
<!-- <td><?php   echo $res['stname'] ?></td> -->
<!-- <td><?php   echo $res['rollnumber'] ?></td> -->
<!-- <td><?php   echo $res['stmobile'] ?></td> -->
<td><?php   echo $res['queryask'] ?></td>
<td><?php   echo $res['date'] ?></td>
<td><?php   echo $res['stquery'] ?></td>




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



<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-uppercase text-danger">Ask You Query</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST" class="form">
       <label for="collegecode" class="form-label">Collegecode</label>
    <input type="text" class="form-control" name="collegecode" value="<?php echo $_SESSION['collegecode']?>" readonly>

    <label for="stname" class="form-label">stname</label>
    <input type="text" class="form-control" name="stname" value="<?php echo $_SESSION['stname']?>" readonly>

    <label for="rollnumber" class="form-label">Rollnumber</label>
    <input type="text" class="form-control" name="rollnumber" value="<?php echo $_SESSION['rollnumber']?>" readonly>
    
    <label for="stmobile" class="form-label">Mobile</label>
    <input type="tel" class="form-control" name="stmobile" required maxlength="10" >

    <label for="queryask" class="form-label">ASk Your Query</label>
    <textarea type="text" class="form-control" name="queryask" required> </textarea>

    <label for="stquery" class="form-label" hidden>Query Status</label>
    <select name="stquery" id="stquery" class="form-select" hidden>
        <option >Unsolved</option>
        <option >Solved</option>
    </select>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary shadow-lg" data-bs-dismiss="modal">Close</button>
        
        <button type="submit" name="qsubmit"  class="btn btn-primary shadow-lg" >Submit</button>
      </div>
              </form>
    </div>
  </div>
</div>
      </div>
    </div>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>