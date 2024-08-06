@extends('layouts.app')

@section('content')
    @inject('carbon', '\Carbon\Carbon')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">About Sections</h1>
            <a href="{{ route('admin.about.create') }}" class="btn btn-primary">Create New About</a>
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
                <h6 class="m-0 font-weight-bold text-primary">About Sections Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Birthday</th>
                                <th>Website</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Age</th>
                                <th>Degree</th>
                                <th>Email</th>
                                <th>Freelance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Birthday</th>
                                <th>Website</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Age</th>
                                <th>Degree</th>
                                <th>Email</th>
                                <th>Freelance</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($abouts as $about)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ $carbon::parse($about->birthday)->format('d M Y') }}</td>
                                    <td><a href="{{ $about->website }}" target="_blank">{{ $about->website }}</a></td>
                                    <td>{{ $about->phone }}</td>
                                    <td>{{ $about->city }}</td>
                                    <td>{{ $about->age }}</td>
                                    <td>{{ $about->degree }}</td>
                                    <td>{{ $about->email }}</td>
                                    <td>{{ $about->freelance ? 'Available' : 'Not Available' }}</td>
                                    <td>
                                        <a href="{{ route('admin.about.edit', $about->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this entry?')">
                                                <i class="fas fa-trash"></i>
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
