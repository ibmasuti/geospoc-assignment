<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Captcha;
use App\jobseeker;

class JobSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

   /**
     * Validate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formvalidate($request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:jobseekers',
            'webaddress'=> 'required|url',
            'coverletter'=> 'required|min:50',
            'cvname' => 'required|mimes:doc,docx,pdf|max:2048',
            'like_working' => 'required',
          //  'captcha' => 'required|captcha'
        ]);

       
    }

    public function refreshCaptcha()
    {

        return response()->json(['captcha'=> captcha_img()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storejobseeker(Request $request)
    {

        $this->formvalidate($request);

         $jobseeker = new jobseeker;

        $file = $request->file('cvname');
        $destinationPath = public_path('\Resumes');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        
        $jobseeker->name = $request->name;
        $jobseeker->email = $request->email;
        $jobseeker->webaddress = $request->webaddress;
        $jobseeker->coverletter = $request->coverletter;
        $jobseeker->cvname = $filename;
        $jobseeker->like_working = $request->like_working;
        $jobseeker->ip_address = $request->ip_address;

        $jobseeker->save();

         return redirect()->back()->with('message', 'Profile uploded Successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
