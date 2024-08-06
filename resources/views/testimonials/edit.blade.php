@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Testimonial</h1>
        <form action="{{ route('admin.testimonial.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $testimonial->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control"
                    value="{{ old('position', $testimonial->position) }}" required>
                @error('position')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" name="company" id="company" class="form-control"
                    value="{{ old('company', $testimonial->company) }}">
                @error('company')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="testimonial">Testimonial</label>
                <textarea name="testimonial" id="testimonial" class="form-control" required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
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
                @if ($testimonial->image)
                    <img src="{{ Storage::url('public/testimonials/' . $testimonial->image) }}" alt="Current Image"
                        class="mt-2" style="max-width: 200px;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
