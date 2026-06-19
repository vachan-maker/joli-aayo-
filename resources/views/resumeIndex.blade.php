<x-layout>
    <h2>Resume Version</h2>
    <table>
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Role</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resumeVersion as $resume)
                <tr>
                    <td>
                        <a href="{{ route('resume.index',$resume->id) }}">{{ $resume->label }}</a>
                    </td>
                    <td>{{ $resume->label }}</td>
                    <td>{{ $resume->path }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>