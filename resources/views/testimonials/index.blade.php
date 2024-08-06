@extends('layouts.app')

@section('content')
    @inject('carbon', '\Carbon\Carbon')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">Testimonials Sections</h1>
            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">Create New Testimonial</a>
        </div>
        <!-- Display success message if exists -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Testimonials Sections Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Testimonial</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Testimonial</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->position }}</td>
                                    <td>{{ $testimonial->company }}</td>
                                    <td>{{ Str::limit($testimonial->testimonial, 50) }}</td>
                                    <td>
                                        @if ($testimonial->image)
                                            <img src="{{ Storage::url('public/testimonials/' . $testimonial->image) }}"
                                                alt="Image" style="max-width: 100px;">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
