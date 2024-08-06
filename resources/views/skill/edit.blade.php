@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Skill</h1>
        <form action="{{ route('admin.skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $skill->name) }}"
                    required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="percentage">Percentage</label>
                <input id="percentage" type="number" class="form-control" name="percentage"
                    value="{{ old('percentage', $skill->percentage) }}" required>
                @error('percentage')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
