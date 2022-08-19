<?php include('header.php'); ?>



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Contact to Library</h1>
      </div>


      <div class="container">
      
    
      <div class="col-md-9 col-lg-10">
      
        <form class="needs-validation" method="post" action="contact_submit.php" >
          <div class="row g-3">
            

            <div class="col-sm-12">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" placeholder="" required>
              <div class="invalid-feedback">
                subject is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" name="message" id="message" cols="30" rows="8" required></textarea>
            </div>
        
           

            

            <!-- md-3 -->
            
          </div>

          <hr class="my-4">


          <button name="submit" class="w-100 mb-5 btn btn-primary btn-lg" type="submit">Send Message</button>
        </form>
      </div>
      </div>






<?php include('footer.php'); ?>
