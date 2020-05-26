<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Job Finder &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
       <link rel="stylesheet" href="{{asset('external/fonts/icomoon/style.css')}}">

       <link rel="stylesheet" href="{{asset('external/css/bootstrap.min.css')}}">
       <link rel="stylesheet" href="{{asset('external/css/magnific-popup.css')}}">
       <link rel="stylesheet" href="{{asset('external/css/jquery-ui.css')}}">
       <link rel="stylesheet" href="{{asset('external/css/owl.carousel.min.css')}}">
       <link rel="stylesheet" href="{{asset('external/css/owl.theme.default.min.css')}}">
       <link rel="stylesheet" href="{{asset('external/css/bootstrap-datepicker.css')}}">
       <link rel="stylesheet" href="{{asset('external/css/animate.css')}}">

       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



       <link rel="stylesheet" href="{{asset('external/fonts/flaticon/font/flaticon.css')}}">

       <link rel="stylesheet" href="{{asset('external/css/aos.css')}}">

       <link rel="stylesheet" href="{{asset('external/css/style.css')}}">


  </head>
  <body>



  @include('partials.nav')

    @include('partials.hero')


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <search-component></search-component>
        </div>
<br>
<br>
        <h1>Recent Jobs</h1>

        <table class="table">

            <tbody>
                @foreach($jobs as $job)
                <tr>
            <td><img class="img-responsive" src="{{url('storage/uploads/logo/'.$job->company->logo)}}" width="80"></td>
                    <td>{{$job->position}}
                        <br>
                        <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{{$job->address}}</td>
                    <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;{{$job->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm">     Apply
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div>
      <a href="{{route('alljobs')}}">  <button class="btn btn-primary btn-lg" style="width: 100%;">Browse all jobs</button></a>
    </div>
    <br><br>
    <h1>Featured Companies</h1>

</div>

<div class="container">
<div class="row">

@foreach($companies as $company)
<div class="col-md-3 m-4">
    <div class="card" style="width: 18rem;">
        @if($company->logo)
            <img src="{{url('storage/uploads/logo/'.$company->logo)}}" width="60%">
            @else

        @endif
      <div class="card-body">
        <h5 class="card-title">{{$company->cname}}</h5>
        <p class="card-text">{{str_limit($company->description,40)}}</p>
       <center> <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-outline-primary ">Visit company</a></center>
      </div>
    </div>
</div>
@endforeach

</div>
</div>









 <div class="site-blocks-cover overlay inner-page" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
   <div class="container">
     <div class="row align-items-center justify-content-center">
       <div class="col-md-6 text-center" data-aos="fade">
         <h1 class="h3 mb-0">Your Dream Job</h1>
         <p class="h3 text-white mb-5">Is Waiting For You</p>
         <p><a href="/register" class="btn btn-outline-success py-3 px-4">Job seeker</a> <a href="{{route('employer.register')}}" class="btn btn-outline-warning py-3 px-4">Employer</a></p>

       </div>
     </div>
   </div>
 </div>



 <div class="site-section site-block-feature bg-light">
   <div class="container">

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
         <h2 class="h4">Creative Jobs</h2>
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



@include('partials.footer')
<style>
  .fas{
    color: green;
  }
</style>
</body>
</html>
