 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Student Greivence</title>
    <?php include 'gcss/links.php' ?>
    <link rel="stylesheet" type="text/css" href="gcss/style.css">
   
</head>

<body>


<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12  ">
                <nav class="navbar navbar-main navbar-expand-lg   fixed-top   rounded-pill p-1">
                    <div class="container-fluid">
                        <a class="navbar-brand navbar-brand-main text-white font-weight-bold" href="#">Redressal System</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-dark"></span>
                        </button>
                       <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <ul class="navbar-nav text-center mx-lg-auto mb-2 mb-lg-0 ">
                                <li class="nav-item mx-lg-3">
                                    <a class="nav-link nav-link-main " aria-current="page" href="#index.php">Home</a>
                                </li>
                                <li class="nav-item mx-lg-3">
                                    <a class="nav-link nav-link-main" href="#features">Features</a>
                                </li>
                                <li class="nav-item mx-lg-3">
                                    <a class="nav-link nav-link-main" href="#about">About</a>
                                </li>
                                <li class="nav-item mx-lg-3">
                                    <a class="nav-link nav-link-main" href="#contact">Contact</a>
                                </li>
                            </ul>
                            <ul class="d-flex navbar-nav text-center ">
                                <li class="mx-lg-3 my-lg-0 my-2"><a href="college-login.php"><button>Institute Login</button></a></li>
                                <li><a href="student-login.php"><button>Student Login</button></a></li>
                            </ul>
                        </div>
                      
                    </div>
                   
                </nav>
               
            </div>
            <div class="container-fluid site-header">
                <div class="row d-flex main  ">
                    <div class="col-sm-6">
                        <img src="images/example-30.svg" class="w-100 my-5 pt-5" alt="">
                    </div>
                    <div class="col-sm-6 m-auto  text-center text-white">
                        <h1>Student Redressal System</h1>
                        <a href="#contact"><button>GET A QOUTE</button></a>
                         
                    </div>
                    </div>
                </div>
        </div>
    </div>
    

   
        
    
    
   <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 " id="features">
              
                <div class="row  features mt-5">
                    <div class="col-sm-12 ">
                <h2 class="mt-5 f-h">
                    Features
                </h2>
                    </div>
                    <div class="col-sm-12 col-lg-3 ">
                        <div class="card-f p-5 text-center">
                            <div class="mt-5">
                        <i class="fa fa-question-circle fa-5x text-danger"></i>
                            <p class="mt-5">Easy to ask queries.</p>
                            
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card-f p-5 text-center">
                            <div class="mt-5">
                            <i class="fa fa-tachometer fa-5x text-success" aria-hidden="true"></i>
                           <p class="mt-5">Easy to use dashboards for both institute and students.</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="card-f p-5">
                        <div class="mt-5 text-center">
                        <i class="fa fa-address-book fa-5x text-primary" aria-hidden="true"></i>
                           <p class="mt-5">Easy to Maintain student Data</p>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
   </div>

   <div class="container-fluid " id="about">
     <div class="row ">
        <div class="col-sm-12 about ">
            <h2 class="mt-5">ABOUT</h2>
            <p>In order to provide opportunities for redressal of certain grievances of students already enrolled in any 
institution, as well as for those seeking admission to such institutions, AICTE has notified All India Council 
for Technical Education (Redressal of Grievance of Students) Regulation, 2019 vide F.No.1- 101/PGRC/AICTE/
Regulation/2019 dated 07.11.2019 for establishment of grievance redressal mechanism for all AICTE approved 
Technical Institutions. Non-compliance of the above Regulations shall call for punitive action.
            
            </p>
        </div>
     </div>
     <div class="row text-center mb-5" id="contact"> 
     <h2 class="mt-5 f-h mt-5">Ask Your Query</h2>
        <div class="col-sm-6 border">
            <div class="">
            <img src="images/call-center.png" height="500" class="" alt="">
            </div>
           
        </div>
        <div class="col-sm-6 text-center border">
       
            <form action="" class="mb-5 mt-5">
               <h4 class="text-decoration-underline text-danger">We Get Back to You Soon !</h4>
                <input type="text" class="w-50  rounded-pill p-1 mt-4" placeholder="Your Name" name="yourname" required><br><br>
                <input type="text" class="w-50  rounded-pill p-1" placeholder="Organization Name" name="org-name" required><br><br>
                <input type="tel" class="w-50  rounded-pill p-1" placeholder="Mobile Number" name="con-mobile" required><br><br>
                <input type="email" class="w-50  rounded-pill p-1" placeholder="Email" name="con-email" required><br><br>
                <textarea name="msg" class="w-50  rounded p-2" id="msg" cols="30" rows="3" placeholder="Enter your message" required></textarea><br><br>
                <button type="submit" name="con-submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
     </div>

     <div class="row">
        <div class="col-sm-12 bg-dark text-white text-center">
            <p>&#169;2023</p>
        </div>
     </div>
   </div>

</body>

</html> 