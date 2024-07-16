
@extends('admin.layout.structure')

@section('main_container')
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Manage Employee</h1>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Employee
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
											<th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
										if(!empty($data_employees))
										{
											foreach($data_employees as $d)
											{
											?>
											<tr>
												<td><?php echo $d->emp_id;?></td>
												<td><?php echo $d->name;?></td>
												<td><?php echo $d->email;?></td>
												<td><?php echo $d->status;?></td>
												<td>
													<a href="delete?delemp_id=<?php echo $d->emp_id;?>" class="btn btn-danger me-1">Delete</a>		
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
@endsection	
