
@extends('website.layout.structure')

@section('main_container')
  <!-- contact section -->

  <section class=" layout_padding">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Signup Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        
        <div class="col-md-6 col-lg-6 offset-md-3 px-0">
          <form action="{{url('/signup')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div>
              <input type="text" name="name" placeholder="Name" value="{{ old('name')}}" class="form-control" />
			  @error('name')
					<div class="alert alert-danger">{{ $message }}</div>
			  @enderror
			  <br>
            </div>
            <div>
              <input type="email" name="email" placeholder="Email" value="{{ old('email')}}" class="form-control" />
			  @error('email')
					<div class="alert alert-danger">{{ $message }}</div>
			  @enderror
			  <br>
            </div>
			<div>
              <input type="text" name="username" placeholder="User Name" value="{{ old('username')}}" class="form-control" />
			  @error('username')
					<div class="alert alert-danger">{{ $message }}</div>
			  @enderror
			  <br>
            </div>
            <div>
              <input type="password" name="password" placeholder="Password" value="{{ old('password')}}" class="form-control" />
			  @error('password')
					<div class="alert alert-danger">{{ $message }}</div>
			  @enderror
			  <br>
            </div>
			Gender: 
			<div>
              Male: <input type="radio" name="gen" value="Male" checked />
			  Female: <input type="radio" name="gen" value="Female" />
            </div>
			<br>
			lag: 
			<div>
              Hindi: <input type="checkbox" name="lag[]" value="Hindi" checked />
			  English: <input type="checkbox" name="lag[]" value="English" />
			  Gujarati: <input type="checkbox" name="lag[]" value="Gujarati" /> 
            </div>
			<br>
			<div>
              <input type="number" name="mobile" placeholder="mobile" value="{{ old('name')}}" class="form-control" />
			  @error('mobile')
					<div class="alert alert-danger">{{ $message }}</div>
			  @enderror
			  <br>
            </div>
			<br>
			<div>
				Country: 	
				<select name="cid" class="form-control" />
					<option>Select Country</option>
					@if(!empty($country))
						@foreach($country as $c)
						<option value="{{$c->id}}">{{$c->cnm}}</option>	
						@endforeach
					@endif	
				</select>
				
				 @error('cid')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
            </div>
			 <br>
			<div>
              <input type="file" name="file" class="form-control" />
				@error('file')
					<div class="alert alert-danger">{{ $message }}</div>
				@enderror
			  <br>
            </div>
            <br>
            <div class="d-flex ">
              <input type="submit" name="submit" value="Signup" class="btn btn-danger">
			  <a href="login">If you already registered then click here for Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
@endsection
  