@extends('component.sidebar')

@section('content')

<h2>Add Applicant</h2>

<form action="{{ route('applicants.store') }}" method="POST">
    
    @csrf

    <label for="firstName">First Name:</label><br>
    <input type="text" id="firstName" name="FirstName" value="{{ old('FirstName') }}"><br><br>

    <label for="lastName">Last Name:</label><br>
    <input type="text" id="lastName" name="LastName" value="{{ old('LastName') }}"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="Email" value="{{ old('Email') }}"><br><br>

    <label for="contact">Contact Number:</label><br>
    <input type="text" id="contact" name="ContactNumber" value="{{ old('ContactNumber') }}"><br><br>

    <label for="applicationDate">Application Date:</label><br>
    <input type="date" id="applicationDate" name="ApplicationDate" value="{{ old('ApplicationDate') }}"><br><br>

    <button type="submit">Submit</button>
</form>

<h2>the applicants records</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if($Apps->count())
<table border="1">
  <tr>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>ContactNumber</th>
        <th>ApplicationDate</th>
        <th>Update</th>
        <th>Delete</th>
    </tr> 
    @foreach ($Apps as $App) 
    <tr>
        <td>{{ $App->FirstName }}</td>
        <td>{{$App->LastName}}</td>
        <td>{{$App->Email}}</td>
        <td>{{$App->ContactNumber}}</td>
        <td>{{$App->ApplicationDate}}</td>
        <td><a href="{{route('applicants.edit', $App->id)}}">edit</a></td>
        <td><Form action="{{route('applicants.destroy', $App->id)}}" method="POST" onsubmit="return confirm('do you want to delete the applicants');">
            @csrf
            @method('DELETE') 
            <button type="submit">delete</button>
        </td>
    </form>
    </tr>

    @endforeach
</table>
@else
<p>No job positions found.</p>
@endif

@endsection
