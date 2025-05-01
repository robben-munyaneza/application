@extends('component.sidebar')

@section('content')


<h2>Add Job Position</h2>

<form action="{{ route('jobposition.store') }}" method="POST">
    @csrf 

  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title" value="{{ old('title') }}"><br><br>

  <label for="department">Department:</label><br>
  <input type="text" id="department" name="department" value="{{ old('department') }}"><br><br>

  <label for="description">Description:</label><br>
  <textarea id="description" name="description" rows="4" cols="50">{{ old('description') }}</textarea><br><br>

  <label for="qualifications">Required Qualifications:</label><br>
  <textarea id="qualifications" name="qualifications" rows="4" cols="50">{{ old('qualifications') }}</textarea><br><br>



  <button type="submit">Submit</button>

</form>
<h2>All Job Positions</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if($jobs->count())
    <table border="1" cellpadding="10">
        <tr>
            <th>Title</th>
            <th>Department</th>
            <th>Description</th>
            <th>Qualifications</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->Title }}</td>
                <td>{{ $job->Department }}</td>
                <td>{{ $job->Description }}</td>
                <td>{{ $job->RequiredQualifications }}</td>
                <td> <a href="{{ route('jobposition.edit', $job->id)}}">edit</a>
                <td>
                    <form action="{{ route('jobposition.destroy', $job->id)}}" method="POST" onsubmit="return confirm('are you sure you want to delete this');">
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
