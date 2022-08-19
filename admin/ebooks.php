<?php 
session_start();
if(isset($_SESSION['admin_id']))
{
include('header.php'); 

?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 col-md-8">E-books</h1>
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
            <a href="addebook.php" class="btn btn-sm btn-outline-secondary">Add E-book</a>
           
          </div>
          
        </div>
      </div>



      

<div class="table-responsive">
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Book title</th>
      <th scope="col">author</th>
      <th scope="col">publisher</th>
      <th scope="col">date</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
      <th scope="col">view</th>
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
  $query="SELECT * FROM `ebooks` WHERE `tag` LIKE '%$search_key%'";  
  }
  else{
    
    $query="SELECT * FROM `ebooks`";  

  }
}

else{

$query="SELECT * FROM `ebooks`";  

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

			?>


    <tr>
      <td><?php  echo $count; ?></td>
      <td><?php  echo $data['title'] ?></td>
      <td><?php  echo $data['author'] ?></td>
      <td><?php  echo $data['publisher'] ?></td>
      <td><?php  echo $data['date'] ?></td>
      
      <td><a class="link-primary text-decoration-none" href="editebook.php?id=<?php echo $data['id']?>">edit</a></td>
      <td><a class="link-danger text-decoration-none" href="deleteebook.php?id=<?php echo $data['id']?>">delete</a></td>
      <td><a class="link-success text-decoration-none" target="__blank" href="../ebooks/<?php echo $data['file']?>">view</a></td>
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


