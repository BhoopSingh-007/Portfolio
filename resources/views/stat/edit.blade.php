@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Stat</h1>
        <form action="{{ route('admin.stat.update', $stat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $stat->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="count">Count</label>
                <input id="count" type="number" class="form-control" name="count"
                    value="{{ old('count', $stat->count) }}" required>
                @error('count')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
