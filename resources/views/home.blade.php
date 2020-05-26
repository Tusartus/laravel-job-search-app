



@extends('layouts.app')

@section('content')


<div class="site-blocks-cover overlay inner-page h-75" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-6 text-center" data-aos="fade">


        @if(Auth::user()->user_type=='seeker')
  <h1 class="h3 mb-0">you can apply fo any jobs you want.<a class="btn btn-light" href="{{url("/")}}">Find Jobs</a></h1>
        <p class="h3 text-white mb-5">Welcome:{{Auth::user()->name}}   You're logged in</p>
        <p class="h3 text-white mb-5">Your Email:{{Auth::user()->email}}</p>


        @endif


        <p><a href="{{url('/')}}" class="btn btn-outline-success py-3 px-4">Find jobs</a> <a href="{{route('company')}}" class="btn btn-outline-warning py-3 px-4">All companies</a></p>

      </div>
    </div>
  </div>
</div>



<div class="container">
    <div class="row justify-content-center bg-info">
        <div class="col-md-10 m-5">



          <div class="text-center mb-5 section-heading">
            <h2>Why Choose Us</h2>
          </div>

          <div class="d-block d-md-flex border-bottom">
            <div class="text-center p-4 item border-right" data-aos="fade">
              <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>
              <h2 class="h4">More Jobs Every Day</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>


            </div>
            <div class="text-center p-4 item" data-aos="fade">
              <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
              <h2 class="h4"> Accompaniment for your Jobs</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>


            </div>
          </div>
          <div class="d-block d-md-flex">
            <div class="text-center p-4 item border-right" data-aos="fade">
              <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
              <h2 class="h4">Healthcare</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>


            </div>
            <div class="text-center p-4 item" data-aos="fade">
              <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>
              <h2 class="h4">Finance &amp; Accounting</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>

            </div>
          </div>







        </div>

    </div>
</div>






<div class="site-blocks-cover overlay inner-page h-75" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-6 text-center" data-aos="fade">


        @if(Auth::user()->user_type=='seeker')
  <h1 class="h3 mb-0">you can apply fo any jobs you want.<a class="btn btn-light" href="{{url("/")}}">Find Jobs</a></h1>
        <p class="h3 text-white mb-5">Welcome:{{Auth::user()->name}}   You're logged in</p>
        <p class="h3 text-white mb-5">Your Email:{{Auth::user()->email}}</p>


        @endif


        <p><a href="{{url('/')}}" class="btn btn-outline-success py-3 px-4">Find jobs</a> <a href="{{route('company')}}" class="btn btn-outline-warning py-3 px-4">All companies</a></p>

      </div>
    </div>
  </div>
</div>







@endsection
