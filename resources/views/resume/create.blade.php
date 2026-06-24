<x-layout title="Add Resume">
    <form method="POST" enctype="multipart/form-data" action="{{ route('resume.store') }}">
        @if ($errors->any())
        <aside>
            <strong>Please correct the errors below:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </aside>
    @endif
        <input type="text" name="label" placeholder="Label"/>
        <input type="file" accept="application/pdf" name="file"/>
        <input type="submit" value="Add Resume"/>
    </form>
</x-layout>