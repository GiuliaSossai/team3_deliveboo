<?php

namespace App\Http\Controllers\Api;

use App\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationPayment;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(Request $request, Gateway $gateway)
    {

        $data = $request->all();

        $cart = $data['cart'];

        $restaurant_id = $cart[0]["restaurant_id"];


        // return response()->json($restaurant_id);

        $validator = Validator::make($data, [
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'token' => 'required',
            'total' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $result = $gateway->transaction()->sale([
            'amount' => $request->total,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data_1 = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];

            $new_order = new Order();

            $new_order->restaurant_id = $restaurant_id;
            $new_order->customer_name = $data['name'];
            $new_order->customer_surname = $data['surname'];
            $new_order->delivery_address = $data['address'];
            $new_order->customer_email = $data['email'];
            $new_order->customer_phone = $data['phone'];
            $new_order->final_price = $data['total'];

            $new_order->save();

            // foreach ($cart as $item) {
            //     $new_order->dishes()->attach($item['dish_id'], ['quantity' => $item['quantity']]);
            // }

            // foreach ($cart as $item) {
            //     $new_order->dishes()->attach($item, ['quantity' => $item]);
            // }


            return response()->json($data_1, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!"
            ];
            return response()->json($data, 401);
        }
    }
}
