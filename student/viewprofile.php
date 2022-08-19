<?php 

session_start();

include('header.php'); 



if(isset($_SESSION['student_id']))
{

  

  $id=$_SESSION['student_id'];

include('../dbcon.php');


  $query3="SELECT * FROM `students` WHERE `id`='$id'";  


$run3=mysqli_query($con,$query3);
$data3=mysqli_fetch_assoc($run3);





?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Account</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="edit_profile.php" class="btn btn-sm btn-outline-secondary">Edit profile</a>
           
          </div>
          
        </div>
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      

      <!-- ////////////// -->



  <section style="background-color: #eee;">
  <div class="container py-5">
    

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="../student/image/<?php echo $data3['picture']; ?>" alt="avatar"
              class="img-fluid" style="width: 150px;">
          </div>
        </div>
       
      </div>


      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['lname'].' '.$data3['fname'].' '.$data3['mname']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Enrollment No</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['enroll']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">College</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['college']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Semester</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['sem']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['DOB']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['email']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile No</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['mo']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['gender']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['address']; ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>
  </div>
</section>




      <!-- ////////////// -->


        
      </div>
      </div>






<?php include('footer.php'); 

    }
    else{

    }

?>
