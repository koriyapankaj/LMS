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

        $title=$_POST['title'];
        $author=$_POST['author'];
        $publisher=$_POST['publisher'];
        $category=$_POST['category'];

                
        $ebook=$_FILES['ebook']['name'];
        $ebook_tmp_name=$_FILES['ebook']['tmp_name'];

        move_uploaded_file($ebook_tmp_name,"../ebooks/$ebook");

        



    
        $tag=$_POST['tag']." ".$title." ".$author." ".$publisher." ".$category." ";

        include('../dbcon.php');

        if($ebook=='')
        {
        $query="UPDATE `ebooks` SET `title`='$title',`author`='$author',`publisher`='$publisher',`category`='$category',`tag`='$tag' WHERE `id`='$id'";
        }
        else
        {
        $query="UPDATE `ebooks` SET `title`='$title',`author`='$author',`publisher`='$publisher',`category`='$category',`tag`='$tag',`file`='$ebook' WHERE `id`='$id'";
        }
        


        $run=mysqli_query($con,$query);

        if($run)
        {
        ?>
        
        <script>alert('e-Book updated.');window.open('ebooks.php','_self')</script>
        
        <?php
        }
        else{
            ?>
        
        <script>alert('something went wrong !!!');window.open('ebooks.php','_self')</script>
        
        <?php
        }



    }
    else{
        ?>
        
        <script>alert('something went wrong !!!');window.open('ebooks.php','_self')</script>
        
        <?php
    }

}


?>