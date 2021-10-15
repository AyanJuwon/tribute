@extends('layouts.dashboard')
@section('title')
    Admin
@endsection
@section('css')
{{--    <link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet">--}}
{{--    <link href="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Home</h2>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row row-sm">
            {{--                <div class="row">--}}
            <div class="col-sm-3 col-md-3 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Users</p>
                        <h3 class="mb-0">{{ \App\User::userCount() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Memorials</p>
                        <h3 class="mb-0">{{ number_format(\App\Memorial::memorialCount()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Daily sales count</p>
                        <h3 class="mb-0">{{ number_format(\App\Payment::dsalescount()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Sales Amount</p>
                        <h3 class="mb-0">₦ {{ number_format(\App\Payment::damount()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total View Count</p>
                        <h3 class="mb-0">{{ number_format(\App\Memorial::viewCount()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xl-3">
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
            <div class="col-sm-3 col-md-3 col-xl-3">
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
            <div class="col-sm-3 col-md-3 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Total Images</p>
                        <h3 class="mb-0">{{ number_format(\App\AddImages::imageCount()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Suspended Memorials</p>
                        <h3 class="mb-0">{{ number_format(\App\Memorial::suspendedMemorials()) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="icon-service bg-primary-transparent rounded-circle text-primary">
                            <i class="fe fe-user"></i>
                        </div>
                        <p class="mb-1 text-muted">Banned Users</p>
                        <h3 class="mb-0">{{ number_format(\App\User::bannedUsersCount()) }}</h3>
                    </div>
                </div>
            </div>

        </div>
        <!--End  Row -->
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">Payment History</h6>
{{--                            <p class="text-muted  card-sub-title">Below is the basic bar chart example.</p>--}}
                        </div>
                        <div class="chartjs-wrapper-demo">
                            <canvas id="chartBar1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">Packages</h6>
{{--                            <p class="text-muted  card-sub-title">Below are an example of data in a donut chart.</p>--}}
                        </div>
                        <div class="chartjs-wrapper-demo">
                            <canvas id="chartPie"></canvas>
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
            var url = '{{ route('stories.destroy', [':id']) }}';
            url = url.replace(':id', id);
            form.action = url;
        }
    </script>
<script>
    var datapie = {
        labels: ['Free','Monthly', 'Yearly', 'Lifetime'],
        datasets: [{
            data: [
                {{ \App\Memorial::fcount() }},
                {{ \App\Memorial::mcount() }},
                {{ \App\Memorial::ycount() }},
                {{ \App\Memorial::lcount() }}],
            backgroundColor: ['#eee','#8760fb', '#eb6f33', '#01b8ff']
        }]
    };
    var optionpie = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: true,
        },
        animation: {
            animateScale: true,
            animateRotate: true
        }
    };

    /* Doughbut Chart*/
    var ctx6 = document.getElementById('chartPie');
    var myPieChart6 = new Chart(ctx6, {
        type: 'doughnut',
        data: datapie,
        options: optionpie
    });
</script>
    <script>
        var ctx = document.getElementById("chartBar1").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: 'Payment Details',
                    data: [
                        {{ $trans->transaction(1) }},
                        {{ $trans->transaction(2) }},
                        {{ $trans->transaction(3) }},
                        {{ $trans->transaction(4) }},
                        {{ $trans->transaction(5) }},
                        {{ $trans->transaction(6) }},
                        {{ $trans->transaction(7) }},
                        {{ $trans->transaction(8) }},
                        {{ $trans->transaction(9) }},
                        {{ $trans->transaction(10) }},
                        {{ $trans->transaction(11) }},
                        {{ $trans->transaction(12) }},
                    ],
                    borderWidth: 2,
                    backgroundColor: '#c0a16b',
                    borderColor: '#c0a16b',
                    borderWidth: 2.0,
                    pointBackgroundColor: '#ffffff',

                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            // stepSize: 200000000000,
                            fontColor: "#77778e",
                        },
                        gridLines: {
                            color: 'rgba(119, 119, 142, 0.2)'
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: true,
                            fontColor: "#77778e",
                        },
                        gridLines: {
                            display: false,
                            color: 'rgba(119, 119, 142, 0.2)'
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontColor: "#000"
                    },
                },
            }
        });
    </script>
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

{{--    <script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/js/table-data.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>--}}
{{--    <script src="{{asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>--}}
@endsection

