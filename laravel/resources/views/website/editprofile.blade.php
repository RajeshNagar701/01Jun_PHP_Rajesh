
@extends('website.layout.structure')

@section('main_container')
  <!-- contact section -->

  <section class=" layout_padding">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Edit Profile
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        
        <div class="col-md-6 col-lg-6 offset-md-3 px-0">	
          <form action="{{url('/profile/'.$data->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			<div>
              <input type="text" name="name" placeholder="Name" value="{{$data->name}}" class="form-control" /><br>
            </div>
            <div>
              <input type="email" name="email" placeholder="Email" value="{{$data->email}}" class="form-control" /><br>
            </div>
			<div>
              <input type="text" name="username" placeholder="User Name" value="{{$data->username}}" class="form-control" /><br>
            </div>
			Gender: 
			<div>
			 
              Male: <input type="radio" name="gen" value="Male" <?php if($data->gen=="Male") { echo "checked";}?> />
			  Female: <input type="radio" name="gen" value="Female" <?php if($data->gen=="Female") { echo "checked";}?> />
            </div>
			<br>
			lag: 
			<div>
              Hindi: <input type="checkbox" name="lag[]" value="Hindi" 
			  <?php 
				$lag=$data->lag;
				$lag_arr=explode(",",$lag);
				if(in_array("Hindi",$lag_arr))
				{
					echo "checked";
				}?> />
			  English: <input type="checkbox" name="lag[]" value="English" 
			  <?php 
				$lag=$data->lag;
				$lag_arr=explode(",",$lag);
				if(in_array("English",$lag_arr))
				{
					echo "checked";
				}?>/>
			  Gujarati: <input type="checkbox" name="lag[]" value="Gujarati" 
			  <?php 
				$lag=$data->lag;
				$lag_arr=explode(",",$lag);
				if(in_array("Gujarati",$lag_arr))
				{
					echo "checked";
				}?>/> 
            </div>
			<br>
			<div>
              <input type="number" name="mobile" value="{{$data->mobile}}"  placeholder="mobile" class="form-control" /><br>
            </div>
			<br>
			<div>
				Country: 	
				<select name="cid" class="form-control" />
					<option>Select Country</option>
					@if(!empty($country))
						@foreach($country as $c)
							@if($c->id==$data->cid)
							<option value="{{$c->id}}" selected>{{$c->cnm}}</option>
							@else
							<option value="{{$c->id}}">{{$c->cnm}}</option>
							@endif
						@endforeach
					@endif	
				</select>
            </div>
			 <br>
			<div>
              <input type="file" name="file" class="form-control" /><br>
			  <img src="{{url('upload/customer/'.$data->file)}}" width="50px" alt="">
            </div>
            <br>
            <div class="d-flex ">
              <input type="submit" name="submit" value="Save" class="btn btn-danger">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
@endsection
  