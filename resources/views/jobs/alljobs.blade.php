@extends('layouts.app')
@section('content')


<div class="site-blocks-cover overlay inner-page h-75 bg-info" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-6 text-center" data-aos="fade">



  <h1 class="h3 mb-0">Search  any jobs</h1>
        <p class="h3 text-white mb-5"> Popular jobs , finance ,engeneering, consrtuction, logistic, ..ect</p>






      </div>
    </div>
  </div>
</div>


<div class="container">
    <div class="row">
<div class="site-blocks-cover overlay inner-page h-75 bg-info col-md-12" style="background-image: url('external/images/hero_1.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">



    <form action="{{route('alljobs')}}" method="GET">

    <div class="form-inline">
        <div class="form-group">
            <label>Position&nbsp;</label>
            <input type="text" name="title" class="form-control" placeholder="job title">&nbsp;&nbsp;&nbsp;
        </div>
        <div class="form-group">
            <label>Employment &nbsp;</label>
            <select class="form-control" name="type">
                    <option value="">-select-</option>
                    <option value="fulltime">fulltime</option>
                    <option value="parttime">parttime</option>
                    <option value="casual">casual</option>
                </select>
                &nbsp;&nbsp;
        </div>
        <div class="form-group">
            <label>category</label>
            <select name="category_id" class="form-control">
                <option value="">-select-</option>

                    @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                &nbsp;&nbsp;
        </div>

        <div class="form-group">
            <label>address</label>
            <input type="text" name="address" class="form-control" placeholder="address">&nbsp;&nbsp;
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">

        </div>
    </div>    <br>

    </form>

      </div>

    <div class="col-md-12 mt-5">
        <div class="rounded border jobs-wrap">
            @if(count($jobs)>0)
                @foreach($jobs as $job)

              <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom @if($job->type=='parttime') partime @elseif($job->type=='fulltime')fulltime @else freelance   @endif;">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{ url('storage/uploads/logo/'.$job->company->logo)}}" width="80">
                  <div class="p-3 align-self-center">
                    <h3>{{$job->position}}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->company->cname}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($job->address,20)}}</div>
                      <div><span class="icon-money mr-1"></span>{{$job->salary}}</div>
                      <div>&nbsp;<span class="fa fa-clock-o mr-1"></span>{{$job->created_at->diffForHumans()}}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                  @if($job->type=='fulltime')
                  <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                  </div>
                  @elseif($job->type=='parttime')
                  <div class="p-3">
                    <span class="text-danger p-2 rounded border border-danger">{{$job->type}}</span>
                  </div>
                  @else
                   <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                  </div>
                  @endif

                </div>
              </a>

            @endforeach
            @else
            No jobs found
            @endif


            </div>
        </div>


      <div class="nav justify-content-center mt-3">
         {{$jobs->links()}}
       </div>




    </div>

</div>




@endsection
