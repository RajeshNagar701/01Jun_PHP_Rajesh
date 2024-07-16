
@extends('admin.layout.structure')

@section('main_container')
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Manage Contacts</h1>
                        
                    </div>
                </div>
                <!-- /. ROW  -->
              
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Contacts
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
										if(!empty($data_contacts))
										{
											foreach($data_contacts as $d)
											{
											?>
											<tr>
												
												<td><?php echo $d->id;?></td>
												<td><?php echo $d->name;?></td>
												<td><?php echo $d->email;?></td>
												<td><?php echo $d->comment;?></td>
												<td>
													<a href="{{url('/manage_cont/'.$d->id)}}" class="btn btn-danger me-1">Delete</a>		
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
