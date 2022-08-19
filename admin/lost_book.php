<?php
session_start();
if(isset($_SESSION['admin_id']))
{

include('../dbcon.php');


$id=$_GET['id'];
$book_id=$_GET['bookid'];
$stu_id=$_GET['stuid'];


$date=date("d-m-Y");
$time=date("h:i:s");


//check price
$query_for_check="SELECT * FROM `books` WHERE `ISBN`='$book_id'";  
$run=mysqli_query($con,$query_for_check);
$data=mysqli_fetch_assoc($run);

$cost=$data['price'];
   
$query="UPDATE `book_issue` SET `status`='lost',`return_date`='$date',`return_time`='$time',`fine`='$cost' WHERE `id`='$id'";







$query2="UPDATE `books` SET `lost`=lost+1 WHERE `ISBN`='$book_id'";


mysqli_query($con,$query);
mysqli_query($con,$query2);


    
?>
<script type="text/javascript"> 
window.open('issue_report.php?id=<?php echo $stu_id; ?>','_self');
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

