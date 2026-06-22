<x-layout title="Resumes">
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
            @foreach ($resume as $r)
                <tr>
                    <td>
                        <a href="{{ route('resume.show',$r->id) }}">{{ $r->label }}</a>
                    </td>
                    <td>{{ $r->label }}</td>
                    <td>{{ $r->path }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>