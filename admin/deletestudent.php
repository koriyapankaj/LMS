<?php
session_start();
if(isset($_SESSION['admin_id']))
{
include('../dbcon.php');


$id=$_REQUEST['id'];
$query="DELETE FROM `students` WHERE `id`=$id";


$run=mysqli_query($con,$query);


         
		  ?>
			<script type="text/javascript"> window.open('students.php','_Self'); 
            </script>
			<?php
		 
		
		 

		}
		else
		{
	   ?>
		  <script type="text/javascript">  window.open('index.php','_self'); </script>
		<?php
		}  

?>






