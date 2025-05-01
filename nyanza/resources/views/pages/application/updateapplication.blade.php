<form action="{{ route('applications.update', $applications->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Applicant -->
    <div>
        <label for="applicant_id">Applicant:</label>
        <select name="applicant_id" id="applicant_id" required>
            @foreach ($applicants as $applicant)
                <option value="{{ $applicant->id }}" {{ $applications->applicant_id == $applicant->id ? 'selected' : '' }}>
                    {{ $applicant->FirstName }} {{ $applicant->LastName }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Job Position -->
    <div>
        <label for="job_id">Job:</label>
        <select name="job_id" id="job_id" required>
            @foreach($jobpositions as $jobposition)
                <option value="{{ $jobposition->id }}" {{ $applications->job_id == $jobposition->id ? 'selected' : '' }}>
                    {{ $jobposition->Title }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Application Status -->
    <div>
        <label for="ApplicationStatus">Application Status:</label>
        <select name="ApplicationStatus" id="ApplicationStatus" required>
            <option value="Pending" {{ $applications->ApplicationStatus == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Reviewed" {{ $applications->ApplicationStatus == 'Reviewed' ? 'selected' : '' }}>Reviewed</option>
            <option value="Rejected" {{ $applications->ApplicationStatus == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </div>

    <!-- Review Date -->
    <div>
        <label for="ReviewDate">Review Date:</label>
        <input type="date" name="ReviewDate" id="ReviewDate" value="{{ $applications->ReviewDate }}">
    </div>

    <!-- Submit -->
    <div>
        <button type="submit">Update Application</button>
    </div>
</form>
