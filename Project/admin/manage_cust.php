

<?php
include_once('header.php');
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Manage Customer</h1>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Customer
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
											<th>Profile</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
										if(!empty($data_customer))
										{
											foreach($data_customer as $d)
											{
											?>
											<tr>
												<td><img src="../website/upload/customers/<?php echo $d->file;?>" width="50px"></td>
												<td><?php echo $d->uid;?></td>
												<td><?php echo $d->name;?></td>
												<td><?php echo $d->email;?></td>
												<td><?php echo $d->gender;?></td>
												<td>
													<a href="status?statusuid=<?php echo $d->uid;?>" class="btn btn-success me-1"><?php echo $d->status;?></a>
													<a href="delete?deluid=<?php echo $d->uid;?>" class="btn btn-danger me-1">Delete</a>		
													<a href="" class="btn btn-primary me-1">Edit</a>
												</td>
											</tr>
										<?php
											}
										}
										else
										{
										?>
											
											<tr>
												<td> DATA NO FOUND </td>
											</tr>	
										<?php
										}
										?>
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
          
            </div>
      
               
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
<?php
include_once('footer.php');
?>