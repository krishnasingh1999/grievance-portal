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
          <a class="nav-link text-light active" aria-current="page" href="college-dashboard.php">Home</a>
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
<br>
   <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12 ">
               <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  New Student
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header ">
        <h1 class="modal-title fs-5 text-primary" id="staticBackdropLabel">Register New Student </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body "> -->
          <!-- <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST" class="form">
          <div class="row">
                     <div class="col-4">
                        <label>College Code</label>                 
                        <input type="text" class="form-control w-50"   name="collegecode"
                        value="<?php echo $_SESSION['collegecode']; ?>" disabled readonly>
                       </div>
                       <div class="col-8">
                        <label>College Name</label>
                         <input type="text" class="form-control w-100" disabled   name="collegename"
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
                        <input type="number" class="form-control"   name="stmobile" required>
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
        <button type="submit" name="stsubmit" class="btn btn-primary">Submit</button>
      </div>
          </form> -->
      </div>
    </div>
  </div>
</div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        <?php

          
          $id = $_GET['id'];
          $selquery2 = "SELECT * FROM `student-list` where id=$id" ;
          
          $query4 = mysqli_query($con, $selquery2);
          $stresult = mysqli_fetch_assoc($query4);

         if(isset($_POST['stusubmit'])){
            $collegecode = mysqli_real_escape_string($con, $_POST['collegecode']);
            $collegename = mysqli_real_escape_string($con, $_POST['collegename']);
            $degree = mysqli_real_escape_string($con, $_POST['degree']);
           
            $branch = mysqli_real_escape_string($con, $_POST['branch']);
            $year = mysqli_real_escape_string($con, $_POST['year']);
            $stname = mysqli_real_escape_string($con, $_POST['stname']);
            $rollnumber = mysqli_real_escape_string($con, $_POST['rollnumber']);
            $fname = mysqli_real_escape_string($con, $_POST['fname']);
            $dob = mysqli_real_escape_string($con, $_POST['dob']);
            $stmobile = mysqli_real_escape_string($con, $_POST['stmobile']);
            $stemail = mysqli_real_escape_string($con, $_POST['stemail']);
            $stpassword = mysqli_real_escape_string($con, $_POST['stpassword']);
            $stcpassword = mysqli_real_escape_string($con, $_POST['stcpassword']);
            
           
                    // $stcinsertquery = "INSERT INTO `student-list` (`id`, `collegecode`, `collegename`, `degree`, `branch`, `year`, `stname`,
                    //  `rollnumber`, `fname`, `dob`, `stmobile`, `stemail`, `stpassword`, `stcpassword`)
                    //  VALUES (NULL, '$collegecode', '$collegename', '$degree', '$branch', '$year', '$stname', '$rollnumber',
                    //   '$fname', '$dob', '$stmobile', '$stemail', '$stpass', '$stcpass');";
                    $stupdate = "UPDATE `student-list` SET `id`='$id',`collegecode`='$collegecode',`collegename`='$collegename',`degree`='$degree',
                    `branch`='$branch',`year`='$year',`stname`='$stname',`rollnumber`='$rollnumber',`fname`='$fname',
                    `dob`='$dob',`stmobile`='$stmobile',`stemail`='$stemail',`stpassword`='$stpassword',`stcpassword`='$stcpassword' WHERE id='$id'";
                    $stcuquery = mysqli_query($con, $stupdate);

                    if($stcuquery){
                        ?>
                            <script>
                                alert("Student Updated Successfully");
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                        alert("something went wrong");
                    </script>
                    <?php
                    }
                
                }

              
           
        
    ?>


        <form action="" method="POST" class="form">
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
                        <input type="text" class="form-control" placeholder="e.g. B.tech" value="<?php echo $stresult['degree']; ?>" name="degree" required>
                       </div>
                     <div class="col">
                        <label>Branch</label>                 
                        <input type="text" class="form-control" value="<?php echo $stresult['branch']; ?>" placeholder="e.g. Computer Science & Engg."
                          name="branch" required>
                    </div>
                       <div class="col">
                      
                         <label>Year</label> 
                         
                         <select class="form-select" name="year" required> 
                                <option selected><?php echo $stresult['year']; ?> </option>
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
                        <input type="text" class="form-control" value="<?php echo $stresult['stname']; ?>"  name="stname" required>
                       </div>
                       <div class="col">
                        <label>Roll Number</label>
                         <input type="text" class="form-control" value="<?php echo $stresult['rollnumber']; ?>"  name="rollnumber" required>
                       </div>
                     </div><br>
                     <div class="row">
                     <div class="col">
                        <label>Father's Name</label>                 
                        <input type="text" class="form-control"   name="fname" value="<?php echo $stresult['fname']; ?>"  required>
                       </div>
                       <div class="col">
                        <label>Date Of Birth</label>
                         <input type="date" class="form-control"  name="dob" value="<?php echo $stresult['dob']; ?>"  required>
                       </div>
                     </div><br>
                     <div class="row">
                     <div class="col">
                        <label>Mobile Number</label>                 
                        <input type="tel" class="form-control"   name="stmobile" value="<?php echo $stresult['stmobile']; ?>"  required>
                       </div>
                       <div class="col">
                        <label>E-mail id</label>
                         <input type="email" class="form-control"  name="stemail"value="<?php echo $stresult['stemail']; ?>"  required>
                       </div>
                     </div>
                     <br>
                     <div class="row">
                     <div class="col">
                        <label class="required">Password</label>                 
                        <input type="password" class="form-control "   name="stpassword" 
                        value="<?php echo $stresult['stpassword']; ?>" readonly  required>
                       </div>
                       <div class="col">
                        <label>Confirm Password</label>
                         <input type="password" class="form-control required input-st" name="stcpassword" readonly value="<?php echo $stresult['stcpasssword']; ?>" required>
                       </div>
                     </div>
                
           <br>
      
      <div class="text-center pb-3">
       
        <button type="submit" name="stusubmit" class="btn btn-primary">UPDATE</button>
      </div>
          </form>
        </div>
    </div>
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