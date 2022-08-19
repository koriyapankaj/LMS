<?php

session_start();

if(!isset($_SESSION['student_id']))
{



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>LMS</title>

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome.min.css">
  </head>
  <body>




<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container">  
                <h1 class="h2">Student Registration</h1>
            </div>
        
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      
        <form class="needs-validation" method="post" action="reg_submit.php" enctype="multipart/form-data">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="enroll" class="form-label">Enrollment No.</label>
              <input type="number" class="form-control" name="enroll" id="enroll" min="10000000000" max="99999999999" required>
              <div class="invalid-feedback">
                Valid Enrollment no is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="" required>
              <div class="invalid-feedback">
                valid email is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="fname" class="form-label">First Name</label>
              <input type="text" class="form-control" name="fname" id="fname" placeholder="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="mname" class="form-label">Middle Name</label>
              <input type="text" class="form-control" name="mname" id="mname" placeholder="" required>
              <div class="invalid-feedback">
                valid Middle name is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="lname" class="form-label">Last Name</label>
              <input type="text" class="form-control" name="lname" id="lname" placeholder="" required>
              <div class="invalid-feedback">
                valid Last Name is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="DOB" class="form-label">Date Of Birth</label>
              <input type="date" class="form-control" name="DOB" id="DOB" placeholder="" required>
              <div class="invalid-feedback">
                valid Birth Date is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="mo" class="form-label">Mobile No.</label>
              <input type="text" class="form-control" name="mo" id="mo" placeholder="" required>
              <div class="invalid-feedback">
                valid Mobile No is required.
              </div>
            </div>

            
            <div class="col-md-4">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-select" name="gender" id="gender" required>
                <option value="">Choose...</option>
                <option>male</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Gender.
              </div>
            </div>

            <div class="col-md-4">
              <label for="college" class="form-label">College</label>
              <select class="form-select" name="college" id="college" required>
                <option value="">Choose...</option>
                <option>ampics</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid College.
              </div>
            </div>

            <div class="col-md-4">
              <label for="course" class="form-label">Course</label>
              <select class="form-select" name="course" id="course" required>
                <option value="">Choose...</option>
                <option>MCA</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Course.
              </div>
            </div>

            <div class="col-md-4">
              <label for="sem" class="form-label">Semester</label>
              <select class="form-select" name="sem" id="sem" required>
                <option value="">Choose...</option>
                <option>1</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Semester.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="pass" class="form-label">Password</label>
              <input type="password" class="form-control" name="pass" id="pass" placeholder="" required>
              <div class="invalid-feedback">
                password is required.
              </div>
            </div>

            <div class="col-md-12">
              <label for="address" class="form-label">Address</label>
              <textarea class="form-control" name="address" id="address" cols="30" rows="5" required></textarea>
              
            </div>

            <div class="col-md-12">
              <label for="picture" class="form-label">Upload profile picture</label>
              <input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="picture" id="picture">
              
            </div>
        
          <hr class="my-4">

          <a href="index.php" class="text-decoration-none">already have an account ? login.</a>

          <button name="submit" class="w-100 mb-5 btn btn-primary btn-lg" type="submit">Register</button>
        </form>
      </div>
      </div>






<?php include('footer.php'); 

}

else{

	header('location:dashboard.php');


}
?>


