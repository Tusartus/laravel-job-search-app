<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Job;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;
use DB;

use Auth;


class CompanyController extends Controller
{
    //
    public function __construct(){
      $this->middleware('employer',['except'=>array('index','company')]); //seeker will see index company if it also not login
  }



  public function index($id, Company $company){
   $jobs = Job::where('user_id',$id)->get();

   return view('company.index',compact('company'));
 }



 public function company(){
  $companies = Company::latest()->paginate(20);
  return view('company.company',compact('companies'));
}



    public function create(){
    	return view('company.create');
    }

    public function store(){
    $user_id = auth()->user()->id;

    Company::where('user_id',$user_id)->update([
      'address'=>request('address'),
      'phone'=>request('phone'),
      'website'=>request('website'),
      'slogan'=>request('slogan'),
      'description'=>request('description')
    ]);
    return redirect()->back()->with('message','Company Sucessfully Updated!');

 }

  public function coverPhoto(Request $request){
      $user_id = auth()->user()->id;
      if($request->hasfile('cover_photo')){

        // Get filename with the extension
                $filenameWithExt = $request->file('cover_photo')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cover_photo')->getClientOriginalExtension();
                //            Delete old image form profile folder
       if (Storage::disk('public')->exists('uploads/coverphoto/'.Auth::user()->company->cover_photo))
       {
         Storage::disk('public')->delete('uploads/coverphoto/'.Auth::user()->company->cover_photo);
       }
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;


                // Upload Image
                $path = $request->file('cover_photo')->storeAs('public/uploads/coverphoto',$fileNameToStore);


}

$data = array();

$data['cover_photo'] = $fileNameToStore;

DB::table('companies')
   ->where('user_id',$user_id)->update($data);


      return redirect()->back()->with('message','Company coverphoto Sucessfully Updated!');

  }




  public function companyLogo(Request $request){
  $this->validate($request,[
      'company_logo'=>'required|mimes:png,jpeg,jpg|max:20000'
  ]);
  $user_id = auth()->user()->id;


      if($request->hasfile('company_logo')){


      // Get filename with the extension
              $filenameWithExt = $request->file('company_logo')->getClientOriginalName();
              //Get just filename
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              // Get just ext
              $extension = $request->file('company_logo')->getClientOriginalExtension();
              //            Delete old image form profile folder
     if (Storage::disk('public')->exists('uploads/logo/'.Auth::user()->company->logo))
     {
       Storage::disk('public')->delete('uploads/logo/'.Auth::user()->company->logo);
     }
              // Filename to store
              $fileNameToStore = $filename.'_'.time().'.'.$extension;


              // Upload Image
              $path = $request->file('company_logo')->storeAs('public/uploads/logo',$fileNameToStore);
  }

              $data = array();

              $data['logo'] = $fileNameToStore;

              DB::table('companies')
                 ->where('user_id',$user_id)->update($data);

              return redirect()->back()->with('message','Company logo Sucessfully Updated!');



  }








/*



  public function avatar(Request $request){
      $this->validate($request,[
          'avatar'=>'required|mimes:png,jpeg,jpg|max:20000'
      ]);
      $user_id = auth()->user()->id;
      if($request->hasfile('avatar')){

        // Get filename with the extension
                $filenameWithExt = $request->file('avatar')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('avatar')->getClientOriginalExtension();
                //            Delete old image form profile folder
       if (Storage::disk('public')->exists('uploads/avatar/'.Auth::user()->profile->avatar))
       {
         Storage::disk('public')->delete('uploads/avatar/'.Auth::user()->profile->avatar);
       }
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;


                // Upload Image
                $path = $request->file('avatar')->storeAs('public/uploads/avatar',$fileNameToStore);


$data = array();

$data['avatar'] = $fileNameToStore;

DB::table('profiles')
   ->where('user_id',$user_id)->update($data);


      return redirect()->back()->with('message','Profile picture Sucessfully Updated!');
      }

 }



*/




































}
