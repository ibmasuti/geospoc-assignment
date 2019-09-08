<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\jobseeker;

use Location;

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
       
        return view('profileview', ['jobseeker'=> $jobseeker , 'position' => $position] );
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
    


    }
