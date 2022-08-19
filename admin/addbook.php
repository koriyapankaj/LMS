<?php 
session_start();
if(isset($_SESSION['admin_id']))
{
include('header.php'); ?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Book</h1>
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      
        <form class="needs-validation" method="post" action="booksubmit.php" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="isbn" class="form-label">ISBN</label>
              <input type="number" class="form-control" name="isbn" id="isbn" max="9999999999999"  required>
              <div class="invalid-feedback">
                Valid ISBN no is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="title" class="form-label">Book Title</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="" required>
              <div class="invalid-feedback">
                Book title is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="author" class="form-label">Author</label>
              <input type="text" class="form-control" name="author" id="author" placeholder="" required>
              <div class="invalid-feedback">
                Valid Author name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="publisher" class="form-label">Publisher</label>
              <input type="text" class="form-control" name="publisher" id="publisher" placeholder="" required>
              <div class="invalid-feedback">
                valid Publisher is required.
              </div>
            </div>

        
            <!-- md-5 -->
            <div class="col-md-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category" id="category" required>
                <option value="">Choose...</option>
                <option>C++</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid Category.
              </div>
            </div>

            <div class="col-md-2">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="quantity" id="quantity" min="1" required>
              <div class="invalid-feedback">
                Please select a valid Quantity.
              </div>
            </div>

            <div class="col-md-2">
              <label for="price" class="form-label">price</label>
              <input type="number" name="price" class="form-control" id="price" min="1" max="20000" required>
              
            </div>
          

            <div class="col-md-5">
              <label for="tag" class="form-label">Tags</label>
              <input type="text" name="tag" class="form-control" id="tag">
              
            </div>
          </div>

          <hr class="my-4">


          <button name="submit" class="w-100 mb-5 btn btn-primary btn-lg" type="submit">Add Book</button>
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
