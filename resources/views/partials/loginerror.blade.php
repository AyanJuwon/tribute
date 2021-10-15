<?php
/**
 * tribute
 * Olamiposi
 * 14/10/2020
 * 23:54
 * CREATED WITH PhpStorm
 **/
?>

@if($errors->any())
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#exampleModal2').modal();
        });
    </script>
@endif

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="registermodal">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Sign In/Sign Up Error<span class="fa fa-times-circle"></span></h4>
            </div>
        </div>
    </div>
</div>
