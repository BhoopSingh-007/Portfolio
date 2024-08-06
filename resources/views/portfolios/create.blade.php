@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Portfolio Item</h1>
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Images -->
            <div class="form-group">
                <label for="images">Images (You can select multiple files)</label>
                <div class="input-images"></div>

                @error('images')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            <!-- Category -->
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}"
                    required>
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="f_category">Category</label>
                <select name="f_category" id="f_category" class="form-control" required>
                    <option value="">Select Category</option>
                    <option value="app" {{ old('f_category') == 'app' ? 'selected' : '' }}>App</option>
                    <option value="product" {{ old('f_category') == 'product' ? 'selected' : '' }}>Product</option>
                    <option value="branding" {{ old('f_category') == 'branding' ? 'selected' : '' }}>Branding</option>
                </select>
                @error('f_category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Client -->
            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" name="client" id="client" class="form-control" value="{{ old('client') }}"
                    required>
                @error('client')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="project_date">Project Date</label>
                <input type="date" name="project_date" id="project_date" class="form-control"
                    value="{{ old('project_date') }}">
                @error('project_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- URL -->
            <div class="form-group">
                <label for="url">Project URL</label>
                <input type="url" name="url" id="url" class="form-control" value="{{ old('url') }}">
                @error('url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Detailed Description -->
            <div class="form-group">
                <label for="detailed_description">Detailed Description</label>
                <textarea name="detailed_description" id="detailed_description" class="form-control summernote" rows="4" required></textarea>
                @error('detailed_description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            $('.input-images').imageUploader({
                imagesInputName: 'images',

            });
        });
    </script>
@endsection
