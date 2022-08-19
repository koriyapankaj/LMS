<?php 
session_start();
if(isset($_SESSION['admin_id']))
{
include('header.php'); ?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Issue Book</h1>
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      
        <form class="needs-validation" method="post" action="issuesubmit.php" >




          <div class="row g-3" id="div_in">

          <div class="col-sm-8">
              <label for="enroll" class="form-label">Enrollment No.</label>
              <input type="number" class="form-control" name="enroll" id="enroll" placeholder="" required>
              <div class="invalid-feedback">
                Enrollment is required.
              </div>
            </div>

            <div class="col-sm-1">
            <button type="button" class="btn btn-success w-100 mt-4 btn-lg" id="add"><span class="fa fa-plus"></span></button>
            </div>

            <div class="col-sm-3">
              <label for="ex_date" class="form-label">Return Date.</label>
              <?php
                $cdate=date("Y-m-d");
                $ex_date=date("Y-m-d",strtotime($cdate.' + 15 days'));
              ?>
              <input type="date" class="form-control" name="ex_date" id="ex_date" value="<?php echo $ex_date; ?>" placeholder="" required>
              <div class="invalid-feedback">
                Date is required.
              </div>
            </div>

      
            <div class="col-sm-12">
              <label for="isbn" class="form-label">ISBN</label>
            </div>

            

          </div>

          <hr class="my-4">


          <button name="submit" class="w-100 mb-5 btn btn-primary btn-lg" type="submit">Add Book</button>
        </form>
      </div>
      </div>




<script src="../assets/dist/js/jquery.js"></script>
<script>
$(document).ready(function(){

  var i=1;

  $('#add').click(function(){

  
    i++;

    $('#div_in').append('<div class="col-sm-8 row'+i+'"><input type="number" class="form-control"  name="book[]" id="book" placeholder="" required> </div> <div class="col-sm-4  row'+i+'"><button type="button" class="btn btn-danger btn_remove" id="'+i+'"><span class="fa fa-trash" name="remove" ></span></button></div>');
  

  });

  $(document).on('click','.btn_remove',function(){
    var button_id=$(this).attr("id");
    $('.row'+button_id).remove();
  });

  
});

</script>







<?php include('footer.php'); 



}
else
{
?>
  <script type="text/javascript">  window.open('index.php','_self'); </script>
<?php
}  

?>
