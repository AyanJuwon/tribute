<?php
/**
 * tribute2
 * Olamiposi
 * 22/01/2021
 * 10:16
 * CREATED WITH PhpStorm
 **/
?>

<div class="memorial-view-bottom">

    <h5 class="memorial-view-heading">Post a tribute</h5>
    @if (auth()->user())
    <p class="memorial-view-login">
        <a href="{{route('login')}}" class="memorial-view-link">Log in</a>
        to post a tribute for {{$detail->first_name. ' ' .$detail->last_name}}
    </p>
    @else
    <form>
    </form>

    @endif

</div>