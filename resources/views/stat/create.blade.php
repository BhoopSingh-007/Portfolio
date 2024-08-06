@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Stat</h1>
        <form action="{{ route('admin.stat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="count">Count</label>
                <input id="count" type="number" class="form-control" name="count" value="{{ old('count') }}"
                    required>
                @error('count')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
