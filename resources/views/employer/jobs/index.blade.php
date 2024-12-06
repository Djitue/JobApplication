 <title>{{ config('app.name', 'JobSphere') }}</title>

<div class="top-links">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('employer.dashboard') }}">Dashboard</a>
</div>

@foreach ($jobs as $job)
    <div>
        <h3>Job Title: <span> {{ $job->job_title }}</span></h3>
        <ul>
            <li>Published on: <span>{{\Carbon\Carbon::parse($job->created_at) -> format('d M, Y')}}</span></li>
            <li>Company Name: {{ $job->company_name }}</li>
            <li>Company Location: <span>{{ $job->location }}</span></li>
            <li>Job Type: <span> {{ $job->job_type }}</span></li>
            <li>Job Requirement: <span> {{ $job->job_requirement }}</span></li>
            <li>Salary: <span>{{ $job->salary }}</span></li>
            <li>Deadline: <span> {{ $job->deadline->format('d M, Y') }}</span></li>
        </ul>
        <a class="edit-btn" href="{{ route('employer.jobs.edit', $job->id) }}">Edit</a>
        <form action="{{ route('employer.jobs.destroy', $job->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <a class="view-applications-btn" href="{{ route('employer.jobs.applications', $job->id) }}">View Applications</a>
    </div>
@endforeach
{{ $jobs->links() }}
