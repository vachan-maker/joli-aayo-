<x-layout title="Applications">
    <table>
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <td>
                        <a href="{{ route('applications.show',$application->id) }}">{{ $application->company_name }}</a>
                    </td>
                    <td>{{ $application->role_title }}</td>
                    <td>{{ $application->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>