<?php
/**
 * tribute2
 * Olamiposi
 * 15/12/2020
 * 21:10
 * CREATED WITH PhpStorm
 **/
?>

@extends('layouts.dashboard')

@section('title')
    Payment Details
@endsection
@section('content')
    
  <main>
            <section class="dashboard profile-container">
                <div class="payment-top">
                    <h4 class="profile-heading">Payment Log</h4>

                </div>
                <table class="payment-table">
                    <thead class="payment-table__table-head">
                        <tr class="payment-table__table-row">
                            <th class="table-check-head">
                                <label class="table-check">
                                    <input type="checkbox">
                                    <span class="table-checkmark"></span>
                                </label>
                            </th>
                            <th class="payment-table__head-title">Memorial</th>
                            <th class="payment-table__head-title">Plan</th>
                            <th class="payment-table__head-title">Amount</th>
                            <th class="payment-table__head-title">Payment Date</th>
                            <th class="payment-table__head-title">Expiration Date</th>
                        </tr>
                    </thead>
                    <tbody class="payment-table__table-body">
                                 
                    @if(\App\Payment::countPayment() == 0)
                        <h3 style="text-align: center;font-size: 30px">Nothing to show yet</h3>
                        @else
@foreach($details as $detail)
                        <tr class="payment-table__table-row">
                            <td class="table-check-body">
                                <label class="table-check">
                                    <input type="checkbox">
                                    <span class="table-checkmark"></span>
                                </label>
                            </td>
                            <td class="payment-table__table-data">{{$detail->memorial->first_name. ' '.$detail->memorial->last_name}}</td>
                            <td class="payment-table__table-data">{{$detail->memorial->plan_type}}</td>
                            <td class="payment-table__table-data">
                                @if($detail->memorial->plan_type == 'free')
                                --
                                @else{{$detail->amount}}@endif</td>
                            <td class="payment-table__table-data">{{$detail->memorial->created_at->toDateString()}}</td>
                            <td class="payment-table__table-data">{{$detail->memorial->expiry_date->toDateString()}}</td>
                        </tr>
                      
                            @endforeach
                @endif     </tbody>
                </table>
            </section>
        </main>
@endsection
                                
                   