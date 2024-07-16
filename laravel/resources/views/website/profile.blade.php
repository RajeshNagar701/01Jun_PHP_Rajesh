
@extends('website.layout.structure')


@section('main_container')

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Manage Profile
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <section class="gift_section layout_padding-bottom">
    <div class="box ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <div class="img_container">
              <div class="img-box">
                <img src="{{url('upload/customer/'.$data->file)}}" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
				Name : {{$data->name}}<br>
                Email : {{$data->email}}
                </h2>
              </div>
              <p>Gender : {{$data->gen}}</p>
			  <p>Laungauges : {{$data->lag}}</p>
			  <p>Mobile : {{$data->mobile}}</p>
              <div class="btn-box">
                <a href="{{url('profile/'.$data->id )}}" class="btn2">
                  View Profile
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    </div>
  </section>
  <!-- end client section -->

@endsection  