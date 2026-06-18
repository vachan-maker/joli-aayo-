<!DOCTYPE html>
<head>
    Create Job Application
</head>
<body>
    <h1>Create Job Application</h1>
    <form>
        <input type="text" name="company_name" placeholder="Company Name"/>
        <input type="text" name="role_title" placeholder="Role Title"/>
        <select>
            <option value="applied">Applied</option>
            <option value="interview">Interview</option>
            <option value="rejected">Rejected</option>
            <option value="offer">Offer</option>
            <option value="accepted">Accepted</option>
            <option value="gd">Group Discussion</option>
            <option value="test/aptitude">Test</option>
        </select>
        <input type="date" name="date_applied"/>
        <input type="url" name="job_url" placeholder="job-url"/>
        <input type="email" name="email" placeholder="email"/>
        <input type="string" name="source" placeholder="source"/>
        <input type="submit"/>

    </form>
</body>