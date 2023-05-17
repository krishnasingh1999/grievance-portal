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
          <a class="nav-link text-light active" aria-current="page" href="college-dashboard.php?qsearch=<?php echo $_SESSION['collegecode']; ?>">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light active" aria-current="page" id="stlist" href="student-list.php?search=<?php echo $_SESSION['collegecode']; ?>">Students List</a>
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
<br>
   <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12 ">
               <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  New Student
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header ">
        <h1 class="modal-title fs-5 text-primary" id="staticBackdropLabel">Register New Student </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST" class="form">
          <div class="row">
                     <div class="col-4">
                        <label>College Code</label>                 
                        <input type="text" class="form-control w-50"   name="collegecode"
                        value="<?php echo $_SESSION['collegecode']; ?>"  readonly>
                       </div>
                       <div class="col-8">
                        <label>College Name</label>
                         <input type="text" class="form-control w-100"   name="collegename"
                         value="<?php echo $_SESSION['collegename']; ?>" readonly>
                       </div>
                     </div><br>
                 <div class="row">
                 <div class="col">
                        <label>Degree</label>                 
                        <input type="text" class="form-control" placeholder="e.g. B.tech"  name="degree" required>
                       </div>
                     <div class="col">
                        <label>Branch</label>                 
                        <input type="text" class="form-control" placeholder="e.g. Computer Science & Engg."
                          name="branch" required>
                    </div>
                       <div class="col">
                      
                         <label>Year</label> 
                         
                         <select class="form-select" name="year" required> 
                                <option selected>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                        </select> 
                       </div>
                     </div><br>
                 <div class="row">
                     <div class="col">
                        <label>Student Name</label>                 
                        <input type="text" class="form-control"   name="stname" required>
                       </div>
                       <div class="col">
                        <label>Roll Number</label>
                         <input type="text" class="form-control"   name="rollnumber" required>
                       </div>
                     </div><br>
                     <div class="row">
                     <div class="col">
                        <label>Father's Name</label>                 
                        <input type="text" class="form-control"   name="fname" required>
                       </div>
                       <div class="col">
                        <label>Date Of Birth</label>
                         <input type="date" class="form-control"  name="dob" required>
                       </div>
                     </div><br>
                     <div class="row">
                     <div class="col">
                        <label>Mobile Number</label>                 
                        <input type="tel" class="form-control"   name="stmobile" required maxlength="10">
                       </div>
                       <div class="col">
                        <label>E-mail id</label>
                         <input type="email" class="form-control"  name="stemail" required>
                       </div>
                     </div>
                     <br>
                     <div class="row">
                     <div class="col">
                        <label class="required">Password</label>                 
                        <input type="password" class="form-control "   name="stpassword" required>
                       </div>
                       <div class="col">
                        <label>Confirm Password</label>
                         <input type="password" class="form-control required input-st"  name="stcpassword" required>
                       </div>
                     </div>
                
           <br>
      
      <div class="text-center pb-3">
      
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" name="stsubmit" data-bs-target="#stlist" class="btn btn-primary" >Submit</button>
        
      </div>
          </form>
      </div>
    </div>
  </div>
</div>
        </div>
     </div>
   </div>
    

   <div class="form-data">
   <form class="d-flex " action="" method="GET"  >
       
       <input class="form-control " type="text"name="search" value="<?php echo $_SESSION['collegecode']; ?>" readonly placeholder="Search" hidden>
      <button class="btn btn-primary d-flex w-50  m-auto " type="submit" id="search" ><p class="m-auto">Show Students List</p></button>
       
       </form>
<div class="container-fluid">
   <div class="row">
    <div class="col-sm-12 ">

  
<table class="table table-bordered text-center table-responsive " id="table-data"  >
    <thead class="bg-dark text-white st-header">
       <tr>
        <!-- <th>ID</th>-->
        <th >CODE</th>  
        <th>DEGREE</th>
        <th>BRANCH</th>
        <th>YEAR</th>
        <th>NAME</th>
        <th>Roll Number</th>
        <th>Father's Name</th>
        <th>D.O.B.</th>
        <th>Mobile</th>
        <th>E-mail</th>
        <th colspan="2">OPERATIONS </th>
       </tr>
    </thead>
    <tbody>
   
    <?php 

            
                   //Search bar start
                   if(isset($_GET['search']))
                   {
                    
  
                     $filtervalues = $_GET['search'];
                     $filterquery = "SELECT * FROM `student-list` WHERE collegecode='$filtervalues'" ;
                     $filtersearch = mysqli_query($con, $filterquery);

                     if(mysqli_num_rows($filtersearch) > 0)
                     {
                        
                     
                           foreach($filtersearch as $res)
                           {
                            
                                      ?>
                            
                                      
                               
                            <tr id="stTable">
        <!-- <td><?php   echo $res['id'] ?></td>-->
        <td ><?php   echo $res['collegecode'] ?></td> 
        <td><?php   echo $res['degree'] ?></td>
        <td><?php   echo $res['branch'] ?></td>
        <td><?php   echo $res['year'] ?></td>
        <td><?php   echo $res['stname'] ?></td>
        <td><?php   echo $res['rollnumber'] ?></td>
        <td><?php   echo $res['fname'] ?></td>
        <td><?php   echo $res['dob'] ?></td>
        <td><?php   echo $res['stmobile'] ?></td>
        <td><?php   echo $res['stemail'] ?></td>

               <td><a href="stupdates.php?id=<?php echo $res['id'] ?>"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update">
                
                 <i class="fas fa-edit text-success"></i></a></td>

               <td><a href="stdelete.php?id=<?php echo $res['id'] ?>"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                 <i class="fas fa-trash text-danger"></i></a></td>
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


    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    };

</script>
</body>
</html>