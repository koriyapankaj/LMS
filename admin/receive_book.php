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


//check late or not
$query_for_check="SELECT * FROM `book_issue` WHERE `id`='$id'";  
$run=mysqli_query($con,$query_for_check);
$data=mysqli_fetch_assoc($run);

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
                
                  }

if($temp>0)
{
$query="UPDATE `book_issue` SET `status`='late_received',`return_date`='$date',`return_time`='$time',`fine`='$temp' WHERE `id`='$id'";

}
else{
    
    $query="UPDATE `book_issue` SET `status`='received',`return_date`='$date',`return_time`='$time' WHERE `id`='$id'";

}





$query2="UPDATE `books` SET `quantity`=quantity+1 WHERE `ISBN`='$book_id'";


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

