<?php
session_start();
if(isset($_SESSION['admin_id']))
{
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

    //  issued books
    $query3="SELECT * FROM `book_issue` WHERE `status`='issued'";  
    $run3=mysqli_query($con,$query3);
    $issued_books=mysqli_num_rows($run3);
    // 

    //  lost books
    $query4="SELECT * FROM `book_issue` WHERE `status`='lost'";  
    $run4=mysqli_query($con,$query4);
    $lost_books=mysqli_num_rows($run4);
    // 

    //  total students
    $query5="SELECT * FROM `students`";  
    $run5=mysqli_query($con,$query5);
    $total_students=mysqli_num_rows($run5);
    // 

    //  new message
    $query6="SELECT * FROM `contact` WHERE `mark`='unread'";  
    $run6=mysqli_query($con,$query6);
    $message=mysqli_num_rows($run6);
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
               <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Issued Books</div>
                    <div class="card-body">
                         <h1 class="card-title"><?php echo $issued_books; ?></h1>
                    </div>
               </div>
          </div>

          <div class="col-3">
               <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Lost Book copies</div>
                    <div class="card-body">
                         <h1 class="card-title"><?php echo $lost_books; ?></h1>
                    </div>
               </div>
          </div>

          <div class="col-3">
               <div class="card text-dark bg-muted mb-3" style="max-width: 18rem;">
                    <div class="card-header">&nbsp;</div>
                    <div class="card-body">
                         <h1 class="card-title">&nbsp;</h1>
                    </div>
               </div>
          </div>

          <div class="col-3">
               <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">&nbsp;</div>
                    <div class="card-body">
                         <h1 class="card-title">&nbsp;</h1>
                    </div>
               </div>
          </div>

          <div class="col-3">
               <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Total Students</div>
                    <div class="card-body">
                         <h1 class="card-title"><?php echo $total_students; ?></h1>
                    </div>
               </div>
          </div>

          <div class="col-3">
               <a href="new_messages.php" class="text-decoration-none">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">New Messages</div>
                    <div class="card-body">
                         <h1 class="card-title"><?php echo $message; ?></h1>
                    </div>
               </div>
               </a>
          </div>




                </div>
     
           </div>
          
          
          <?php
     

     include('footer.php');

     // //////////////
}
      else
      {
	 ?>
        <script type="text/javascript">  window.open('index.php','_self'); </script>
      <?php
      }  

     //  ///////////////

     ?>
    
