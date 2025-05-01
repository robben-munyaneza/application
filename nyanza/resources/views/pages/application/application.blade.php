@extends('component.sidebar')

@section('content')

<h2>Create Application</h2>

<form action="{{ route('applications.store') }}" method="POST">
    @csrf
    <div>
        <label for="applicant_id">Applicant:</label>
        <select name="applicant_id" id="applicant_id" required>
            @foreach ($applicants as $applicant)
                <option value="{{ $applicant->id }}">
                    {{ $applicant->FirstName }} {{ $applicant->LastName }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="job_id">Job:</label>
        <select name="job_id" id="job_id" required>
            @foreach ($jobpositions as $jobposition)
                <option value="{{ $jobposition->id }}">
                    {{ $jobposition->Title }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="ApplicationStatus">Application Status:</label>
        <select name="ApplicationStatus" id="ApplicationStatus" required>
            <option value="Pending">Pending</option>
            <option value="Reviewed">Reviewed</option>
            <option value="Rejected">Rejected</option>
        </select>
    </div>

    <div>
        <label for="ReviewDate">Review Date:</label>
        <input type="date" name="ReviewDate" id="ReviewDate">
    </div>

    <div>
        <button type="submit">Submit Application</button>
    </div>
</form>

<h2>Application List</h2>

<table border="1">
    <thead>
        <tr>
            <th>Applicant Name</th>
            <th>Job Position</th>
            <th>Application Status</th>
            <th>Review Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applications as $application)
            <tr>
                <td>
                    {{ $application->applicant->FirstName }} {{ $application->applicant->LastName }}
                </td>
                <td>
                    {{ $application->job->Title }}
                </td>
                <td>{{ $application->ApplicationStatus }}</td>
                <td>{{ $application->ReviewDate }}</td>
                <td>
                    <a href="{{ route('applications.edit', $application->id) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
