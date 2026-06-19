<x-layout>
    <article>
        <header>
            <h1>{{ $resume->label }}</h1>
        </header>

        <section>
            <iframe src="{{ route('resume.view',$resume ->id)}}" width="100%" height="100%"></iframe>
        </section>

        <footer>
        </footer>
    </article>
</x-layout>