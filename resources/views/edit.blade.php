<html>
    <head>
        <title></title>
    </head>
    <body>
            <form action="{{ route('applications.update',$application->id) }}" method="post">
                @csrf
                @method('PUT')
        <input type="text" name="company_name" placeholder="Company Name" value="{{ old('company_name', $application->company_name) }}"/>
        <input type="text" name="role_title" placeholder="Role Title" value="{{ old('company_name', $application->role_title) }}"/>
        <select>
            <option value="applied">Applied</option>
            <option value="interview">Interview</option>
            <option value="rejected">Rejected</option>
            <option value="offer">Offer</option>
            <option value="accepted">Accepted</option>
            <option value="gd">Group Discussion</option>
            <option value="test/aptitude">Test</option>
        </select>
        <input type="date" name="date_applied" value="{{ old('date', $application->date_applied) }}"/>
        <input type="url" name="job_url" placeholder="job-url" value="{{ old('job_url', $application->job_url) }}"/>
        <input type="email" name="email" placeholder="email" value="{{ old('email', $application->email) }}"/>
        <input type="string" name="source" placeholder="source" value="{{ old('source', $application->source) }}"/>
        <input type="submit"/>

    </form>
    </body>
</html>