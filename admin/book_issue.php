<?php 
session_start();
if(isset($_SESSION['admin_id']))
{
include('header.php'); ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 col-md-8">Books Issue</h1>
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
            <a href="issuebook.php" class="btn btn-sm btn-outline-secondary">Issue Book</a>
           
          </div>
          
        </div>
      </div>



      

<div class="table-responsive">
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Enrollment</th>
      <th scope="col">Books</th>
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
  $query="SELECT DISTINCT stu_id FROM book_issue WHERE `stu_id` LIKE '%$search_key%' AND `status`='issued'";
  }
  else{
    
    $query="SELECT DISTINCT `stu_id` FROM book_issue WHERE `status`='issued'";  

  }
}

else{

$query="SELECT DISTINCT `stu_id` FROM book_issue WHERE `status`='issued'";  

}

function showbooks()
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

      $stu_id=$data['stu_id'];

      $query3="SELECT * FROM `book_issue` WHERE `stu_id`='$stu_id' AND `status`='issued'";
      
      $run3=mysqli_query($con,$query3);

      $qunt=mysqli_num_rows($run3);



			?>


    <tr>
      <td><?php  echo $count; ?></td>
      <td><a class="link-dark text-decoration-none" href="issue_report.php?id=<?php echo $stu_id; ?>"><?php  echo $stu_id; ?></a></td>
      <td><?php  echo $qunt; ?></td>
      
    </tr>


<?php }}} 
showbooks();

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


