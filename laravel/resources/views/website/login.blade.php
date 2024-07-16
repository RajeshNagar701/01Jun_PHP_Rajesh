
@extends('website.layout.structure')

@section('main_container')
  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Login Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        
        <div class="col-md-6 col-lg-6 offset-md-3 px-0">
		   @if ($errors->any())
				<div class="alert alert-danger mt-5">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
	
          <form action="{{url('/login_auth')}}" method="post">
			@csrf
            <div>
              <input type="email" name="username" value="{{ old('username') }}" placeholder="Email" />
			  @error('username')
					<div class="alert alert-danger">{{ $message }}</div>
			  @enderror

			  
			  </span>
            </div>
            <div>
              <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
			  @error('password')
					<div class="alert alert-danger">{{ $message }}</div>
			  @enderror
            </div>
            
            <div class="d-flex ">
              <input type="submit" name="submit" value="Login" class="btn btn-danger">
			  <a href="signup">If you not register then click here for Signup</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->
@endsection
  