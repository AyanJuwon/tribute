<?php
/**
 * tribute2
 * Olamiposi
 * 15/01/2021
 * 20:15
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.user')
@section('title')
    Search result
@endsection
@section('content')
    <div class="facilities padding-top-100 padding-bottom-40 wow fadeInUpBig">
        <div class="container">
            <div class="section-head text-center margin-bottom-70">
                <h3 class="h2" style="text-decoration: underline">Search Result</h3>
            </div>
            <div class="row">
                @forelse($memorial as $mem)
                <div class="col-md-9 col-md-offset-1">
                    <div class="team-info">
                        <div class="col-md-3">
                            <img src="{{ asset('uploads/memorial/'.$mem->picture) }}"  class="img-responsive img-circle" alt="" />
                        </div>
                        <div class="col-md-9">
                            <div class="staff-title"><span>{{ \App\Memorial::fullname($mem) }}</span></div>
                            <p class="">{!!  substr($mem->main_section_text, 0,200) !!}...</p>
                            <div class="padding-bottom-20"></div>
                            <a href="{{ $mem->slug  }}" class="btn btn-primary btn-md paddding-horizontal-30">Visit Memorial</a>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @empty
                    <div class="col-md-12 text-center">
                        <h4 style="font-size: 22px">{{ \App\Memorial::memorialCount() == 0 ? 'No Memorial Yet ' : 'No Memorial found for' . ' ' . request()->query('query') }}</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
