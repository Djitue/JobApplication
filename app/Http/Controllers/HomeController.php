<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobposting;

class HomeController extends Controller
{
    public function index() {
        $jobs = JobPosting::latest()->take(6)->get(); // Fetch the latest 6 jobs
        return view('home', compact('jobs'));
    }

    public function detail($id){
        // Fetch the job based on the given ID
        $job = JobPosting::where('id', $id)->first();

        // If no job is found, return a 404 error
        if ($job == null) {
            abort(404);
        }

        // Pass the job to the view
        return view('job.job-detail', ['job' => $job]);
    }


}
