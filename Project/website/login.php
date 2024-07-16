<?php

if(isset($_SESSION['user']))
{	
	echo "<script> 
		window.location='index';
	</script>";
}			
include_once('header.php');
?>



  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="custom_heading-container ">
          <h2>
            Login Here
          </h2>
        </div>
      </div>
    </div>
    <div class="container layout_padding2">
      <div class="row">
        <div class="offset-md-3 col-md-6">
          <div class="form_contaier">
            <form action="" method="post">
             
              <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1">
              </div>
			  <div class="form-group">
                <label for="exampleInputName1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputName1">
              </div>
			 
              <button type="submit" name="submit" class="">Login</button>
			  <a class="float-right" href="signup" >If You not Register then Click Signup</a>
            </form>
          </div>
        </div>
       
      </div>
    </div>
  </section>

  <!-- end contact section -->

 <?php
 include_once('footer.php');
 ?>