@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Portfolio Item</h1>
        <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $portfolio->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $portfolio->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Images -->
            <!-- Images -->
            <div class="form-group">
                <label for="images">Images (You can select multiple files)</label>
                <div class="input-images" data-images="{{ json_encode(json_decode($portfolio->images, true)) }}"></div>
                @error('images')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                @if ($portfolio->images)
                    <div class="mt-2">
                        @foreach (json_decode($portfolio->images) as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $portfolio->title }}" width="150"
                                class="mr-2">
                        @endforeach
                    </div>
                @endif
            </div>


            <!-- Category -->
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" class="form-control"
                    value="{{ old('category', $portfolio->category) }}" required>
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="f_category">Category</label>
                <select name="f_category" id="f_category" class="form-control" required>
                    <option value="">Select Category</option>
                    <option value="app" {{ old('f_category', $portfolio->f_category) == 'app' ? 'selected' : '' }}>App
                    </option>
                    <option value="product" {{ old('f_category', $portfolio->f_category) == 'product' ? 'selected' : '' }}>
                        Product</option>
                    <option value="branding" {{ old('f_category', $portfolio->f_category) == 'branding' ? 'selected' : '' }}>
                        Branding</option>
                </select>
                @error('f_category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Client -->
            <div class="form-group">
                <label for="client">Client</label>
                <input type="text" name="client" id="client" class="form-control"
                    value="{{ old('client', $portfolio->client) }}" required>
                @error('client')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Project Date -->
            <div class="form-group">
                <label for="project_date">Project Date</label>
                <input type="date" name="project_date" id="project_date" class="form-control"
                    value="{{ old('project_date', $portfolio->project_date) }}">
                @error('project_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Project URL -->
            <div class="form-group">
                <label for="url">Project URL</label>
                <input type="url" name="url" id="url" class="form-control"
                    value="{{ old('url', $portfolio->url) }}">
                @error('url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Detailed Description -->
            <div class="form-group">
                <label for="detailed_description">Detailed Description</label>
                <textarea name="detailed_description" id="detailed_description" class="form-control summernote" rows="4" required>{!! old('detailed_description', $portfolio->detailed_description) !!}</textarea>
                @error('detailed_description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@section('custom_scripts')
    <script>
        $(document).ready(function() {
            // Retrieve the data-images attribute and parse it
            var preloadedImages = $('.input-images').data('images');
            try {
                preloadedImages = JSON.parse(preloadedImages || '[]');
            } catch (e) {
                preloadedImages = [];
            }

            // Initialize the imageUploader plugin
            $('.input-images').imageUploader({
                imagesInputName: 'images',
                preloaded: preloadedImages,
                preloadedInputName: 'preloaded_images',
            });

        });
    </script>
@endsection
