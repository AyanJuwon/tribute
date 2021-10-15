@extends('layouts.index')
@section('title')
    Tribute - {{ \App\Memorial::fullname($detail) }}
@endsection
@section('description')
    <meta name="description" content="Tribute to {{ \App\Memorial::fullname($detail) }}">
@endsection
@section('css')
    <style type="text/css">
        .read-more-show{
            cursor:pointer;
            color: #c0a16b;
        }
        .read-more-hide{
            cursor:pointer;
            color: #c0a16b;
        }

        .hide_content{
            display: none;
        }
    </style>
@endsection
@section('content')
    @include('partials.foraudio')

    <div class="page_head wow fadeInUp">
        <div class="container">
            <ul class="bcrumbs pull-right">
                <li><a href="{{ route('welcome', $slug) }}">About</a></li>
                <li>Tributes</li>
            </ul>
        </div>
    </div>
    <div class="single-content padding-vertical-100">
        <div class="container">
{{--            <div class="section-head text-center margin-bottom-60 wow fadeInUpBig">--}}
{{--                <h3 class="h2">All Tributes</h3>--}}
{{--                --}}{{--                <p>Request a book of memories.</p>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-9 col-sm-7 single-info wow fadeInUp">
                    <h5>Tributes | @if(auth()->user())<a href="#tribute" style="text-decoration: underline;">Leave a Tribute >@else <a href="#" data-toggle="modal" data-target="#login"><b>Sign in to Leave a tribute</b> </a>    @endif</a> </h5>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(\App\Tribute::getTributebySlug($slug) == 0)
                        <h3>Nothing to show yet</h3>
                        <div class="padding-bottom-20"></div>
                        @else
                    @foreach($tributes as $tribute)
                        @if($tribute->tribute == NULL)
                            <div class="condolence-item margin-bottom-30">
                            <span class="meta">
                        <b>Tribute From:</b>  @if($tribute->from != '')
                                    {{ $tribute->from }}
                                @else
                                    {{ $tribute->user->name }}
                                @endif
                        <span><i class="fa fa-calendar"></i> {{ $tribute->created_at->format('M d , Y') }}</span>
                                   @if(auth()->user())
                                    @if($user->created_by == auth()->user()->id)
                                        <a onclick="handleDelete('{{ $tribute->id }}')" class="reply"><i class="fa fa-close"></i> Delete</a>
                                    @endif
                                    @if($user->created_by != auth()->user()->id)
                                        @if($tribute->user_id == auth()->user()->id)
                                            <a onclick="handleDelete('{{ $tribute->id }}')" class="reply"><i class="fa fa-close"></i> Delete</a>
                                        @endif
                                    @endif
                                @endif

                            </span>
                                <p><em>
                                        @if(strlen($tribute->docs) > 400)
                                            {{ substr($tribute->docs,0,400) }}
                                            <span class="read-more-show hide_content">Read More <i class="fa fa-angle-down"></i></span>
                                            <span class="read-more-content"> {{substr($tribute->docs,400,strlen($tribute->docs))}}
            <span class="read-more-hide hide_content">Read Less <i class="fa fa-angle-up"></i></span> </span>
                                        @else
                                            {{$tribute->docs}}
                                        @endif
                                    </em></p>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_rxma text-center"></div>
                                {{--                        <cite>-Love Rosanne</cite>--}}
                            </div>
                        @else
                            <div class="condolence-item margin-bottom-30">
                            <span class="meta">
                        <b>Tribute From:</b>  @if($tribute->from != '')
                                    {{ $tribute->from }}
                                @else
                                    {{ $tribute->user->name }}
                                @endif
                        <span><i class="fa fa-calendar"></i> {{ $tribute->created_at->format('M d , Y') }}</span>
                                @if(auth()->user())
                                @if($user->created_by == auth()->user()->id)
                                <a onclick="handleDelete('{{ $tribute->id }}')" class="reply"><i class="fa fa-close"></i> Delete</a>
                                @endif
                                @if($user->created_by != auth()->user()->id)
                                @if($tribute->user_id == auth()->user()->id)
                                    <a onclick="handleDelete('{{ $tribute->id }}')" class="reply"><i class="fa fa-close"></i> Delete</a>
                                @endif
                                    @endif
                                @endif


                            </span>
                                <p><em>
                                        @if(strlen($tribute->tribute) > 400)
                                        {{ substr($tribute->tribute,0,400) }}
                                            <span class="read-more-show hide_content">Read More <i class="fa fa-angle-down"></i></span>
                                            <span class="read-more-content"> {{substr($tribute->tribute,400,strlen($tribute->tribute))}}
            <span class="read-more-hide hide_content">Read Less <i class="fa fa-angle-up"></i></span> </span>
                                        @else
                                            {{$tribute->tribute}}
                                        @endif
                                    </em></p>
                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox_rxma text-center"></div>
                                {{--                        <cite>-Love Rosanne</cite>--}}
                            </div>
                        @endif
                    @endforeach
                    @endif

                    <div class="page-nav text-center">
                        <ul class="list-inline">
                            {{ $tributes->links() }}
                        </ul>
                    </div>

                    <br>
                    <br>
                    @if(auth()->user())
                        <div class="comment-box submit-form" id="tribute">
                            <h3 class="reply-title">Leave a Tribute</h3>
                            <br>
                            <div class="comment-form">
                                @include('partials.list_error')
                                @include('partials.success')
                                {{--                                @include('partials.error')--}}
                                <form method="POST" action="{{ route('tributes.save', $slug) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel-group accordion" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="accordion-heading">
                                                        <h4 class="accordion-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                                Type your Tribute
                                                                <i class="indicator fa fa-chevron-down"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" cols="30" rows="10" placeholder="Type your Tribute......" name="tribute"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="accordion-heading">
                                                        <h4 class="accordion-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                                Or Upload Documents, Only (*.docx, *.doc, *.pdf, *.txt) formats
                                                                <i class="indicator fa fa-chevron-right"></i></a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Upload your tribute (document) </label>
                                                                    <br><br>
                                                                    <input name="docs" type="file" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                </div>
                @include('layouts.sidebar')
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

{{--    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>--}}
    <script type="text/javascript">
        // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
        $('.read-more-content').addClass('hide_content')
        $('.read-more-show, .read-more-hide').removeClass('hide_content')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function(e) {
            $(this).next('.read-more-content').removeClass('hide_content');
            $(this).addClass('hide_content');
            e.preventDefault();
        });

        // Changes contributed by @diego-rzg
        $('.read-more-hide').on('click', function(e) {
            var p = $(this).parent('.read-more-content');
            p.addClass('hide_content');
            p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
            e.preventDefault();
        });
    </script>
@endsection
