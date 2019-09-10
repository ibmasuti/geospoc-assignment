<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\jobseeker;

use App\comment;

use Location;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('home');
    }


       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchjobseekers(Request $request)
        {
            if($request->ajax()){

            if($request->search == '' )
                $jobseekers = jobseeker::all();
            else{
                $jobseekers = jobseeker::where('name','LIKE','%'.$request->search.'%')->orWhere('email','LIKE','%'.$request->search.'%')->orWhere('webaddress','LIKE','%'.$request->search.'%')->orWhere('coverletter','LIKE','%'.$request->search.'%')->get();
                }

       return view('jobseekerview', ['jobseekers'=> $jobseekers] );

         }
    }

     /**
     * view jobseeker profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileview(Request $request)
    {
        $jobseeker = jobseeker::find($request->id);

        $position = Location::get($jobseeker->ip_address);
        if($position != false)
         return view('profileview', ['jobseeker'=> $jobseeker , 'position' => $position] );
         return view('profileview', ['jobseeker'=> $jobseeker]);
    }

       /**
     * Download Files
     *
     * @return \Illuminate\Http\Response
     */
    public function download($file_name) {
        
    
    $file_path = public_path('Resumes\\'.$file_name);
    return response()->download($file_path);
    
    }

    /**
     * Post comment And Reviews
     *
     * @return \Illuminate\Http\Response
     */
    public function postcomments(Request $request) {


          if($request->ajax() && $request->comment != NULL ){

            $comment = new comment();
            $comment->user_id = Auth::user()->id;
            $comment->jobseeker_id = $request->jobseeker_id;
            $comment->comments = $request->comment;
            $comment->save();
           return json_encode(['responce'=>true]);
           }
           return json_encode(['responce'=>false]);

    
    }
    


}
