<?php
/**
 * tribute2
 * Olamiposi
 * 04/01/2021
 * 17:02
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    Yearly Memorials
@endsection
@section('css')
    <link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Manage Yearly Memorials</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Memorials</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card overflow-hidden">
                    @include('partials.success')
                    <div class="card-body">
                        <div>
                            <h2 class="card-title mb-5" style="font-size: 30px">Memorials</h2>
                            {{--                            <p class="text-uted card-sub-title">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>--}}
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="example1">
                                <thead>
                                <tr>
                                    <th class="wd-20p">Website</th>
                                    <th class="wd-25p">Created By</th>
                                    <th class="wd-20p">Created on</th>
                                    <th class="wd-20p">Status</th>
                                    <th class="wd-20p"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($memorials as $mem)
                                    <tr>
                                        <td>
                                            {{ $mem->slug }}
                                        </td>
                                        <td>{{ $mem->users->name }}</td>
                                        <td>{{ $mem->created_at->format('M d , Y') }}</td>
                                        <td>
                                            @if(\Carbon\Carbon::now() >= $mem->expiry_date)
                                                <span style="background-color: #dc3545" class="badge badge-success">Expired</span>
                                            @else
                                                <span style="background-color: #28a745" class="badge badge-success">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-hspace text-center" style="text-align: center">
                                                <button class="btn btn-secondary dropdown-toggle" style="background-color: #65594d;color:white" type="button" data-toggle="dropdown">Action <span class="fa fa-angle-down"></span></button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a href="{{ route('mem.details', $mem->slug) }}" class="dropdown-item" type="button">View</a>
                                                    <a onclick="handleDelete('{{ $mem->slug }}')" class="dropdown-item" type="button">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Content-->
    <!-- Sidebar -->
    <!-- End Sidebar -->
    <!-- Main Footer-->
@endsection

@section('script')
    @include('partials.modal')
    <script>
        function handleDelete(id){
            $('#deleteModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('deleteForm');
            var url = '{{ route('memorial.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
    <script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/table-data.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
@endsection

