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


   <?php

          
$id = $_GET['id'];
$selquery3 = "SELECT * FROM `query-st` where id=$id" ;

$query5 = mysqli_query($con, $selquery3);
$stquery1 = mysqli_fetch_assoc($query5);

if(isset($_POST['queryupdate'])){
    $collegecode = mysqli_real_escape_string($con, $_POST['collegecode']);
    $stname = mysqli_real_escape_string($con, $_POST['stname']);
    $rollnumber = mysqli_real_escape_string($con, $_POST['rollnumber']);
    $stmobile = mysqli_real_escape_string($con, $_POST['stmobile']);
    $queryask = mysqli_real_escape_string($con, $_POST['queryask']);
    $stquery = mysqli_real_escape_string($con, $_POST['stquery']);
    
   
 
         
        //   $stupdate = "UPDATE `student-list` SET `id`='$id',`collegecode`='$collegecode',`collegename`='$collegename',`degree`='$degree',
        //   `branch`='$branch',`year`='$year',`stname`='$stname',`rollnumber`='$rollnumber',`fname`='$fname',
        //   `dob`='$dob',`stmobile`='$stmobile',`stemail`='$stemail',`stpassword`='$stpassword',`stcpassword`='$stcpassword' WHERE id='$id'";
           $queryupdate = "UPDATE `query-st` SET `id`='$id',`collegecode`='$collegecode',`stname`='$stname',
           `rollnumber`='$rollnumber',`stmobile`='$stmobile',`queryask`='$queryask',`stquery`='$stquery' WHERE id='$id'";
          $stcuquery = mysqli_query($con, $queryupdate);

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


   
   <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 m-auto">
            <h3>Update Query Status</h3>
        <form action=" " method="POST" class="form">
       <label for="collegecode" class="form-label">Collegecode</label>
    <input type="text" class="form-control" name="collegecode" value="<?php echo $_SESSION['collegecode']?>" readonly>

    <label for="stname" class="form-label">stname</label>
    <input type="text" class="form-control" name="stname" value="<?php echo $stquery1['stname']?>" readonly>

    <label for="rollnumber" class="form-label">Rollnumber</label>
    <input type="text" class="form-control" name="rollnumber" value="<?php echo $stquery1['rollnumber']?>" readonly>
    
    <label for="stmobile" class="form-label">Mobile</label>
    <input type="tel" class="form-control" name="stmobile" required maxlength="10" value="<?php echo $stquery1['stmobile']?>" readonly >

    <label for="queryask" class="form-label"> Query</label>
    <textarea type="text" class="form-control" name="queryask"  required readonly> <?php echo $stquery1['queryask']?> </textarea>

    <label for="stquery" class="form-label" >Query Status</label>
    <select name="stquery" id="stquery" class="form-select" >
        <option ><?php echo $stquery1['stquery']?></option>
        <option >Unsolved</option>
        <option >Solved</option>
    </select>
      

      <!-- Modal footer -->
      <div class="modal-footer mt-3">
     
        
<input type="submit" name="queryupdate" id="myButton"  class="btn btn-primary shadow-lg" value="Submit">

      </div>
              </form>
  
        </div>
    </div>
   </div>
   <script type="text/javascript">
    document.getElementById("myButton").onclick = function(){
        location.href = "college-dashboard.php";
    };
</script>
   <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>