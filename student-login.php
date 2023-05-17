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
   if(isset($_POST['stsubmit'])){

    $rollnumber = $_POST['rollnumber'];
    $stpassword = $_POST['stpassword'];

    $rollnumber_search = "SELECT * FROM `student-list` where rollnumber='$rollnumber'";
    $cquery = mysqli_query($con, $rollnumber_search);

    $collegecode_count = mysqli_num_rows($cquery);

    if($collegecode_count){

        $collegecode_pass = mysqli_fetch_assoc($cquery);

        $db_pass = $collegecode_pass['stpassword'];

        $_SESSION['stname'] =  $collegecode_pass['stname'];
        $_SESSION['rollnumber'] =  $collegecode_pass['rollnumber'];
        $_SESSION['dob'] =  $collegecode_pass['dob'];
        $_SESSION['fname'] =  $collegecode_pass['fname'];
        $_SESSION['stmobile'] =  $collegecode_pass['stmobile'];
        $_SESSION['stemail'] =  $collegecode_pass['stemail'];
        $_SESSION['degree'] =  $collegecode_pass['degree'];
        $_SESSION['branch'] =  $collegecode_pass['branch'];
        $_SESSION['year'] =  $collegecode_pass['year'];
        $_SESSION['collegecode'] =  $collegecode_pass['collegecode'];
        $_SESSION['collegename'] =  $collegecode_pass['collegename'];
       

        $pass_decode = password_verify($stpassword, $db_pass);

        if($pass_decode){
             echo "login succesful";
            header('location:student-dashboard.php');
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
        <div class="col-sm-2  m-auto  mt-5    ">
         
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
         class=" p-3 border border-grey card shadow mt-5 text-center">
        <h5>Student Login</h5>   
        <input type="text" placeholder="User id" name="rollnumber" required><br>
            <input type="password" placeholder="Password" name="stpassword" required><br>
        <div class="d-flex justify-content-center"> <button type="submit" name="stsubmit" class="py-1 btn btn-primary">Login</button>
        </div>   
        
    </form>
        </div>
    </div>
</body>
</html>