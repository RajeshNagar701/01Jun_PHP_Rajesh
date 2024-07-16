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
            Signup Here
          </h2>
        </div>
      </div>
    </div>
    <div class="container layout_padding2">
      <div class="row">
        <div class="offset-md-3 col-md-6">
          <div class="form_contaier">
		  
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1">
              </div>
			  <div class="form-group">
                <label for="exampleInputName1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputName1">
              </div>
			  <div class="form-group">
                <label for="exampleInputName1">Gender</label><br>
                Male:<input type="radio" name="gender" value="Male">
				Female:<input type="radio" name="gender" value="Female">
              </div>
			  <div class="form-group">
                <label for="exampleInputName1">Lag</label><br>
                Hindi:<input type="checkbox" name="launguages[]" value="Hindi"  >
				English:<input type="checkbox" name="launguages[]" value="English">
				Gujarati:<input type="checkbox" name="launguages[]" value="Gujarati">
              </div>
			  
              <div class="form-group ">
                <label for="inputState">Country</label>
                <select id="inputState" name="cid" class="form-control">
                  <option value="">Select Country</option>
				  <?php
				  if(!empty($countries_arr))
				  {
					  foreach($countries_arr as $c)
					  {
						?>  
						<option value="<?php echo $c->cid?>"><?php echo $c->cnm?></option>
						<?php  
					  }
				  }
				  ?>
                
                </select>
              </div>
			  <div class="form-group">
                <label for="exampleInputName1">Image Upload</label>
                <input type="file" name="file" class="form-control" >
              </div>
            
			
              <button type="submit" name="submit" class="">Signup</button>
			  <a class="float-right" href="login" >If You allready Register then Click Login</a>
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