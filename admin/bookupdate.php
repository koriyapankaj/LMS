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

        $isbn=$_POST['isbn'];
        $title=$_POST['title'];
        $author=$_POST['author'];
        $publisher=$_POST['publisher'];
        $category=$_POST['category'];
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];


    
        $tag=$_POST['tag']." ".$isbn." ".$title." ".$author." ".$publisher." ".$category." ";

        include('../dbcon.php');
        
        $query="UPDATE `books` SET `ISBN`='$isbn',`title`='$title',`author`='$author',`publisher`='$publisher',`category`='$category',`quantity`='$quantity',`tags`='$tag',`price`='$price' WHERE `id`='$id'";


        $run=mysqli_query($con,$query);

        if($run)
        {
        ?>
        
        <script>alert('Book updated.');window.open('books.php','_self')</script>
        
        <?php
        }
        else{
            ?>
        
        <script>alert('something went wrong !!!');window.open('books.php','_self')</script>
        
        <?php
        }



    }
    else{
        ?>
        
        <script>alert('something went wrong !!!');window.open('books.php','_self')</script>
        
        <?php
    }

}


?>