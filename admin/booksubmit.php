<?php

session_start();

if(!isset($_SESSION['admin_id']))
{
    header('location:index.php');

}
else{
    
    if(isset($_POST['submit']))
    {


        $isbn=$_POST['isbn'];
        $title=$_POST['title'];
        $author=$_POST['author'];
        $publisher=$_POST['publisher'];
        $category=$_POST['category'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];


        $date=date("d-m-Y");
        $tag=$_POST['tag']." ".$isbn." ".$title." ".$author." ".$publisher." ".$category." ".$date;

        include('../dbcon.php');
        $query="INSERT INTO `books`(`ISBN`, `title`, `author`, `publisher`, `category`, `date`, `quantity`, `tags`, `price`) VALUES ('$isbn','$title','$author','$publisher','$category','$date','$quantity','$tag','$price')";

        $run=mysqli_query($con,$query);

        if($run)
        {
        ?>
        
        <script>alert('Book added.');window.open('addbook.php','_self')</script>
        
        <?php
        }
        else{
            ?>
        
        <script>alert('something went wrong !!!');window.open('addbook.php','_self')</script>
        
        <?php
        }



    }
    else{
        ?>
        
        <script>alert('something went wrong !!!');window.open('addbook.php','_self')</script>
        
        <?php
    }

}


?>