<?php
/**
 * tribute
 * Olamiposi
 * 27/10/2020
 * 19:05
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    All Tributes
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
                <h2 class="main-content-title tx-24 mg-b-5">Tributes</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Tributes</li>
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
                        <p class="mb-1 text-muted">Total Tributes</p>
                        <h3 class="mb-0">{{ number_format(\App\Tribute::allTributes()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-xl-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Tributes Typed</p>
                        <h3 class="mb-0">{{ number_format(\App\Tribute::getTributeTyped()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-xl-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Tributes Uploaded Via Documents </p>
                        <h3 class="mb-0">{{ number_format(\App\Tribute::getTributeWithUploadedWithDocs()) }}</h3>
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
                            <h2 class="card-title mb-5" style="font-size: 30px">Tributes</h2>
{{--                                                        <p class="text-uted card-sub-title">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>--}}
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="example1">
                                <thead>
                                <tr>
                                    <th class="wd-20p">Added by</th>
                                    <th class="wd-25p">Tribute Posted</th>
                                    <th class="wd-20p">Date</th>
                                    <th class="wd-20p"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tributes as $tribute)
                                    <tr>
                                        <td>
                                            @if($tribute->from != '')
                                                {{ $tribute->from }}
                                            @else
                                                {{ $tribute->user->name }}
                                            @endif
                                        </td>
                                        @if($tribute->tribute == NULL)
                                            <td>{{ substr($tribute->docs, 0, 100) }}....</td>
                                        @else
                                            <td>{{ substr($tribute->tribute, 0, 100) }}....</td>
                                        @endif
                                        <td>{{ $tribute->created_at->format('M d , Y') }}</td>
                                        {{--                                    @if($story->image == '')--}}
                                        {{--                                        <td>No Images Added</td>--}}
                                        {{--                                    @else--}}
                                        {{--                                        <td><img src="{{ asset('uploads/story/'.$story->image) }}" /> </td>--}}
                                        {{--                                    @endif--}}
                                        <td>

                                            <div class="btn-group btn-hspace text-center">
                                                <button class="btn btn-secondary dropdown-toggle" style="background-color: #65594d;color:white" type="button" data-toggle="dropdown">Action <span class="fa fa-angle-down"></span></button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ route('tribute.edit', $tribute->id) }}">Edit</a>
                                                    <a class="dropdown-item" onclick="handleDelete('{{ $tribute->id }}')">Delete</a>
                                                    @if($tribute->active == true)
                                                    <a class="dropdown-item" onclick="handleDeletee('{{ $tribute->id }}')">Ban</a>
                                                    @else
                                                        <a class="dropdown-item" onclick="handleDeleteee('{{ $tribute->id }}')">Unban</a>
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
            $('#deleteModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('deleteForm');
            var url = '{{ route('tribute.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
    <script>
        function handleDeletee(id){
            $('#deactivateTributeModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('deactivateTributeForm');
            var url = '{{ route('tribute.deactivate', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
    <script>
        function handleDeleteee(id){
            $('#activateTributeModal').modal({backdrop: 'static',keyboard : false});
            var form = document.getElementById('activateTributeForm');
            var url = '{{ route('tribute.activate', [':id']) }}';
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
