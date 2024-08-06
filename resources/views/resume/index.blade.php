@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Resume</h1>
        <div class="resume-summary">
            <h2>{{ $resume->name }}</h2>
            <p>{!! $resume->summary!!}</p>
            <ul>
                <li>Address: {{ $resume->address }}</li>
                <li>Phone: {{ $resume->phone }}</li>
                <li>Email: {{ $resume->email }}</li>
            </ul>
        </div>

        <h3>Education</h3>
        <p><strong>{{ $resume->education_title }}</strong> ({{ $resume->education_duration }})</p>
        <p><em>{{ $resume->education_institution }}</em></p>
        <p>{!! $resume->education_description !!}</p>

        <h3>Professional Experience</h3>
        <p><strong>{{ $resume->experience_title }}</strong> ({{ $resume->experience_duration }})</p>
        <p><em>{{ $resume->experience_company }}</em></p>
        <p>{!! $resume->experience_description !!}</p>

        <a href="{{ route('admin.resume.edit') }}" class="btn btn-primary">Edit Resume</a>
    </div>
@endsection
