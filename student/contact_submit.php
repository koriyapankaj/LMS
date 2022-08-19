<?php
session_start();
include('../dbcon.php');


if(!isset($_SESSION['student_id']))
{
    header('location:index.php');

}
else{
    
    if(isset($_POST['submit']))
    {


        $stu_id=$_SESSION['student_id'];


        // find enroll
        $query1="SELECT * FROM `students` WHERE `id`='$stu_id'";  
        $run1=mysqli_query($con,$query1);
        $data1=mysqli_fetch_assoc($run1);
        $enroll=$data1['enroll'];
        // 



        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $date=date("d-m-Y");
        
        $query="INSERT INTO `contact`(`student_id`, `subject`, `message`, `date`, `mark`) VALUES ('$enroll','$subject','$message','$date','unread')";

        $run=mysqli_query($con,$query);

        if($run)
        {
        ?>
        
        <script>alert('Message Sent.');window.open('contact.php','_self')</script>
        
        <?php
        }
        else{
            ?>
        
        <script>alert('something went wrong !!!');window.open('contact.php','_self')</script>
        
        <?php
        }



    }
    else{
        ?>
        
        <script>alert('something went wrong !!!');window.open('contact.php','_self')</script>
        
        <?php
    }

}


?>