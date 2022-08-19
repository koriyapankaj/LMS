<?php 
session_start();
if(isset($_SESSION['admin_id']))
{
include('header.php'); ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 col-md-8">Students</h1>
        <form method="get">
        <div class="btn-toolbar mr-4 mb-md-0">
          <div class="btn-group ">
            <input type="text" name="search_key" id="">
            <input type="submit" name="search" value="search" class="btn btn-sm btn-outline-secondary">
           
          </div>
          
        </div>
        </form>


        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="addstudent.php" class="btn btn-sm btn-outline-secondary">Add Student</a>
           
          </div>
          
        </div>
      </div>



      

<div class="table-responsive">
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">En.No</th>
      <th scope="col">Student Name</th>
      <th scope="col">college</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>


<?php

include('../dbcon.php');

if(isset($_GET['search']))
{
  if(isset($_GET['search_key']))
  {
  $search_key=$_GET['search_key'];
  $query="SELECT * FROM `students` WHERE `tags` LIKE '%$search_key%'";  
  }
  else{
    
    $query="SELECT * FROM `students`";  

  }
}

else{

$query="SELECT * FROM `students`";  

}

function showstudents()
{    
		
        global $con;
	      global $query;
$run=mysqli_query($con,$query);
	
	if (mysqli_num_rows($run)<1) {
		?> <script>alert("No records found"); </script> <?php
	}

	else
	{
		$count=0;
		while($data=mysqli_fetch_assoc($run)) 
		{
			$count++;

			?>


    <tr>
      <td><?php  echo $data['enroll'] ?></td>
      <td><a class="link-dark text-decoration-none" href="viewstudent.php?id=<?php echo $data['enroll']?>"><?php  echo $data['fname']." ".$data['lname'] ?></a></td>
      <td><?php  echo $data['college'] ?></td>
      <td><a class="link-primary text-decoration-none" href="editstudent.php?id=<?php echo $data['id']?>">edit</a></td>
      <td><a class="link-danger text-decoration-none" href="deletestudent.php?id=<?php echo $data['id']?>">delete</a></td>
    </tr>


<?php }}} 
showstudents();

?>

     </tbody>
</table>
</div>

<?php include('footer.php'); 

}
else
{
?>
  <script type="text/javascript">  window.open('index.php','_self'); </script>
<?php
}  

?>


