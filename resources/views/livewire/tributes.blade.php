<div class="row">
    <div class="col-md-9 col-sm-7 single-info wow fadeInUp">
        <h5>Tributes | @if(auth()->user())<a href="#tribute" style="text-decoration: underline;">Leave a Tribute >@else <a href="#" data-toggle="modal" data-target="#login"><b>Sign in to Leave a tribute</b> </a>    @endif</a> </h5>
        @foreach($tributes as $tribute)
            <div class="condolence-item margin-bottom-30">
                            <span class="meta">
                        <b>Tribute From:</b> {{ $tribute->user->name }}
                        <span><i class="fa fa-calendar"></i> {{ $tribute->created_at->format('M d , Y') }}</span>

                            </span>
                <p><em>{{ $tribute->tribute }}</em></p>

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox_rxma text-center"></div>

                {{--                        <cite>-Love Rosanne</cite>--}}
            </div>
        @endforeach

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
                    @include('partials.success')
                    @include('partials.error')
                    <form wire:submit.prevent="addTribute">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" cols="30" rows="6" placeholder="Type your Tribute......" wire:model.debounce.500ms="tribute"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn search-btn" style="background-color: #65594d;color:white">Publish</button>
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


