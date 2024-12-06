<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .job-form-container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .job-form-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            background-color: #2c3e50;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #34495e;
        }
    </style>
</head>
<body>
    <div class="job-form-container">
        <h1>Post a Job</h1>
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf

            <!-- Job Title -->
            <div class="form-group">
                <label for="job-title">Job Title</label>
                <input type="text" id="job-title" name="job_title" placeholder="Enter the job title" required>
            </div>

            <!-- Company Name -->
            <div class="form-group">
                <label for="company-name">Company Name</label>
                <input type="text" id="company-name" name="company_name" placeholder="Enter the company name" required>
            </div>

            <!-- Location -->
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" placeholder="Enter the job location" required>
            </div>

            <!-- Job Requirements -->
            <div class="form-group">
                <label for="job-requirements">Job Requirements</label>
                <textarea id="job-requirement" name="job_requirement" placeholder="Enter the job requirements" required></textarea>
            </div>

            <!-- Salary Range -->
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" id="salary-range" name="salary" placeholder="in FCFA " required>
            </div>

            <!-- Job Type -->
            <div class="form-group">
                <label for="job-type">Job Type</label>
                <select id="job-type" name="job_type" required>
                    <option value="">Select job type</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>

            <!-- Application Deadline -->
            <div class="form-group">
                <label for="application-deadline">Application Deadline</label>
                <input type="date" id="application-deadline" name="deadline" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Post Job</button>
        </form>
    </div>
</body>
</html>
