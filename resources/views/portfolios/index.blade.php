@extends('layouts.app')

@section('content')
    @inject('carbon', '\Carbon\Carbon')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">Portfolio Items</h1>
            <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">Create New Portfolio Item</a>
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
                <h6 class="m-0 font-weight-bold text-primary">Portfolio Items Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Images</th>
                                <th>Client</th>
                                <th>Project Date</th>
                                <th>Project URL</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Images</th>
                                <th>Client</th>
                                <th>Project Date</th>
                                <th>Project URL</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $portfolio->title }}</td>
                                    <td>{{ Str::limit($portfolio->description, 50) }}</td>
                                    <td>{{ $portfolio->category }}</td>
                                    <td>
                                        @if ($portfolio->images)
                                            @foreach (json_decode($portfolio->images) as $image)
                                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $portfolio->title }}" width="100" class="mr-2">
                                            @endforeach
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $portfolio->client }}</td>
                                    <td>{{ $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('d-F-Y') : 'N/A' }}</td>
                                    <td><a href="{{ $portfolio->url }}" target="_blank">{{ Str::limit($portfolio->url, 30) }}</a></td>
                                    <td>
                                        <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this entry?')">
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
