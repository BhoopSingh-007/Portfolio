@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Skill</h1>
        <form action="{{ route('admin.skill.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="percentage">Percentage</label>
                <input id="percentage" type="number" class="form-control" name="percentage" value="{{ old('percentage') }}"
                    required>
                @error('percentage')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
