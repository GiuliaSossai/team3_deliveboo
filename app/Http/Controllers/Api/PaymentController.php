<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function generate(Request $request){
        return 'generate';
    }

    public function makePayment(Request $request)
    {
        return 'makePayment';
    }
}
