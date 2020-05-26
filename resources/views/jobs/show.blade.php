@extends('layouts.app')

@section('content')



<div class="site-blocks-cover overlay inner-page" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center" data-aos="fade">
            <h1 class="h3 mb-0">Your Dream Job</h1>
            <p class="h3 text-dark mb-5">Is Waiting For You   </p>


          </div>
        </div>
      </div>
    </div>

<hr>

<div class="container">
    <div class="row ">

      @if(Session::has('message'))
     <div class="col-md-12 m-3">
            <div class="alert alert-success m-2">{{Session::get('message')}}</div>
            @endif
              @if(Session::has('err_message'))

            <div class="alert alert-danger m-2">{{Session::get('err_message')}}</div>
            @endif
            @if(isset($errors)&&count($errors)>0)
            <div class="alert alert-danger m-2">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
        </div>

            @endif



   <div class="col-md-7">

     <div class="ca p-2">
         <div class="card-header">{{$job->title}}</div>

         <div class="card-body">
           <div class="p-4 mb-8 bg-white">
  <!-- icon-book mr-3-->
  <h3 class="h5 text-black mb-3"><i class="fa fa-book" style="color: blue;">&nbsp;</i>Description <a class="float-right" href="#"data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-envelope-square" style="font-size: 34px;float:right;color:green;"></i> send this to someone</a></h3>
  <p> {{$job->description}}.</p>

           </div>
<div class="p-4 mb-8 bg-white">
  <!--icon-align-left mr-3-->
  <h3 class="h5 text-black mb-3"><i class="fa fa-user" style="color: blue;">&nbsp;</i>Roles and Responsibilities</h3>
  <p>{{$job->roles}} .</p>

</div>


           </div><!-- end carrd body-->
          </div>


                      <!-- Modal -->
          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Send job to your friend</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <form action="{{route('mail')}}" method="POST">@csrf
                <div class="modal-body">
                  <input type="hidden" name="job_id" value="{{$job->id}}">
                  <input type="hidden" name="job_slug" value="{{$job->slug}}">

                  <div class="form-goup">
                    <label>Your name * </label>
                    <input type="text" name="your_name" class="form-control" required="">
                  </div>
                  <div class="form-goup">
                    <label>Your email *</label>
                    <input type="email" name="your_email" class="form-control" required="">
                  </div>
                  <div class="form-goup">
                    <label>Person name *</label>
                    <input type="text" name="friend_name" class="form-control" required="">
                  </div>
                  <div class="form-goup">
                    <label>Person email *</label>
                    <input type="email" name="friend_email" class="form-control" required="">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Mail this job</button>
                </div>
              </form>

              </div>
            </div>
          </div>



          <br>
          <br>
          <br>

  </div><!-- iend col-md-7-->

  <div class="col-md-4">
    <div class="car p-1">
        <div class="card-header">Short Info</div>

        <div class="card-body">
            <p>Company:<a href="{{route('company.index',[$job->company->id,$job->company->slug])}}"> {{$job->company->cname}}</a><p>
            <p>Address:{{$job->address}}</p>
            <p>Employment Type:{{$job->type}}</p>
            <p>Position:{{$job->position}}</p>
            <p>Posted:{{$job->created_at->diffForHumans()}}</p>
            <p>Last date to apply:{{ date('F d, Y', strtotime($job->last_date)) }}</p>

       <p>
 @if(Auth::check()&&Auth::user()->user_type=='seeker')


     @if(!$job->checkApplication())

     <form action="{{route('apply',[$job->id])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success" style="width:100%;">Apply</button>
     </form>
     @else
<center class="btn btn-info"><span style="color:#000;">You applied this job</span></center>
      @endif


     @else

         Please login to apply this job

     @endif

       </p>





    <br>
          </div>

 </div><!-- iend col-md-4-->





    </div><!-- iend row-->
  </div>



   <div class="site-blocks-cover overlay inner-page bg-info">


       <div class="row align-items-center justify-content-center">
         <div class="col-md-12 text-center" data-aos="fade">
           <h1 class="h3 mb-0">Your Dream Job</h1>
           <p class="h3 text-white mb-5">Is Waiting For You</p>


         </div>
       </div>
     </div>
   </div>



@endsection
