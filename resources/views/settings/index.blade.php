@extends('layouts.app')

@section('content')
@php
    $link = App\Models\User::where('id',1)->first();
@endphp
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">Social Media Links</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Social Media Links Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Twitter</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th>LinkedIn</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Twitter</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th>LinkedIn</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          
                                <tr>
                                    <td>1</td>
                                    <td><a href="{{ $link->twitter ?? '' }}" target="_blank">{{ $link->twitter ?? '' }}</a></td>
                                    <td><a href="{{ $link->facebook ?? '' }}" target="_blank">{{ $link->facebook ?? '' }}</a></td>
                                    <td><a href="{{ $link->instagram ?? '' }}" target="_blank">{{ $link->instagram ?? '' }}</a></td>
                                    <td><a href="{{ $link->linkedin ?? '' }}" target="_blank">{{ $link->linkedin ?? '' }}</a></td>
                                    <td>
                                        <a href="{{ route('admin.social-links.edit', $link->id) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>                                        
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
