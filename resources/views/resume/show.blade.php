<x-layout :title="$resume->label">
    <article>
        <header>
            <h1>{{ $resume->label }}</h1>
        </header>
        <section>
            <h3>Applications using this Resume</h3>
            <ol>
                @foreach($resume->applications as $application)
                    <li>
                        <a href="{{ route('applications.show', $application->id) }}">
                        {{ $application->company_name }}
                        -
                        {{ $application->role_title }}
                    </a>
                    </li>
                @endforeach
            </ol>
        </section>
        <section>
            <iframe src="{{ route('resume.view', $resume->id)}}" width="100%" height=800></iframe>
        </section>

        <footer>
            <footer>
                <form action="{{ route('resume.destroy', $resume->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete"
                        onclick="return confirm('Are you sure you want to delete this application?')" />
                    <a href="{{ route('resume.download', $resume) }}"><input type="button" value="Download"
                            class="outline" /></a>
                </form>

            </footer>
        </footer>
    </article>
</x-layout>