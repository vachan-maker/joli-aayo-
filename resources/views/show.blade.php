<x-layout>
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

        <footer>
            <a href="{{ route('applications.edit', $application) }}">Edit Details</a>
        </footer>
    </article>
</x-layout>