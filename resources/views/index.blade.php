<!DOCTYPE html>
<head>
    <title>Job Application Tracker</title>
</head>
<body>
    <h1>Job Application Tracker</h1>
    <a href="{{ route('applications.create') }}">Add Applications</a>

    @foreach ($applications as $application )
    <article>
        <header>
            <h3>{{ $application->company_name }}</h3>
            <p>{{ $application ->role_title }}</p>
        </header>
    </article>
    
    @endforeach
</body>