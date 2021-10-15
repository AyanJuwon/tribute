<?php
/**
 * tribute2
 * Olamiposi
 * 02/03/2021
 * 00:50
 * CREATED WITH PhpStorm
 **/
?>
@if(auth()->user())
    @if($tc != '')
        @if (session()->has('flash_notification.success') && \Carbon\Carbon::parse($tc->created_at)->diffInHours(\Carbon\Carbon::parse(\Carbon\Carbon::now()) >= '24'))
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#exampleModalCenter').modal();
    });
</script>
@endif
        @endif
        @endif
            <!-- Modal -->
            <div class="modal fade bd-example-modal-sm" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #eeeeee">
                            <h3 style="font-size: 20px;font-weight: 900; color: #4d5965" class="modal-title" id="exampleSmallModalLabel">Upgrade your Subscription</h3>
{{--                            <button type="button" class="close " data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
                        </div>
                        <div class="modal-body">
                            <p class="text-muted" style="color: #4d5965">You registered a free memorial, upgrade to a paid memorial now!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a style="background-color: #4d5965" type="button" href="{{route('memorials')}}" class="btn btn-primary">Let's go!</a>
                        </div>
                    </div>
                </div>
            </div>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>--}}
{{--<script>--}}

{{--    var textWrapper = document.querySelector('.ml6');--}}
{{--    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");--}}

{{--    anime.timeline({loop: true})--}}
{{--        .add({--}}
{{--            targets: '.ml6 .letter',--}}
{{--            scale: [4,1],--}}
{{--            opacity: [0,1],--}}
{{--            translateZ: 0,--}}
{{--            easing: "easeOutExpo",--}}
{{--            duration: 300,--}}
{{--            delay: (el, i) => 70*i--}}
{{--        }).add({--}}
{{--        targets: '.ml6',--}}
{{--        opacity: 0,--}}
{{--        duration: 1000,--}}
{{--        easing: "easeOutExpo",--}}
{{--        delay: 1000--}}
{{--    });--}}
{{--</script>--}}

