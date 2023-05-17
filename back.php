<?php
          
          include 'dbcon.php';

         if(isset($_POST['submit'])){
           
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
            
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

            $emailquery = "SELECT * FROM `admin-reg` where email='$email'";
            $query = mysqli_query($con, $emailquery);

            $emailcount = mysqli_num_rows($query);

            if( $emailcount>0){

                echo "Email already exist";
            }else{
                if($password === $cpassword){

                    $insertquery = "INSERT INTO `admin-reg` ( `username`, `mobile`, `email`, `password`, `cpassword`) 
                    values('$username','$mobile','$email', '$pass', '$cpass')";

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

                else{
                    ?>
                        <script>
                        alert("password is not matching");
                    </script>
                    <?php
                }
            }

         }

         

    ?>

 <!---College register--->
      <?php
          
        

         if(isset($_POST['csubmit'])){
           
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

            $collegecodequery = "SELECT * FROM `college-list` where collegecode='$collegecode'";
            $cquery = mysqli_query($con, $collegecodequery);

            $collegecodecount = mysqli_num_rows($cquery);

            if( $collegecodecount>0){
               ?>
                   <script>

                     alert("College Already Exist");
                   </script>
                <?php
            }
            else{
                if($collegepassword === $ccpassword){

                    $cinsertquery = "INSERT INTO `college-list` (`id`, `collegename`, `collegecode`, `collegeemail`, `collegenumber`, 
                    `collegepassword`, `ccpassword`, 'branch1', 'branch2',  'branch3',  'branch4',  'branch5',  'branch6', 
                     'branch7',  'branch8',  'branch9',  'branch10') 
                    VALUES (NULL, '$collegename', '$collegecode', '$collegeemail', '$collegenumber', '$colpass', '$ccpass',
                     '$branch1', '$branch2',   '$branch3', '$branch4', '$branch5', '$branch6', '$branch7', '$branch8',
                      '$branch9', '$branch10');";

                    $ciquery = mysqli_query($con, $cinsertquery);

                    if($ciquery){
                        ?>
                            <script>
                                alert("College registerd Successfully");
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

                else{
                    ?>
                        <script>
                        alert("password is not matching");
                    </script>
                    <?php
                }
            }

         }  
        
    ?>

    <!-- student register -->
<?php

          
         

         if(isset($_POST['stsubmit'])){
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
            
            $stpass = password_hash($stpassword, PASSWORD_BCRYPT);
            $stcpass = password_hash($stcpassword, PASSWORD_BCRYPT);

            $rollnumberquery = "SELECT * FROM `student-list` where rollnumber = '$rollnumber'";
            $stcquery = mysqli_query($con, $rollnumberquery);

            $rollnumbercount = mysqli_num_rows($stcquery);

            if( $rollnumbercount>0){
               ?>
                   <script>

                     alert("Student Already Exist");
                   </script>
                <?php
            }
            else{
                if($stpassword === $stcpassword){

                    $stcinsertquery = "INSERT INTO `student-list` (`id`, `collegecode`, `collegename`, `degree`, `branch`, `year`, `stname`,
                     `rollnumber`, `fname`, `dob`, `stmobile`, `stemail`, `stpassword`, `stcpassword`)
                     VALUES (NULL, '$collegecode', '$collegename', '$degree', '$branch', '$year', '$stname', '$rollnumber',
                      '$fname', '$dob', '$stmobile', '$stemail', '$stpass', '$stcpass');";

                    $stciquery = mysqli_query($con, $stcinsertquery);

                    if($stciquery){
                        ?>
                            <script>
                                alert("Student registerd Successfully");
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

                else{
                    ?>
                        <script>
                        alert("password is not matching");
                    </script>
                    <?php
                }
            }

         }  
        
    ?>


