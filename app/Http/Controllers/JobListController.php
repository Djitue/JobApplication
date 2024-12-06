<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobposting;

class JobListController extends Controller
{
//     public function index(Request $request)
// {
//     $jobs = JobPosting::query()
//         ->when($request->input('search'), function ($query, $search) {
//             return $query->where('job_title', 'like', "%{$search}%")
//                          ->orWhere('location', 'like', "%{$search}%")
//                          ->orWhere('job_type', 'like', "%{$search}%");
//         })
//         ->paginate(10);

//     return view('job.joblist', compact('jobs'));
// }


    public function index(Request $request)
    {
        // Get search, location, and job_type input from the user
        $search = $request->input('search');
        $location = $request->input('location');
        $jobType = $request->input('job_type');

        // Query the JobPosting model and apply filters independently based on input values
        $jobs = JobPosting::query()
            // If a search keyword is provided, filter by job_title or description
            ->when($search, function ($query, $search) {
                return $query->where('job_title', 'like', "%{$search}%")
                            ->orWhere('location', 'like', "%{$search}%");
            })
            // If a location is provided, filter by location
            ->when($location, function ($query, $location) {
                return $query->where('location', 'like', "%{$location}%");
            })
            // If a job type is selected, filter by job_type
            ->when($jobType, function ($query, $jobType) {
                return $query->where('job_type', $jobType);
            })
            // Paginate results with 10 jobs per page
            ->paginate(10);

        // Return the view and pass the filtered jobs along with the filter inputs to persist them
        return view('job.joblist', compact('jobs', 'search', 'location', 'jobType'));
    }
}
