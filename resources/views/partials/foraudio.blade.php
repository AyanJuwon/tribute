<?php
/**
 * tribute
 * Olamiposi
 * 24/10/2020
 * 09:25
 * CREATED WITH PhpStorm
 **/
?>
@if($detail->music != 'NULL')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#exampleModal').modal();
        });
    </script>
@endif


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="registermodal">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Audio Enabled </h4>
{{--                <form method="POST">--}}
                    <div class="text-center">
{{--                <h4 class="modal-header-title">{!! session('flash_notification.success') !!} <br> <span class="fa fa-check-circle"></span></h4>--}}
                <button data-bb-handler="ok" type="button" id="ok" class="btn btn-primary">OK</button>
                    </div>
{{--                </form>--}}
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('ok').addEventListener('click', function () {
        // var player = document.getElementById('myAudio-mobile')
        // player.play()
        var player1 = document.getElementById('myAudio')
        player1.play()
        $('#exampleModal').modal('hide');
    })
</script>
