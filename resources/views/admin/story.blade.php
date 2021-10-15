<?php
/**
 * tribute2
 * Olamiposi
 * 21/12/2020
 * 20:06
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    Admin
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
                <h2 class="main-content-title tx-24 mg-b-5">Stories</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Stories</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row row-sm">
            {{--                <div class="row">--}}
            <div class="col-sm-4 col-md-4 col-xl-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Stories</p>
                        <h3 class="mb-0">{{ number_format(\App\Stories::allStories()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-xl-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Stories with Images</p>
                        <h3 class="mb-0">{{ number_format(\App\Stories::getStoriesWithImages()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-xl-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Stories without Images</p>
                        <h3 class="mb-0">{{ number_format(\App\Stories::getStoriesWithoutImages()) }}</h3>
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
                            <h2 class="card-title mb-5" style="font-size: 30px">Stories</h2>
                            {{--                            <p class="text-uted card-sub-title">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>--}}
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="example1">
                                <thead>
                                <tr>
                                    <th class="wd-20p">Added by</th>
                                    <th class="wd-25p">Story Posted</th>
                                    <th class="wd-20p">Date</th>
                                    <th class="wd-15p">Image</th>
                                    <th class="wd-20p"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stories as $story)
                                    <tr>
                                        <td>
                                            @if($story->from != '')
                                                {{ $story->from }}
                                            @else
                                                {{ $story->user->name }}
                                            @endif
                                        </td>
                                        <td>{{ substr($story->story, 0, 100) }}....</td>
                                        <td>{{ $story->created_at->format('M d , Y') }}</td>
                                        @if($story->image == '')
                                            <td>No Image Added</td>
                                        @else
                                            <td><img src="{{ asset('uploads/story/'.$story->image) }}" /> </td>
                                        @endif
                                        <td>

                                            <div class="btn-group btn-hspace text-center">
                                                <button class="btn btn-secondary dropdown-toggle" style="background-color: #65594d;color:white" type="button" data-toggle="dropdown">Action <span class="fa fa-angle-down"></span></button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ route('stories.edit', $story->id) }}">Edit</a>
                                                    <a class="dropdown-item" onclick="handleDelete('{{ $story->id }}')">Delete</a>
                                                    @if($story->active == true)
                                                        <a class="dropdown-item" onclick="handleDeletee('{{ $story->id }}')">Ban</a>
                                                    @else
                                                        <a class="dropdown-item" onclick="handleDeleteee('{{ $story->id }}')">Unban</a>
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
            var url = '{{ route('stories.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
    <script>
        function handleDeletee(id){
            $('#deactivateStoryModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('deactivateStoryForm');
            var url = '{{ route('stories.deactivate', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
    <script>
        function handleDeleteee(id){
            $('#activateStoryModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('activateStoryForm');
            var url = '{{ route('stories.activate', [':id']) }}';
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

