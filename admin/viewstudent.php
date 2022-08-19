<?php 
session_start();
if(isset($_SESSION['admin_id']))
{
include('header.php'); 


if(isset($_GET['id']))
{

  $id=$_GET['id'];

include('../dbcon.php');


  $query3="SELECT * FROM `students` WHERE `enroll`='$id'";  


$run3=mysqli_query($con,$query3);
$data3=mysqli_fetch_assoc($run3);





?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Student Details</h1>
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
            <img src="../student/image/<?php echo $data3['picture']; ?>" alt="avatar" class="img-fluid" style="width: 150px;">
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


      
          
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4">Library Record</p>




<div class="table-responsive">
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ISBN</th>
      <th scope="col">Issue Date</th>
      <th scope="col">Return Date</th>
      <th scope="col">Issue Time</th>
      <th scope="col">Return Time</th>
      <th scope="col">Days Left</th>
      <th scope="col">Status</th>
      <th scope="col">Fine</th>

    </tr>
  </thead>
  <tbody>


<?php


$query="SELECT * FROM `book_issue` WHERE `stu_id`='$id'";  



function showbooks()
{    
		
        global $con;
	      global $query;
$run=mysqli_query($con,$query);
	
		$count=0;
		while($data=mysqli_fetch_assoc($run)) 
		{
			$count++;

			?>


    <tr>
      <td><?php  echo $count; ?></td>
      <td><a class="link-dark text-decoration-none" href="viewbook.php?id=<?php echo $data['book_id']?>"><?php  echo $data['book_id'] ?></a></td>
      <td><?php  echo $data['issue_date'] ?></td>
      <td><?php  echo $data['return_date'] ?></td>
      <td><?php  echo $data['issue_time'] ?></td>
      <td><?php  echo $data['return_time'] ?></td>
      <td>
      <?php  
                if($data['status']=='issued')
                {
                  $ex_d=date_create($data['expected_return_date']);
                  $d=date_create(date("d-m-Y"));
                  $diff=$d->diff($ex_d);
                  echo $diff->format("%r%a");
                }
                else{
                  echo '-';
                }
          ?>
      </td>
      <td><?php  echo $data['status'] ?></td>
      <td>
      <?php  
                if($data['status']=='issued')
                {
                  $temp=0;
                  
                  $ex_d=date_create($data['expected_return_date']);
                  $d=date_create(date("d-m-Y"));
                  $diff=$d->diff($ex_d);
                  $t_diff=$diff->format("%r%a");

                  if($temp>$t_diff)
                  {
                    $temp=$temp+100;
                    if($t_diff<(-15))
                    {
                      $fine=floor(abs($t_diff)/15);
                      $temp+=$fine*100;
                    }
                    echo $temp;
                  }
                  else{
                    echo '-';
                  }

              
                }
                else{
                  echo $data['fine'];
                }
          ?>
      </td>




    </tr>


<?php }} 

showbooks();


?>

     </tbody>
</table>
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

  }
  else
  {
?>
    <script type="text/javascript">  window.open('index.php','_self'); </script>
  <?php
  }  


?>
