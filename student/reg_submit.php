<?php
session_start();
include('../dbcon.php');


if(isset($_SESSION['student_id']))
{
    header('location:index.php');

}
else{
    
    if(isset($_POST['submit']))
    {

        // check user exist or not 
        $enroll=$_POST['enroll'];


        $check_query="SELECT * FROM `students` WHERE `enroll`='$enroll'";
        $run_check=mysqli_query($con,$check_query);
        $row=mysqli_num_rows($run_check);
  
        if ($row <1) 
        {
      
        $enroll=$_POST['enroll'];
        $email=$_POST['email'];
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $DOB=$_POST['DOB'];
        $mo=$_POST['mo'];
        $gender=$_POST['gender'];
        $college=$_POST['college'];
        $course=$_POST['course'];
        $sem=$_POST['sem'];
        $pass=$_POST['pass'];
        $address=$_POST['address'];
        $tags=$enroll." ".$email." ".$fname." ".$mname." ".$lname." ".$DOB." ".$mo." ".$gender." ".$college." ".$course." ".$sem." ".$address;
        $picture=$_FILES['picture']['name'];
        $picture_tmp_name=$_FILES['picture']['tmp_name'];

        if($picture == '')
        {
            $picture='default.png';
        }
        
        move_uploaded_file($picture_tmp_name,"../student/image/$picture");



        $query="INSERT INTO `students`(`enroll`, `fname`, `mname`, `lname`, `college`, `course`, `sem`, `DOB`, `address`, `mo`, `email`, `gender`, `picture`, `password`, `tags`) VALUES ('$enroll','$fname','$mname','$lname','$college','$course','$sem','$DOB','$address','$mo','$email','$gender','$picture','$pass','$tags')";

        $run=mysqli_query($con,$query);

        if($run)
        {
        ?>
        
        <script>alert('Account created.');window.open('index.php','_self')</script>
        
        <?php
        }
        else{
            ?>
        
        <script>alert('something went wrong !!!');window.open('reg.php','_self')</script>
        
        <?php
        }


    }
    else{
        ?>
        <script type="text/javascript">  alert('Enrollment no is Already Register !!!'); window.open('reg.php','_self'); </script>
      <?php
    }
    }
    else{
        ?>
        
        <script>alert('something went wrong !!!');window.open('reg.php','_self')</script>
        
        <?php
    }

}


?>