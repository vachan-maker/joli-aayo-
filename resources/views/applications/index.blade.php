<x-layout title="Applications">
    <aside>
    <form action="{{ route('applications.index') }}" method="GET">
        <fieldset role="group">
        <select name="sort_by" id="sort_by">
            <option value="created_at" {{ request('sort_by','date_applied') === 'date_applied' ? 'selected' :'' }}>Creation Date</option>
            <option value="date_applied" {{ request('sort_by') === 'date_applied' ? 'date_applied' : '' }}>Date Applied</option>
            <option value="company_name" {{ request('sort_by') === 'company_name' ? 'company_name' : '' }}>Company Name</option>
        </select>
        <select name="sort_direction" id="sort_direction">
            <option value="asc" {{ request('sort_direction') ==='asc' ? 'asc' :''}}>Ascending</option>
            <option value="desc" {{ request('sort_direction','desc') === 'desc' ? 'desc':'' }}>Descending</option>
        </select>
        <button type="submit">Sort</button>
        </fieldset>
    </form>
    </aside>
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