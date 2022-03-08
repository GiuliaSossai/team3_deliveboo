<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function generate(Request $request, Gateway $gateway){
        // $gateway = new Gateway([
        //     'environment' => 'sandbox',
        //     'merchantId' => '64nmzg3dhd34vvh7',
        //     'publicKey' => 'gyy6c2h63b9hc5x3',
        //     'privateKey' => '5e0a37a0db2beef5cb29a7a131cd84c5'
        // ]);
        dd($gateway->clientToken()->generate());
        return 'generate';
    }

    public function makePayment(Request $request)
    {
        return 'makePayment';
    }
}
