<?php
session_start();
if(isset($_SESSION['admin_id']))
{
include('header.php');
include('../dbcon.php');


$id=$_GET['id'];



$query="SELECT * FROM `books` WHERE `id`='$id'";
$run=mysqli_query($con,$query);

$data=mysqli_fetch_assoc($run);

?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Book</h1>
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      
        <form class="needs-validation" method="post" action="bookupdate.php" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="isbn" class="form-label">ISBN</label>
              <input type="number" max="9999999999999" class="form-control" value="<?php echo $data['ISBN']; ?>" name="isbn" id="isbn" placeholder="" required>
              <div class="invalid-feedback">
                Valid ISBN no is required.
              </div>
            </div>

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
                <option value="js">js</option>
                <option value="java">java</option>
          

              </select>
              <div class="invalid-feedback">
                Please select a valid Category.
              </div>
            </div>

            <div class="col-md-2">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="number" value="<?php echo $data['quantity']; ?>" class="form-control" name="quantity" min="1" id="quantity" placeholder="" required>
              <div class="invalid-feedback">
                Please select a valid Quantity.
              </div>
            </div>

            <div class="col-md-2">
              <label for="price" class="form-label">price</label>
              <input type="number" name="price" value="<?php echo $data['price']; ?>"  class="form-control" id="price" min="1" max="20000" required>
              
            </div>

            <div class="col-md-5">
              <label for="tag" class="form-label">Tags</label>
              <input type="text" name="tag" value="<?php echo $data['tags']; ?>" class="form-control" id="tag" required>
              
            </div>
          </div>

          <input type="hidden" value="<?php echo $data['id']; ?>" name="id">

          <hr class="my-4">


          <button name="submit" class="w-100 mb-5 btn btn-primary btn-lg" type="submit">Update Book</button>
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
