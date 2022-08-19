<?php 
session_start();
if(isset($_SESSION['admin_id']))
{

if(isset($_POST['book']))
{


include("../dbcon.php");


$enroll=$_POST['enroll'];
$ex_date=$_POST['ex_date'];


$book_count=count($_POST["book"]);

$date=date("d-m-Y");
$time=date("h:i:s");


$j=0;     

for($j;$j<$book_count;$j++)
 {
     
      $book_id=$_POST["book"][$j];
      $query="INSERT INTO `book_issue`(`stu_id`, `book_id`, `status`, `issue_date`, `issue_time`, `expected_return_date`) VALUES ('$enroll','$book_id','issued','$date','$time','$ex_date')";
      $query2="UPDATE `books` SET `quantity`=quantity-1 WHERE `ISBN`='$book_id'";
      mysqli_query($con,$query);
      mysqli_query($con,$query2);


      
 }


    
?>
<script type="text/javascript"> 
alert('Book Issued');
window.open('issuebook.php','_self');
 </script>
<?php



    
}
else{
    
    
?>
<script type="text/javascript"> 
alert('please Enter a ISBN no');
window.open('issuebook.php','_self');
 </script>
<?php


}


}
else
{
?>
  <script type="text/javascript">  window.open('index.php','_self'); </script>
<?php
}  




?>