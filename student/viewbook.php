<?php include('header.php'); 


if(isset($_GET['id']))
{

  $id=$_GET['id'];

include('../dbcon.php');


  $query3="SELECT * FROM `books` WHERE `ISBN`='$id'";  


$run3=mysqli_query($con,$query3);
$data3=mysqli_fetch_assoc($run3);





?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Book Details</h1>
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      

      <!-- ////////////// -->



  <section style="background-color: #eee;">
  <div class="container py-5">
    

    <div class="row">

      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ISBN</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['ISBN']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Book Title</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['title']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Author</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['author']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Publisher</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['publisher']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Category</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['category']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Price</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['price']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['date']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Quantity</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data3['quantity']; ?></p>
              </div>
            </div>
            
          </div>
        </div>

      </div>

    </div>
  </div>
</section>




      <!-- ////////////// -->


        
      </div>
      </div>






<?php include('footer.php'); 

    }
    else{

    }

?>
