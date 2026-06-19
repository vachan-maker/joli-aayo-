<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ResumeVersion;
use Illuminate\Http\Request;
use Storage;
class ResumeVersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resume = ResumeVersion::all();   
        return view('resumeIndex',compact('resume'));
        
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
        $request->user()->resumeVersions()->create([
            'label'=> $validated['label'],
            'file_path'=>$path
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ResumeVersion $resume)
    {
        return view('resumeShow',compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResumeVersion $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResumeVersion $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResumeVersion $resume)
    {
        Storage::delete($resume->file_path);
        $resume->delete();
        return redirect() -> route('resume.index');
    }

    public function download(ResumeVersion $resume) {
        if(\Auth::id() === $resume->user_id) {
            return response()->download(storage_path("app/private/{$resume->file_path}"));
        }
    }
    public function view(ResumeVersion $resume) {
                if(\Auth::id() === $resume->user_id) {
            return response()->file(storage_path("app/private/{$resume->file_path}"));
        }
    }
}
