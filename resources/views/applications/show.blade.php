<x-layout :title="$application->company_name.' - '.$application->role_title">
    <article>
        <header>
            <h1>{{ $application->company_name }}</h1>
            <h3>{{ $application->role_title }}</h3>
        </header>

        <section>
            <!-- The aside tag gives this a highlighted visual breakout for the status -->
            <aside>
                <strong>Status:</strong> {{ ucwords(str_replace('/', ' ', $application->status)) }}
            </aside>

            <p>
                <strong>Date Applied:</strong> 
                <time datetime="{{ $application->date_applied }}">{{ $application->date_applied }}</time>
            </p>
                <p>
                <strong>Resume:</strong> 
                @if($application->resume_version_id)
                    <a href="{{ route('resume.show',$application->resume_version_id) }}" target="_blank" rel="noopener noreferrer">{{ $application->resumeVersion->label}}</a>
                @else
                    <em>None provided</em>
                @endif
            </p>

            <p>
                <strong>Source:</strong> {{ $application->source ?? 'Not specified' }}
            </p>

            <p>
                <strong>Contact Email:</strong> 
                @if($application->email)
                    <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                @else
                    <em>None provided</em>
                @endif
            </p>

            <p>
                <strong>Job Listing URL:</strong> 
                @if($application->job_url)
                    <a href="{{ $application->job_url }}" target="_blank" rel="noopener noreferrer">View Job Posting</a>
                @else
                    <em>None provided</em>
                @endif
            </p>

        </section>

        <footer class="flex flex-col gap-2">
            <a href="{{ route('applications.edit', $application) }}" class="flex-1"><button style="width: 100%; margin-bottom: 1rem;" class="outline">
                <i class="fa-solid fa-pencil"></i>
                Edit Details</button></a>
            <form action="{{ route('applications.destroy', $application->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this application?')">
                    <i class="fa-solid fa-trash"></i>
                    Delete
                </button>
            </form>
        </footer>
    </article>
</x-layout>