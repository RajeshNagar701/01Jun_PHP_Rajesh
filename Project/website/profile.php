<?php
include_once('header.php');
?>


  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="custom_heading-container ">
        <h2>
          My Account
        </h2>
      </div>

     
      <img src="upload/customers/<?php echo $fetch->file;?>" alt="" width="200px">
      <br>
      <div class="detail-box">
	  
        <p><b>ID :</b> <?php echo $fetch->uid;?></p>
		<p><b>Name :</b> <?php echo $fetch->name;?></p>
		<p><b>Email :</b> <?php echo $fetch->email;?></p>
		<p><b>Gender :</b> <?php echo $fetch->gender;?></p>
		<p><b>launguages :</b> <?php echo $fetch->launguages;?></p>
        <div class="d-flex justify-content-center">
          <a href="edituser?edituid=<?php echo $fetch->uid;?>">
            Edit Profile
          </a>
        </div>
      </div>
    </div>
  </section>



 <?php
include_once('footer.php');
?>