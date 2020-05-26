<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use Auth;
use App\User;
use App\Http\Requests\JobPostRequest;
use App\Category;

class JobController extends Controller
{
    //
    public function __construct(){
      $this->middleware('employer',['except'=>array('index','show','apply','allJobs','searchJobs')]);
  }

  public function index(){
   $jobs = Job::latest()->limit(7)->where('status',1)->get();
   $categories = Category::with('jobs')->get(); //jobs from app/Job.php

     $companies = Company::latest()->get();

   return view('welcome',compact('jobs','companies','categories'));
 }

 public function show($id,Job $job){
 return view('jobs.show',compact('job'));
 }



public function company(){
return view('company.index');
}

public function myjob(){
  $jobs = Job::where('user_id',auth()->user()->id)->get();
  return view('jobs.myjob',compact('jobs'));
}

public function edit($id){
  $job = Job::findOrFail($id);
  return view('jobs.edit',compact('job'));
}



        public function  create(){
            return view('jobs.create');
        }

        public function  store(JobPostRequest $request){

            $user_id = auth()->user()->id;
            $company = Company::where('user_id',$user_id)->first();
            $company_id = $company->id;
            Job::create([
                'user_id' => $user_id,
                'company_id' => $company_id,
                'title'=>request('title'),
                'slug' =>str_slug(request('title')),
                'description'=>request('description'),
                'roles'=>request('roles'),
                'category_id' =>request('category'),
                'position'=>request('position'),
                'address'=>request('address'),
                'type'=>request('type'),
                'status'=>request('status'),
                'last_date'=>request('last_date')


            ]);
            return redirect()->back()->with('message','Job posted successfully!');
         }

         public function update(JobPostRequest $request,$id){
               $job = Job::findOrFail($id);
               $job->update($request->all());
               return redirect()->back()->with('message','Job  Sucessfully Updated!');

           }

            //apply for a job
           public function apply(Request $request,$id){

           $jobId = Job::find($id);
           $jobId->users()->attach(Auth::user()->id);
           return redirect()->back()->with('message','Application sent!');

              }

              public function applicant(){
                 $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
                 return view('jobs.applicants',compact('applicants'));
             }

  /*
  //with search
             public function allJobs(Request $request){

 //front search
    $search = $request->get('search');
    $address = $request->get('address');
    if($search && $address){
       $jobs = Job::where('position','LIKE','%'.$search.'%')
                ->orWhere('title','LIKE','%'.$search.'%')
                ->orWhere('type','LIKE','%'.$search.'%')
                ->orWhere('address','LIKE','%'.$address.'%')
                ->paginate(6);

        return view('jobs.alljobs',compact('jobs'));

    }



    //without search
        public function allJobs(Request $request){

             $jobs = Job::latest()->paginate(4);
              return view('jobs.alljobs',compact('jobs'));

          }

    */

    //with paginate and  search
        public function allJobs(Request $request){

          //front search on views partials hero 
             $search = $request->get('search');
             $address = $request->get('address');
             if($search && $address){
                $jobs = Job::where('position','LIKE','%'.$search.'%')
                         ->orWhere('title','LIKE','%'.$search.'%')
                         ->orWhere('type','LIKE','%'.$search.'%')
                         ->orWhere('address','LIKE','%'.$address.'%')
                         ->paginate(6);

                 return view('jobs.alljobs',compact('jobs'));

                 }






           $keyword = $request->get('title');
           $type = $request->get('type');
           $category = $request->get('category_id');
           $address = $request->get('address');
            if($keyword||$type||$category||$address){
              $jobs = Job::where('title','LIKE','%'.$keyword.'%')

                       ->orWhere('type',$type)
                       ->orWhere('category_id',$category)
                       ->orWhere('address',$address)
                       ->paginate(4);
                      return view('jobs.alljobs',compact('jobs'));

            }else{
              $jobs = Job::latest()->paginate(4);
               return view('jobs.alljobs',compact('jobs'));
            }






          }





















































}
