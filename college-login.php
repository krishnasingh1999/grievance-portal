<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Login</title>
    
    <?php include 'gcss/links.php' ?>
    <link rel="stylesheet" type="text/css" href="gcss/style.css">
   
</head>
<body>
<?php
    include 'dbcon.php';
  

  
?>
  <?php 
   if(isset($_POST['csubmit'])){

    $collegecode = $_POST['collegecode'];
    $collegepassword = $_POST['collegepassword'];

    $collegecode_search = "SELECT * FROM `college-list` where collegecode='$collegecode'";
    $cquery = mysqli_query($con, $collegecode_search);
    
   
    $collegecode_count = mysqli_num_rows($cquery);

    if($collegecode_count){

        $collegecode_pass = mysqli_fetch_assoc($cquery);

        $db_pass = $collegecode_pass['collegepassword'];

        $_SESSION['collegecode'] =  $collegecode_pass['collegecode'];
        $_SESSION['collegename'] =  $collegecode_pass['collegename'];
        $_SESSION['collegeemail'] =  $collegecode_pass['collegeemail'];
        $_SESSION['collegenumber'] =  $collegecode_pass['collegenumber'];
       
       

        $pass_decode = password_verify($collegepassword, $db_pass);
         
        if($pass_decode){
             echo "login succesful";
            header('location:college-dashboard.php');
        }
        else{

           ?>
               <script>
                  alert("Password Incorrect");
               </script>
             
               
               
           <?php
        }

        
    }
    else{
        ?>
               <script>
               alert("Invalid User id") 
               </script>
           <?php
    }
}

  ?>

    <div class="row">
        <div class="col-sm-2  m-auto  mt-5   card-f text-center">
          
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
         class=" p-3 border border-grey card shadow mt-5">
        <h5>College login</h5>   
        <input type="text" placeholder="User id" name="collegecode" required><br>
            <input type="password" placeholder="Password" name="collegepassword" required><br>
        <div class="d-flex justify-content-center"> <button type="submit" name="csubmit" class="py-1 btn btn-primary">Login</button>
        </div>   
        
    </form>
        </div>
    </div>
</body>
</html>