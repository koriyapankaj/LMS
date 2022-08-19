<?php
session_start();
include('header.php');
include('../dbcon.php');


$id=$_SESSION['student_id'];




$query="SELECT * FROM `students` WHERE `id`='$id'";
$run=mysqli_query($con,$query);

$data=mysqli_fetch_assoc($run);

?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profile</h1>
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      
        <form class="needs-validation" method="post" action="profile_update.php" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-sm-6">
              <label for="enroll" class="form-label">Enrollment No.</label>
              <input type="number" class="form-control" name="enroll" value="<?php echo $data['enroll']; ?>" id="enroll" min="10000000000" max="99999999999" required>
              <div class="invalid-feedback">
                Valid Enrollment no is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" value="<?php echo $data['email']; ?>" name="email" id="email" placeholder="" required>
              <div class="invalid-feedback">
                valid email is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="fname" class="form-label">First Name</label>
              <input type="text" class="form-control" value="<?php echo $data['fname']; ?>" name="fname" id="fname" placeholder="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="mname" class="form-label">Middle Name</label>
              <input type="text" class="form-control" value="<?php echo $data['mname']; ?>" name="mname" id="mname" placeholder="" required>
              <div class="invalid-feedback">
                valid Middle name is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="lname" class="form-label">Last Name</label>
              <input type="text" class="form-control" value="<?php echo $data['lname']; ?>" name="lname" id="lname" placeholder="" required>
              <div class="invalid-feedback">
                valid Last Name is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="DOB" class="form-label">Date Of Birth</label>
              <input type="date" class="form-control" value="<?php echo $data['DOB']; ?>" name="DOB" id="DOB" placeholder="" required>
              <div class="invalid-feedback">
                valid Birth Date is required.
              </div>
            </div>

            <div class="col-sm-4">
              <label for="mo" class="form-label">Mobile No.</label>
              <input type="text" class="form-control" value="<?php echo $data['mo']; ?>" name="mo" id="mo" placeholder="" required>
              <div class="invalid-feedback">
                valid Mobile No is required.
              </div>
            </div>

            
            <div class="col-md-4">
              <label for="gender" class="form-label">Gender</label>
              <select class="form-select" name="gender" id="gender" required>
                <option value="<?php echo $data['gender']; ?>"><?php echo $data['gender']; ?></option>
                <option>male</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Gender.
              </div>
            </div>

            <div class="col-md-4">
              <label for="college" class="form-label">College</label>
              <select class="form-select" name="college" id="college" required>
                <option value="<?php echo $data['college']; ?>"><?php echo $data['college']; ?></option>
                <option>ampics</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid College.
              </div>
            </div>

            <div class="col-md-4">
              <label for="course" class="form-label">Course</label>
              <select class="form-select" name="course" id="course" required>
                <option value="<?php echo $data['course']; ?>"><?php echo $data['course']; ?></option>
                <option>MCA</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Course.
              </div>
            </div>

            <div class="col-md-4">
              <label for="sem" class="form-label">Semester</label>
              <select class="form-select" name="sem" id="sem" required>
                <option value="<?php echo $data['sem']; ?>"><?php echo $data['sem']; ?></option>
                <option>1</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Semester.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="pass" class="form-label">Password</label>
              <input type="password" class="form-control" value="<?php echo $data['password']; ?>" name="pass" id="pass" placeholder="" required>
              <div class="invalid-feedback">
                valid password is required.
              </div>
            </div>


            <div class="col-md-12">
              <label for="address" class="form-label">Address</label>
              <textarea class="form-control" name="address" id="address" cols="30" rows="5" required><?php echo $data['address']; ?></textarea>
              
            </div>

            <div class="col-md-12">
              <label for="picture" class="form-label">Upload profile picture</label>
              <input class="form-control" accept=".png, .jpg, .jpeg" type="file" name="picture" id="picture">
              
            </div>

            <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
        
          <hr class="my-4">


          <button name="submit" class="w-100 mb-5 btn btn-primary btn-lg" type="submit">Update Student</button>
        </form>
      </div>
      </div>






<?php include('footer.php'); ?>
