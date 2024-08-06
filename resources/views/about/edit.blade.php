@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit About</h1>
    <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf        
        @method('PUT')       

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $about->title ?? '') }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $about->description ?? '') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday', $about->birthday ?? '') }}" required>
            @error('birthday')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" name="website" id="website" class="form-control" value="{{ old('website', $about->website ?? '') }}" required>
            @error('website')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="experince">Experince</label>
            <input type="text" name="experince" id="experince" class="form-control" value="{{ old('experince', $about->experince ?? '') }}" required>
            @error('experince')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $about->phone ?? '') }}" required>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $about->city ?? '') }}" required>
            @error('city')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $about->age ?? '') }}" required>
            @error('age')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="degree">Degree</label>
            <input type="text" name="degree" id="degree" class="form-control" value="{{ old('degree', $about->degree ?? '') }}" required>
            @error('degree')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $about->email ?? '') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="freelance">Freelance</label>
            <select name="freelance" id="freelance" class="form-control" required>
                <option value="">Select</option>
                <option value="1" {{ old('freelance', $about->freelance ?? '') == 1 ? 'selected' : '' }}>Available</option>
                <option value="0" {{ old('freelance', $about->freelance ?? '') == 0 ? 'selected' : '' }}>Not Available</option>
            </select>
            @error('freelance')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="profile_image">Profile Image</label>
            <input type="file" name="profile_image" id="profile_image" class="form-control">
            @if(isset($about) && $about->profile_image)
                <img src="{{ asset('storage/' . $about->profile_image) }}" alt="Profile Image" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif
            @error('profile_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
