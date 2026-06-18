<x-layout>
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
                        <a href="#">{{ $application->company_name }}</a>
                    </td>
                    <td>{{ $application->role_title }}</td>
                    <td>{{ $application->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>