<?php 
session_start();
include('header.php'); 
include('../dbcon.php');


if(isset($_SESSION['student_id']))
{
$id=$_SESSION['student_id'];
$query3="SELECT * FROM `students` WHERE `id`='$id'";  


$run3=mysqli_query($con,$query3);
$data3=mysqli_fetch_assoc($run3);
$enroll=$data3['enroll'];






?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Library Record</h1>
        
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      

      <!-- ////////////// -->



  <section style="background-color: #eee;">
  <div class="container py-3">
    

    <div class="row">
      


      <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
          




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


$query="SELECT * FROM `book_issue` WHERE `stu_id`='$enroll'";  



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

?>
