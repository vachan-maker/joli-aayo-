<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Enums\ApplicationStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Enforce viewAny policy
        Gate::authorize('viewAny', Application::class);

        // Only view the applications of that logged in user
        $applications = $request->user()->applications()->get();
        return view('index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 2. Enforce create policy (Pass the class string, not an instance)
        Gate::authorize('create', Application::class);

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        // 3. Enforce create policy here as well before saving data
        Gate::authorize('create', Application::class);

        $validated=$request->validated();
        // Add user_id to the table via relationship
        $request->user()->applications()->create($validated);
        return redirect()->route('applications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        // 4. Enforce view policy on this specific application instance
        Gate::authorize('view', $application);

        return view('show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        // 5. Enforce update policy before showing the edit form
        Gate::authorize('update', $application);

        return view('edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreApplicationRequest $request, Application $application)
    {
        // 6. Enforce update policy before processing changes
        Gate::authorize('update', $application);

        $application->update($request->validated());

        return redirect()->route('applications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        // 7. Enforce delete policy
        Gate::authorize('delete', $application);

        $application->delete();
        return redirect()->route('applications.index');
    }
}