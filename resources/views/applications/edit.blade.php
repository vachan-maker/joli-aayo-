<x-layout title="Edit Application">
            <form action="{{ route('applications.update',$application->id) }}" method="post">
                @csrf
                @method('PUT')
        <input type="text" name="company_name" placeholder="Company Name" value="{{ old('company_name', $application->company_name) }}"/>
        <input type="text" name="role_title" placeholder="Role Title" value="{{ old('company_name', $application->role_title) }}"/>
        <select name="status">
            @foreach(App\Enums\ApplicationStatus::cases() as $status)
        <option
            value="{{ $status->value }}"
            {{ old('status') === $status->value ? 'selected' : '' }}
        >
            {{ $status->value }}
        </option>
            @endforeach
            </select>
        <input type="date" name="date_applied" value="{{ old('date', $application->date_applied) }}"/>
        <input type="url" name="job_url" placeholder="job-url" value="{{ old('job_url', $application->job_url) }}"/>
        <input type="email" name="email" placeholder="email" value="{{ old('email', $application->email) }}"/>
        <input type="string" name="source" placeholder="source" value="{{ old('source', $application->source) }}"/>
        <input type="submit"/>

    </form>
    </x-layout>
