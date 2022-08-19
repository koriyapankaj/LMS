<?php

session_start();

if(!isset($_SESSION['admin_id']))
{
    header('location:index.php');

}
else{
    
    if(isset($_POST['submit']))
    {

        $id=$_POST['id'];

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
        $address=$_POST['address'];
        $tags=$enroll." ".$email." ".$fname." ".$mname." ".$lname." ".$DOB." ".$mo." ".$gender." ".$college." ".$course." ".$sem." ".$address;
        $picture=$_FILES['picture']['name'];
        $picture_tmp_name=$_FILES['picture']['tmp_name'];

        if($picture == '')
        {
            $picture='default.png';
        }
        
        move_uploaded_file($picture_tmp_name,"../student/image/$picture");

    
        include('../dbcon.php');
        
        $query="UPDATE `students` SET `enroll`='$enroll',`fname`='$fname',`mname`='$mname',`lname`='$lname',`college`='$college',`course`='$course',`sem`='$sem',`DOB`='$DOB',`address`='$address',`mo`='$mo',`email`='$email',`gender`='$gender',`picture`='$picture',`tags`='$tags' WHERE `id`='$id'";


        $run=mysqli_query($con,$query);

        if($run)
        {
        ?>
        
        <script>alert('Student updated.');window.open('students.php','_self')</script>
        
        <?php
        }
        else{
            ?>
        
        <script>alert('something went wrong !!!');window.open('students.php','_self')</script>
        
        <?php
        }



    }
    else{
        ?>
        
        <script>alert('something went wrong !!!');window.open('students.php','_self')</script>
        
        <?php
    }

}


?>