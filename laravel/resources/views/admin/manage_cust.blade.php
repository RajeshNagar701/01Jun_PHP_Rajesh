
@extends('admin.layout.structure')

@section('main_container')
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
                        <div class="panel-body table-responsive">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
											<th>Profile</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
											<th>Username</th>
                                            <th>Gender</th>
											<th>lag</th>
											<th>country</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                   					@if(!empty($data_customer))
											@foreach($data_customer as $d)
											<tr>
												<td><img src="{{url('/upload/customer/'.$d->file)}}" width="50px"></td>
												<td>{{$d->id}}</td>
												<td>{{$d->name}}</td>
												<td>{{$d->email}}</td>
												<td>{{$d->username}}</td>
												<td>{{$d->gen}}</td>
												
												<td>{{$d->lag}}</td>
												<td>{{$d->cnm}}</td>
												<td>
													<a href="" class="btn btn-success me-1">{{$d->status}}</a>
													<a href="{{url('/manage_cust/'.$d->id)}}" class="btn btn-danger me-1">Delete</a>		
													<a href="" class="btn btn-primary me-1">Edit</a>
												</td>
											</tr>
											@endforeach
											
									@else	
											<tr>
												<td> DATA NO FOUND </td>
											</tr>	
									@endif	
										
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
