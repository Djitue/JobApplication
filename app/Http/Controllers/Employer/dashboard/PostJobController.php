<?php

namespace App\Http\Controllers\Employer\dashboard;

use App\Models\Jobposting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class PostJobController extends Controller
{
    public function create()
    {
        return view('employer.post-job'); // Points to the Blade view for the job posting form
    }

    public function store(Request $request)
    {
        $employerId = auth()->id(); //Get the authenticated employer's user ID

       Jobposting::create([
        'employer_id' => $employerId,
          'job_title' => request('job_title'),
          'company_name' => request('company_name'),
          'location' => request('location'),
          'job_requirement' => request('job_requirement'),
          'salary' => request('salary'),
          'job_type' => request('job_type'),
          'deadline' => request('deadline')
       ]);

        // Redirect to a page (e.g., job listing or dashboard) with a success message
        return redirect('/employer/jobs')->with('status', 'Job created successfully!');
    }

    /**
     * Display a list of all jobs posted by the employer.
     */

    public function index()
    {
        $jobs = JobPosting::where('employer_id', auth()->id())->paginate(10); // Assuming jobs are tied to an employer
        return view('employer.jobs.index', compact('jobs')); // View to show all jobs
    }


    /**
     * Show the form for editing a specific job posting.
     */
    public function edit($id)
    {
        $job = JobPosting::where('employer_id', auth()->id())->findOrFail($id); // Ensure the employer owns the job
        return view('employer.jobs.edit', compact('job')); // View to edit the job
    }

    /**
     * Update the specified job in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the input fields
        $rules = [
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_requirement' => 'required|string',
            'salary' => 'required|string',
            'job_type' => 'required|in:Full-time,Part-time,Contract',
            'deadline' => 'required|date|after:today',
        ];

            
        // Validate the input fields
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Find the job posting by ID
        $job = JobPosting::find($id);

        if (!$job) {
            return redirect()->route('employer.jobs.index')->with('error', 'Job not found.');
        }

        // Update job details

        $job->job_title = $request->job_title;
        $job-> company_name = $request->company_name;
        $job-> location = $request->location;
        $job->job_requirement = $request->job_requirement;
        $job-> salary = $request->salary;
        $job->job_type = $request->job_type;
        $job->deadline = $request->deadline;
        $job->save();


        // Redirect with a success message
        return redirect()->route('employer.jobs.index')->with('success', 'Job updated successfully!');
    }



    /**
     * Delete a specific job posting.
     */
    public function destroy($id)
    {
        $job = JobPosting::where('employer_id', auth()->id())->findOrFail($id); // Ensure the employer owns the job
        $job->delete();

        // Redirect with a success message
        return redirect()->route('employer.jobs.index')->with('success', 'Job deleted successfully!');
    }

    /**
     * View applications for a specific job.
     */
    public function viewApplications($id)
    {
        $job = JobPosting::where('employer_id', auth()->id())->findOrFail($id); // Ensure the employer owns the job
        $applications = $job->applications; // Assuming a relationship between Job and Application models

        return view('employer.jobs.applications', compact('job', 'applications'));
    }
}
