<x-layout title="Add Application">
    <form action="{{ route('applications.store') }}" method="post">
        @csrf
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
        <input type="text" name="company_name" placeholder="Company Name" />
        <input type="text" name="role_title" placeholder="Role Title" />
        <select name="status">
            @foreach(App\Enums\ApplicationStatus::cases() as $status)
                <option value="{{ $status->value }}">
                    {{ $status->value }}
                </option>
            @endforeach
        </select>
        <input type="date" name="date_applied" max="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" />
        <input type="url" name="job_url" placeholder="job-url" />
        <input type="email" name="email" placeholder="email" />
        <input type="string" name="source" placeholder="source" />
        <input type="submit" />

    </form>
</x-layout>