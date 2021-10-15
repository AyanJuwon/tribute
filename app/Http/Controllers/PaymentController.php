<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($id){
        $trans = Payment::where('id', $id)->firstOrFail();

        return view('admin.paymentdetails')
            ->with('trans', $trans);
    }
}
