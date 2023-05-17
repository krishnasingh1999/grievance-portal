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
    <title>Admin Update</title>
    <?php include 'gcss/links.php' ?>
    <link rel="stylesheet" type="text/css" href="gcss/style.css">
</head>
<body class="container-fluid">
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
     



      </ul>
      <form class="d-flex">
        <input class="form-control " type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="modal-body m-auto text-center mt-5">
      <form action=" " method="POST" class="college-form form">

      <?php
          $id = $_GET['id'];
          $selquery1 = "SELECT * FROM `college-list` where id=$id" ;
       
          $query3 = mysqli_query($con, $selquery1);
          $result = mysqli_fetch_assoc($query3);

          if(isset($_POST['ccsubmit'])){
            
             $collegename = mysqli_real_escape_string($con, $_POST['collegename']);
             $collegecode = mysqli_real_escape_string($con, $_POST['collegecode']);
             $collegeemail = mysqli_real_escape_string($con, $_POST['collegeemail']);
             $collegenumber = mysqli_real_escape_string($con, $_POST['collegenumber']);
             $collegepassword = mysqli_real_escape_string($con, $_POST['collegepassword']);
             $ccpassword = mysqli_real_escape_string($con, $_POST['ccpassword']);
             
             $branch1 = mysqli_real_escape_string($con, $_POST['branch1']);
             $branch2 = mysqli_real_escape_string($con, $_POST['branch2']);
             $branch3 = mysqli_real_escape_string($con, $_POST['branch3']);
             $branch4 = mysqli_real_escape_string($con, $_POST['branch4']);
             $branch5 = mysqli_real_escape_string($con, $_POST['branch5']);
             $branch6 = mysqli_real_escape_string($con, $_POST['branch6']);
             $branch7 = mysqli_real_escape_string($con, $_POST['branch7']);
             $branch8 = mysqli_real_escape_string($con, $_POST['branch8']);
             $branch9 = mysqli_real_escape_string($con, $_POST['branch9']);
             $branch10 = mysqli_real_escape_string($con, $_POST['branch10']);
             $colpass = password_hash($collegepassword, PASSWORD_BCRYPT);
             $ccpass = password_hash($ccpassword, PASSWORD_BCRYPT);
 
                    //  $cinsertquery = "INSERT INTO `college-list` (`id`, `collegename`, `collegecode`, `collegeemail`, `collegenumber`, 
                    //  `collegepassword`, `ccpassword`) 
                    //  VALUES (NULL, '$collegename', '$collegecode', '$collegeemail', '$collegenumber', '$colpass', '$ccpass');";
          
                      $cupdatequery = "UPDATE `college-list` SET `id`='$id',`collegename`='$collegename',`collegecode`='$collegecode',
                      `collegeemail`='$collegeemail',`collegenumber`='$collegenumber',`collegepassword`='$colpass',`ccpassword`='$ccpass'
                      'branch1'='$branch1' WHERE id='$id'";
 
                     $cuquery = mysqli_query($con, $cupdatequery);
 
                     if($cuquery){
                         ?>
                             <script>
                                 alert("College Updated Successfully");
                             </script>
                         <?php
                     }
                     else{
                         ?>
                         <script>
                         alert("College not Updated");
                     </script>
                     <?php
                     }
                 
                 }
 
              
             
 
           
         
     ?>

        <input type="text" placeholder="College Name" name="collegename"class="input-col" value="<?php   echo $result['collegename'] ?>" required><br><br>
        <input type="text" placeholder="College Code" name="collegecode"class="input-col"  value="<?php   echo $result['collegecode'] ?>" required ><br><br>
        <input type="email" placeholder="E-mail id" name="collegeemail" class="input-col" value="<?php   echo $result['collegeemail'] ?>" required ><br><br>
        <input type="tel" placeholder="Contact" name="collegenumber" class="input-col" value="<?php   echo $result['collegenumber'] ?>" required ><br><br>
        <input type="password" placeholder="Create New Password" class="input-col" name="collegepassword"value="<?php  echo $result['collegepassword'] ?>" required readonly><br><br> 
         <input type="password" placeholder="Confirm Password" class="input-col" name="ccpassword"value="<?php  echo $result['ccpassword'] ?>" required readonly><br><br>
        
        <input type="text" placeholder="Branch 1" name="branch1" class="input-col" value="<?php   echo $result['collegename'] ?>"required ><br><br>
        <input type="text" placeholder="Branch 2" name="branch2" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 3" name="branch3" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 4" name="branch4" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 5" name="branch5" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 6" name="branch6" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 7" name="branch7" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 8" name="branch8" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 9" name="branch9" class="input-col" ><br><br>
        <input type="text" placeholder="Branch 10" name="branch10" class="input-col" ><br><br>
         <button type="submit" name="ccsubmit" class="btn btn-success">Update</button>
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