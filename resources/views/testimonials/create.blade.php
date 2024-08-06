@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Testimonial</h1>
        <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}" required>
                @error('position')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" class="form-control" value="{{ old('company') }}">
                @error('company')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="testimonial">Testimonial</label>
                <textarea name="testimonial" id="testimonial" class="form-control" required>{{ old('testimonial') }}</textarea>
                @error('testimonial')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
