<?php
          
          include 'dbcon.php';

         if(isset($_POST['qsubmit'])){
           
            $collegecode = mysqli_real_escape_string($con, $_POST['collegecode']);
            $stname = mysqli_real_escape_string($con, $_POST['stname']);
            $rollnumber = mysqli_real_escape_string($con, $_POST['rollnumber']);
            $stmobile = mysqli_real_escape_string($con, $_POST['stmobile']);
            $queryask = mysqli_real_escape_string($con, $_POST['queryask']);
            $stquery = mysqli_real_escape_string($con, $_POST['stquery']);
            
           

           

                    $insertquery = "INSERT INTO `query-st`(`id`, `collegecode`, `stname`, `rollnumber`, `stmobile`, `queryask`, `stquery`)
                     VALUES (null,'$collegecode','$stname','$rollnumber','$stmobile','$queryask','$stquery')";

                    $iquery = mysqli_query($con, $insertquery);

                    if($iquery){
                        ?>
                            <script>
                                alert("inserted Successfully");
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                        alert("not saved");
                    </script>
                    <?php
                    }
                
                }


         

    ?>


<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> " method="POST" class="form">



    <label for="collegecode" class="form-label">Collegecode</label>
    <input type="text" class="form-control" name="collegecode" value="383" readonly>

    <label for="stname" class="form-label">stname</label>
    <input type="text" class="form-control" name="stname" value="krishna singh" readonly>

    <label for="rollnumber" class="form-label">Rollnumber</label>
    <input type="text" class="form-control" name="rollnumber" value="789654" readonly>
    
    <label for="stmobile" class="form-label">Mobile</label>
    <input type="text" class="form-control" name="stmobile" >

    <label for="queryask" class="form-label">ASk Your Query</label>
    <textarea type="text" class="form-control" name="queryask" > </textarea>

    <label for="stquery" class="form-label">Query Status</label>
    <select name="stquery" id="stquery">
        <option value="Unolved">Unsolved</option>
        <option value="Solved">Solved</option>
    </select>
    <button type="submit" name="qsubmit">Submit</button>
</form>