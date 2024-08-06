@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Service</h1>
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $service->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" name="icon" id="icon" class="form-control"
                    value="{{ old('icon', $service->icon) }}" required>
                @error('icon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="svg_d">SVG Path Data</label>
                <input type="text" name="svg_d" id="svg_d" class="form-control"
                    value="{{ old('svg_d', $service->svg_d) }}">
                @error('svg_d')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="color" id="color" class="form-control"
                    value="{{ old('color', $service->color) }}">
                @error('color')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
