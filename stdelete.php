<?php 
  header('location:student-list.php');
    
    include 'dbcon.php';
    $id = $_GET['id'];

    $deletequery = "DELETE FROM `student-list` WHERE id = $id";

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