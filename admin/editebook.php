<?php 
session_start();
if(isset($_SESSION['admin_id']))
{
include('header.php');
include('../dbcon.php');


$id=$_GET['id'];



$query="SELECT * FROM `ebooks` WHERE `id`='$id'";
$run=mysqli_query($con,$query);

$data=mysqli_fetch_assoc($run);

?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit e-Book</h1>
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      
        <form class="needs-validation" method="post" enctype="multipart/form-data" action="ebookupdate.php" >
          <div class="row g-3">
            

            <div class="col-sm-6">
              <label for="title" class="form-label">Book Title</label>
              <input type="text" value="<?php echo $data['title']; ?>" class="form-control" name="title" id="title" placeholder="" required>
              <div class="invalid-feedback">
                Book title is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="author" class="form-label">Author</label>
              <input type="text" value="<?php echo $data['author']; ?>" class="form-control" name="author" id="author" placeholder="" required>
              <div class="invalid-feedback">
                Valid Author name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="publisher" class="form-label">Publisher</label>
              <input type="text" class="form-control" value="<?php echo $data['publisher']; ?>" name="publisher" id="publisher" placeholder="" required>
              <div class="invalid-feedback">
                valid Publisher is required.
              </div>
            </div>

        
            <!-- md-5 -->
            <div class="col-md-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category" id="category" required>
                <option value="<?php echo $data['category']; ?>" selected><?php echo $data['category']; ?></option>
                <option>C++</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Category.
              </div>
            </div>

         
            <div class="col-md-6">
              <label for="tag" class="form-label">Tags</label>
              <input type="text" name="tag" value="<?php echo $data['tag']; ?>" class="form-control" id="tag" placeholder="">
              
            </div>
            <div class="col-md-12">
              <label for="ebook" class="form-label">Upload E-book</label>
              <input type="file" name="ebook" class="form-control" id="ebook">
            </div>
          </div>

          <input type="hidden" value="<?php echo $data['id']; ?>" name="id">

          <hr class="my-4">


          <button name="submit" class="w-100 mb-5 btn btn-primary btn-lg" type="submit">Update e-Book</button>
        </form>
      </div>
      </div>






<?php include('footer.php'); 
}
else
{
?>
  <script type="text/javascript">  window.open('index.php','_self'); </script>
<?php
}  
?>
