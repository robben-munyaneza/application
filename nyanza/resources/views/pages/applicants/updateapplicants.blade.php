@extends('component.sidebar')

@section('content')

<h2>Add Applicant</h2>

<form action="{{ route('applicants.update', $App->id) }}" method="POST">
    
    @csrf
    @method('PUT')

    <label for="firstName">First Name:</label><br>
    <input type="text" id="firstName" name="FirstName" value="{{ $App->FirstName }}"><br><br>

    <label for="lastName">Last Name:</label><br>
    <input type="text" id="lastName" name="LastName" value="{{ $App->LastName}}"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="Email" value="{{ $App->Email }}"><br><br>

    <label for="contact">Contact Number:</label><br>
    <input type="text" id="contact" name="ContactNumber" value="{{ $App->ContactNumber}}"><br><br>

    <label for="applicationDate">Application Date:</label><br>
    <input type="date" id="applicationDate" name="ApplicationDate" value="{{ $App->ApplicationDate }}"><br><br>

    <button type="submit">Submit</button>
</form>


@endsection