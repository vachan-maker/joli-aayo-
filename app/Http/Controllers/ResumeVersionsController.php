<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ResumeVersion;
use Illuminate\Http\Request;

class ResumeVersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumeVersion = ResumeVersion::all();   
        return view('resumeIndex',compact('resumeVersion'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resumeCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'label'=>'string|max:2048|min:5|required',
                'file' => 'required|file|mimes:pdf|max:4096'
            ]
        );
        $path = $validated['file']->store('resumes'); //generate path and store it in the storage/app/resumees folder
        ResumeVersion::create([
            'label'=> $validated['label'],
            'file_path'=>$path
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ResumeVersion $resumeVersion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResumeVersion $resumeVersion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResumeVersion $resumeVersion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResumeVersion $resumeVersion)
    {
        //
    }

    public function download(ResumeVersion $resumeVersion) {
        if(\Auth::id() === $resumeVersion->user_id) {
            response()->download(storage_path("app/private/{$resumeVersion->file_path}"));
        }
    }
}
