<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;

use Auth;

class UserController extends Controller
{
    //

     public function __construct(){
        $this->middleware('seeker');
    }



    public function index(){
    return view('profile.index');
  }

  public function store(Request $request){
      $this->validate($request,[

          'address'=>'required',
          'bio'=>'required|min:5',
          'experience'=>'required|min:3',
          'phone_number'=>'required|min:10|numeric'
      ]);

    $user_id = auth()->user()->id;

    Profile::where('user_id',$user_id)->update([
      'address'=>request('address'),
      'experience'=>request('experience'),
      'bio'=>request('bio'),
          'phone_number'=>request('phone_number')
    ]);
    return redirect()->back()->with('message','Profile Sucessfully Updated!');

 }



public function coverletter(Request $request){
    $this->validate($request,[
        'cover_letter'=>'required|mimes:pdf|max:20000'
    ]);
    $user_id = auth()->user()->id;

    if($request->hasFile('cover_letter')){


            // Get filename with the extension
                    $filenameWithExt = $request->file('cover_letter')->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $request->file('cover_letter')->getClientOriginalExtension();
                    //            Delete old image form profile folder
         if (Storage::disk('public')->exists('letters/'.Auth::user()->profile->cover_letter))
         {
             Storage::disk('public')->delete('letters/'.Auth::user()->profile->cover_letter);
         }
                    // Filename to store
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;


                    // Upload Image
                    $path = $request->file('cover_letter')->storeAs('public/letters',$fileNameToStore);

        }

        $data = array();

        $data['cover_letter'] = $fileNameToStore;


        DB::table('profiles')
           ->where('user_id',$user_id)->update($data);

        return redirect()->back()->with('message','Cover letter Sucessfully Updated!');


}


 public function resume(Request $request){
     $this->validate($request,[
         'resume'=>'required|mimes:pdf|max:20000'
     ]);
       $user_id = auth()->user()->id;

       if($request->hasFile('resume')){


               // Get filename with the extension
                       $filenameWithExt = $request->file('resume')->getClientOriginalName();
                       //Get just filename
                       $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                       // Get just ext
                       $extension = $request->file('resume')->getClientOriginalExtension();
                       //            Delete old image form profile folder
            if (Storage::disk('public')->exists('files/'.Auth::user()->profile->resume))
            {
                Storage::disk('public')->delete('files/'.Auth::user()->profile->resume);
            }
                       // Filename to store
                       $fileNameToStore = $filename.'_'.time().'.'.$extension;


                       // Upload Image
                       $path = $request->file('resume')->storeAs('public/files',$fileNameToStore);

           }


                  $data = array();

                  $data['resume'] = $fileNameToStore;


                  DB::table('profiles')
                     ->where('user_id',$user_id)->update($data);


    return redirect()->back()->with('message','Resume Sucessfully Updated!');


  }







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





















}
