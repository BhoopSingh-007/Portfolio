@extends('layouts.app')

@section('content')
@php
    $user = App\Models\User::where('id',1)->first();
@endphp
    <div class="container">
        <h1>Edit Social Media Links</h1>
        <form action="{{ route('admin.link.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="twitter">Twitter URL</label>
                <input type="url" name="twitter" id="twitter" class="form-control"
                    value="{{ old('twitter', $user->twitter) }}">
                @error('twitter')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="facebook">Facebook URL</label>
                <input type="url" name="facebook" id="facebook" class="form-control"
                    value="{{ old('facebook', $user->facebook) }}">
                @error('facebook')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="instagram">Instagram URL</label>
                <input type="url" name="instagram" id="instagram" class="form-control"
                    value="{{ old('instagram', $user->instagram) }}">
                @error('instagram')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="linkedin">LinkedIn URL</label>
                <input type="url" name="linkedin" id="linkedin" class="form-control"
                    value="{{ old('linkedin', $user->linkedin) }}">
                @error('linkedin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
