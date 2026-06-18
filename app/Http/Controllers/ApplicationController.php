<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Enums\ApplicationStatus;
use Illuminate\Validation\Rules\Enum;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::all();
        return view('index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'company_name'=>'required|max:255|min:1|string',
                'role_title'=>'required|max:255|min:1|string',
                'url'=>'url|nullable|max:2048',
                'email'=> 'email|nullable',
                'source'=>'min:1|max:255',
                "date_applied"=>'required|date',
            ]
        );

        Application::create($validated);
        return redirect()->route('applications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('show',compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('edit',compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Application $application)
    {
                $validated = $request->validate(
            [
                'company_name'=>'required|max:255|min:1|string',
                'role_title'=>'required|max:255|min:1|string',
                'url'=>'url|nullable|max:2048',
                'email'=> 'email|nullable',
                'source'=>'min:1|max:255',
                "date_applied"=>'required|date',
            ]
        );

        $application->update($validated);

        return redirect() -> route('applications.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        Application::destroy($application);
        return redirect() -> route('applications.index');
    }
}
