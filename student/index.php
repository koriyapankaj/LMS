<?php
session_start();

if(!isset($_SESSION['student_id']))
{



?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Student login</title>    

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/admin_css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method="POST">
    <img class="mb-4" src="../assets/brand/login.png" alt="" width="72">
    <h1 class="h3 mb-3 fw-normal">Student Login</h1>

    <div class="form-floating">
      <input type="number" class="form-control" id="floatingInput" name="enroll" min="10000000000" max="99999999999" required placeholder="Enrollment">
      <label for="floatingInput">Enrollment</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <a href="reg.php" class="text-decoration-none">create an account</a>

   
    <button class="w-100 btn btn-lg btn-primary mt-3" name="login" type="submit">Sign in</button>
    
  </form>
</main>


    
  </body>
</html>


<?php

if (isset($_POST['login'])) 
{

  $enroll=$_POST['enroll'];
  $pass=$_POST['pass'];
  
  include('../dbcon.php');
  $query="SELECT * FROM `students` WHERE `enroll`='$enroll' AND `password`='$pass'";
  $run=mysqli_query($con,$query);
  $row=mysqli_num_rows($run);
  
  if ($row <1) 
    {
      ?>
        <script type="text/javascript">  alert('Enrollment no or password is incorrect !!!'); window.open('index.php','_self'); </script>
      <?php
    }
  else
    {
  
      $data=mysqli_fetch_assoc($run);
      $id=$data['id'];
  
     
  
      $_SESSION['student_id']=$id;

      ?>
        <script type="text/javascript">  window.open('dashboard.php','_self'); </script>
      <?php
      
    }
    
  
  }
  
}

else{

	header('location:dashboard.php');


}
?>