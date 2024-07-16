<?php
if(!($_SESSION['user']))
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
            Edit User
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
                <input type="text" name="name" value="<?php echo $fetch->name?>" class="form-control" id="exampleInputName1">
              </div>
             
			  <div class="form-group">
                <label for="exampleInputName1">Gender</label><br>
				
                Male:<input type="radio" name="gender" value="Male" <?php if($fetch->gender=="Male"){ echo "checked";}?>>
				Female:<input type="radio" name="gender" value="Female" <?php if($fetch->gender=="Female"){ echo "checked";}?>>
              </div>
			  <div class="form-group">
                <label for="exampleInputName1">Lag</label><br>
				
				<?php 
				$lag=$fetch->launguages;
				$lag_arr=explode(",",$lag);
				?>
				
				
                Hindi:<input type="checkbox" name="launguages[]" value="Hindi" <?php if(in_array("Hindi",$lag_arr)){ echo "checked";}?>>
				English:<input type="checkbox" name="launguages[]" value="English" <?php if(in_array("English",$lag_arr)){ echo "checked";}?>>
				Gujarati:<input type="checkbox" name="launguages[]" value="Gujarati" <?php if(in_array("Gujarati",$lag_arr)){ echo "checked";}?>>
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
						  if($c->cid==$fetch->cid)
						  {
						?>  
						<option value="<?php echo $c->cid?>" selected><?php echo $c->cnm?></option>
						<?php  
						  }
						  else
						  {
						?>  
						<option value="<?php echo $c->cid?>"><?php echo $c->cnm?></option>
						<?php 	  
						}
					  }
				  }
				  ?>
                
                </select>
              </div>
			  <div class="form-group">
                <label for="exampleInputName1">Image Upload</label>
                <input type="file" name="file" class="form-control" >
				 <img src="upload/customers/<?php echo $fetch->file;?>" alt="" width="40px">
              </div>
            
			
              <button type="submit" name="save" class="">Save</button>
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