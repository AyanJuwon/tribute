<?php
/**
 * tribute2
 * Olamiposi
 * 21/12/2020
 * 21:13
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')
@section('title')
    Transaction History
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
                <h2 class="main-content-title tx-24 mg-b-5">Transactions</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Transactions</li>
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
                            <h2 class="card-title mb-5" style="font-size: 30px">Manage Transactions</h2>
                            {{--                            <p class="text-uted card-sub-title">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>--}}
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="example1">
                                <thead>
                                <tr>
                                    <th class="wd-20p">Full Name</th>
                                    <th class="wd-25p">Email</th>
                                    <th class="wd-20p">Amount</th>
                                    <th class="wd-15p">Memorial Website</th>
                                    <th class="wd-25p">Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payment as $pay)
                                    <tr>
                                        <td>
                                          {{ $pay->users->name }}
                                        </td>
                                        <td>{{ $pay->users->email }}</td>
                                        <td>{{ number_format($pay->amount)}}</td>
                                        <td>{{ $pay->memorial->slug }}</td>
                                       <td>{{ $pay->created_at->format('M d , Y')  }}</td>
                                       <td>
                                           <div class="btn-group btn-hspace text-center" style="text-align: center">
                                               <a href="{{ route('paymentDet', $pay->id) }}" class="btn btn-secondary dropdown-toggle" style="background-color: #65594d;color:white;text-align: center;" type="button">View</a>

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

