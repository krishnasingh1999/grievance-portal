<?php 

session_start()

?>
<!DOCTYPE >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'gcss/links.php' ?>
    <link rel="stylesheet" type="text/css" href="gcss/style.css">

    <title>New Admin</title>
</head>
<body>
    <?php include 'dbcon.php'; ?>
    <?php include 'back.php'; ?>
 
          
         <div>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST">
        <input type="text" placeholder="Full name" name="username" required><br><br>
        <input type="number" placeholder="Mobile Number" name="mobile"  required ><br><br>
        <input type="email" placeholder="E-mail id" name="email" required ><br><br>
        <input type="password" placeholder="Create New Password" name="password" required><br><br>
        <input type="password" placeholder="Confirm Password" name="cpassword" required><br><br>
        <button type="submit" name="submit">Register</button>
        </form>
    </div>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>