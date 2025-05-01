@extends('component.sidebar')

@section('content')

<h2>Add Recruitment Stage</h2>

<form action="{{ route('recruitmentstage.store') }}" method="POST">
    @csrf

    <label>Application:</label>
    <select name="Application-id" required>
        @foreach($applications as $app)
            <option value="{{ $app->id }}">{{ $app->applicant->FirstName }} {{ $app->applicant->LastName }} - {{ $app->job->Title }}</option>
        @endforeach
    </select><br>

    <label>Stage Name:</label>
    <input type="text" name="StageName" required><br>

    <label>Stage Status:</label>
    <input type="text" name="StageStatus" required><br>

    <label>Completion Date:</label>
    <input type="date" name="CompletionDate"><br>

    <button type="submit">Add Stage</button>
</form>

<h2>Recruitment Stages List</h2>

<table border="1">
    <thead>
        <tr>
            <th>Application</th>
            <th>Stage Name</th>
            <th>Status</th>
            <th>Completion Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recruitmentStages as $stage)
            <tr>
                <td>{{ $stage->application->applicant->FirstName }} {{ $stage->application->applicant->LastName }}</td>
                <td>{{ $stage->StageName }}</td>
                <td>{{ $stage->StageStatus }}</td>
                <td>{{ $stage->CompletionDate }}</td>
                <td>
                    <a href="{{ route('recruitmentstage.edit', $stage->StageId) }}">Edit</a>
                    <form action="{{ route('recruitmentstage.destroy', $stage->StageId) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
