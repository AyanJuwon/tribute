<?php
/**
 * tribute2
 * Olamiposi
 * 22/12/2020
 * 22:35
 * CREATED WITH PhpStorm
 **/
?>

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
