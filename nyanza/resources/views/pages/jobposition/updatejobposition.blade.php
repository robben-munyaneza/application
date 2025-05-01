@extends('component.sidebar')

@section('content')




<form action="{{ route('jobposition.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $job->Title }}">
    <input type="text" name="department" value="{{ $job->Department }}">
    <textarea name="description">{{ $job->Description }}</textarea>
    <input type="text" name="qualifications" value="{{ $job->RequiredQualifications }}">

    <button type="submit">Update Job</button>
</form>

@endsection

