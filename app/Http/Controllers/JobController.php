<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class JobController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View::make('jobs.index', [
            'jobs' => Job::with('employer')->latest()->paginate(3),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'unique:job_listings,title',
                'min:3',
                'max:255',
            ],
            'salary' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $employer = Auth::user()->employers->first();

        if (! $employer) {
            abort(403);
        }

        Job::create([
            'title' => $request->title,
            'salary' => $request->salary,
            'employer_id' => $employer->id,
        ]);

        Mail::to($employer->user)->send(new JobPosted());

        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return View::make('jobs.show', [
            'job' => $job,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $this->authorize('modify', $job);

        return View::make('jobs.edit', [
            'job' => $job,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'salary' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $job->update([
            'title' => $request->title,
            'salary' => $request->salary,
        ]);

        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $this->authorize('modify', $job);

        $message = $job->title . ' job deleted successfully';

        $job->delete();

        return redirect()->route('jobs.index')
                         ->with('success', $message);
    }
}
