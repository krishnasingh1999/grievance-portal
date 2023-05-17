<?php 
  header('location:admin-dashboard.php');
    
    include 'dbcon.php';
    $id = $_GET['id'];

    $deletequery = "DELETE FROM `college-list` WHERE id = $id";

    $delquery = mysqli_query($con, $deletequery);

    if($delquery){
        ?>
            <script>
                alert("College Deleted Successfully");
            </script>
        <?php

      
    }
  
    else{
        ?>
        <script>
        alert("College not Deleted");
    </script>
    <?php
    }


?>