<form action="{{ route('employer.jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div>
        <label for="job_title">Job Title:</label>
        <input type="text" name="job_title" value="{{ $job->job_title }}" required>
    </div>      
    <div>
        <label for="company_name">Company Name:</label>
        <input type="text" name="company_name" value="{{ $job->company_name }}" required>
    </div>
    <div>
        <label for="location">Location:</label>
        <input type="text" name="location" value="{{ $job->location }}" required>
    </div>
    <div>
        <label for="job_requirement">Job Requirements:</label>
        <textarea name="job_requirement" required>{{ $job->job_requirement }}</textarea>
    </div>
    <div>
        <label for="salary">Salary:</label>
        <input type="text" name="salary" value="{{ $job->salary }}" required>
    </div>
    <div>
        <label for="job_type">Job Type:</label>
        <select name="job_type">
            <option value="Full-time" {{ $job->job_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
            <option value="Part-time" {{ $job->job_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
            <option value="Contract" {{ $job->job_type == 'Contract' ? 'selected' : '' }}>Contract</option>
        </select>
    </div>
    <div>
        <label for="deadline">Application Deadline:</label>
        <input type="date" name="deadline" value="{{ $job->deadline->format('Y-m-d') }}" required>
    </div>
    <button type="submit">Update Job</button>
</form>
