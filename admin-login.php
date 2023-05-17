<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
    <?php include 'gcss/links.php' ?>
    <link rel="stylesheet" type="text/css" href="gcss/style.css">
</head>
<body>
<?php
    include 'dbcon.php';
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = "SELECT * FROM `admin-reg` where email= '$email' ";
        $query = mysqli_query($con, $email_search);
       
        $email_count = mysqli_num_rows($query);

        if($email_count){

            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];

            $_SESSION['username'] =  $email_pass['username'];

            $pass_decode = password_verify($password, $db_pass);

            if($pass_decode){
                 echo "login succesful";
                header('location:admin-dashboard.php');
            }
            else{

                echo "password incorrect";
            }

            
        }
        else{
            echo "invalid user id";
        }
}

  
?>
  

    <div class="row">
        <div class="col-sm-2  m-auto  mt-5    ">
          
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class=" p-3 border border-grey card shadow">
        <h4>Admin Login</h4>   
        <input type="email" placeholder="User id" name="email" required><br>
            <input type="password" placeholder="Password" name="password" required><br>
        <div class="d-flex justify-content-center"> <button type="submit" name="submit" class="py-1 btn btn-primary">Login</button>
        </div>   
    </form>
        </div>
    </div>
</body>
</html>