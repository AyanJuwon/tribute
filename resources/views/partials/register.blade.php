@if (session()->has('flash_notification.success'))
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
                <h4 class="modal-header-title">{!! session('flash_notification.success') !!}<span class="fa fa-check-circle"></span> </h4>
            </div>
        </div>
    </div>
</div>


