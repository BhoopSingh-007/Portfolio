@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Resume</h1>
        <form action="{{ route('admin.resume.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $resume->name ?? '') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="summary">Summary</label>
                <textarea name="summary" id="summary" class="form-control summernote" required>{{ old('summary', $resume->summary ?? '') }}</textarea>
                @error('summary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $resume->address ?? '') }}" required>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $resume->phone ?? '') }}" required>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $resume->email ?? '') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <h3>Education</h3>
            <div class="form-group">
                <label for="education_title">Education Title</label>
                <input type="text" name="education_title" id="education_title" class="form-control" value="{{ old('education_title', $resume->education_title ?? '') }}" required>
                @error('education_title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="education_duration">Education Duration</label>
                <input type="text" name="education_duration" id="education_duration" class="form-control" value="{{ old('education_duration', $resume->education_duration ?? '') }}" required>
                @error('education_duration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="education_institution">Education Institution</label>
                <input type="text" name="education_institution" id="education_institution" class="form-control" value="{{ old('education_institution', $resume->education_institution ?? '') }}" required>
                @error('education_institution')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="education_description">Education Description</label>
                <textarea name="education_description" id="education_description" class="form-control summernote" required>{{ old('education_description', $resume->education_description ?? '') }}</textarea>
                @error('education_description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <h3>Professional Experience</h3>
            <div class="form-group">
                <label for="experience_title">Experience Title</label>
                <input type="text" name="experience_title" id="experience_title" class="form-control" value="{{ old('experience_title', $resume->experience_title ?? '') }}" required>
                @error('experience_title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="experience_duration">Experience Duration</label>
                <input type="text" name="experience_duration" id="experience_duration" class="form-control" value="{{ old('experience_duration', $resume->experience_duration ?? '') }}" required>
                @error('experience_duration')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="experience_company">Experience Company</label>
                <input type="text" name="experience_company" id="experience_company" class="form-control" value="{{ old('experience_company', $resume->experience_company ?? '') }}" required>
                @error('experience_company')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="experience_description">Experience Description</label>
                <textarea name="experience_description" id="experience_description" class="form-control summernote" required>{{ old('experience_description', $resume->experience_description ?? '') }}</textarea>
                @error('experience_description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
