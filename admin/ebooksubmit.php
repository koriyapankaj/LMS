<?php

session_start();

if(!isset($_SESSION['admin_id']))
{
    header('location:index.php');

}
else{
    
    if(isset($_POST['submit']))
    {


    
        $title=$_POST['title'];
        $author=$_POST['author'];
        $publisher=$_POST['publisher'];
        $category=$_POST['category'];
        
        $ebook=$_FILES['ebook']['name'];
        $ebook_tmp_name=$_FILES['ebook']['tmp_name'];

        move_uploaded_file($ebook_tmp_name,"../ebooks/$ebook");


    

        $date=date("d-m-Y");
        $tag=$_POST['tag']." ".$title." ".$author." ".$publisher." ".$category." ".$date;

        include('../dbcon.php');
        $query="INSERT INTO `ebooks`(`title`, `author`, `publisher`, `category`, `date`, `tag`, `file`) VALUES ('$title','$author','$publisher','$category','$date','$tag','$ebook')";

        $run=mysqli_query($con,$query);

        if($run)
        {
        ?>
        
        <script>alert('e-Book added.');window.open('addebook.php','_self')</script>
        
        <?php
        }
        else{
            ?>
        
        <script>alert('something went wrong !!!');window.open('addebook.php','_self')</script>
        
        <?php
        }



    }
    else{
        ?>
        
        <script>alert('something went wrong !!!');window.open('addebook.php','_self')</script>
        
        <?php
    }

}


?>