<?php
/**
 * tribute2
 * Olamiposi
 * 09/03/2021
 * 16:35
 * CREATED WITH PhpStorm
 **/
?>


@extends('layouts.dashboard')
@section('title')
    All Users
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
                <h2 class="main-content-title tx-24 mg-b-5">Manage Users</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Banned Users</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row row-sm">
            {{--                <div class="row">--}}
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Number of Banned Users</p>
                        <h3 class="mb-0">{{ number_format(\App\User::bannedUsersCount()) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!--End  Row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card overflow-hidden">
                    @include('partials.success')

                    <div class="card-body">
                        <div>
                            <h2 class="card-title mb-5" style="font-size: 30px">Users</h2>
                            {{--                            <p class="text-uted card-sub-title">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>--}}
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="example1">
                                <thead>
                                <tr>
                                    <th class="wd-20p">Name</th>
                                    <th class="wd-25p">Email</th>
                                    <th class="wd-25p">Country</th>
                                    <th class="wd-25p">Status</th>
                                    <th class="wd-20p">Created On</th>
                                    <th class="wd-20p"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->country }}</td>
                                        @if($user->isBan == true)
                                        <td><span style="background-color: #dc3545" class="badge badge-success">Suspended</span></td>
                                        @endif
                                        <td>{{ $user->created_at->format('M d , Y') }}</td>
                                        <td>

                                            <div class="btn-group btn-hspace text-center">
                                                <button class="btn btn-secondary dropdown-toggle" style="background-color: #65594d;color:white" type="button" data-toggle="dropdown">Action <span class="fa fa-angle-down"></span></button>
                                                <div class="dropdown-menu" role="menu">
                                                    @if($user->isBan == 1)
                                                        <a class="dropdown-item" onclick="handleDeletee('{{ $user->id }}')">Activate User</a>
                                                    @else
                                                        <a class="dropdown-item" onclick="handleDelete('{{ $user->id }}')">Deactivate User</a>
                                                    @endif

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


@endsection
@section('script')
    @include('partials.modal')
    <script>
        function handleDelete(id){
            $('#deactivateModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('deactivateForm');
            var url = '{{ route('users.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
    <script>
        function handleDeletee(id){
            $('#activateModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('activateForm');
            var url = '{{ route('users.activate', [':id']) }}';
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
