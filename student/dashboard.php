<?php
include('header.php');
include('../dbcon.php');


    //  total books
    $query1="SELECT * FROM `books`";  
    $run=mysqli_query($con,$query1);
    $total_books=mysqli_num_rows($run);
    // 

    //  total e-books
    $query2="SELECT * FROM `ebooks`";  
    $run2=mysqli_query($con,$query2);
    $total_ebooks=mysqli_num_rows($run2);
    // 

   
    
    



     ?>
     
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>


      <div class="container">



      <div class="row">


<div class="col-3">
     <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">Total Books</div>
          <div class="card-body">
               <h1 class="card-title"><?php echo $total_books; ?></h1>
          </div>
     </div>
</div>

<div class="col-3">
     <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
          <div class="card-header">Total e-Books</div>
          <div class="card-body">
               <h1 class="card-title"><?php echo $total_ebooks; ?></h1>
          </div>
     </div>
</div>



<div class="col-3">
     <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
          <div class="card-header">&nbsp;</div>
          <div class="card-body">
               <h1 class="card-title">&nbsp;</h1>
          </div>
     </div>
</div>

<div class="col-3">
     <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">&nbsp;</div>
          <div class="card-body">
               <h1 class="card-title">&nbsp;</h1>
          </div>
     </div>
</div>





      </div>

      

      </div>
     
     
     <?php

     include('footer.php');

     
     ?>
    
