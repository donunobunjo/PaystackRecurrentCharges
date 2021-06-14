<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MyController extends Controller
{
    public function __construct()
    {
        // $this->client = new Client([
        //     'headers' => [
        //         'Cache-Control' => 'no-cache',
        //         'Content-Type' => 'application/json',
        //     ],
        //     'connect_timeout' => 0
        // ]);
    }
    public function testing(Request $request){
        
        $SECRET_KEY = env('PAYSTACK_SECRET_KEY');
        $authCode = 'Bearer ' . $SECRET_KEY;
        $response = Http::withHeaders([
            'Authorization' => $authCode,
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache'
        ])->post('https://api.paystack.co/transaction/charge_authorization', [
            'authorization_code' => 'AUTH_wdhz30p1ct',
            'email'=> 'don.unobunjo@gmail.com',
            'amount'=> 780000
        ]);
        $result_out = json_decode($response->getBody()->getContents());
        dd($result_out);



            // $options = [
            //     'decode_content' => false
            // ];
            // $options['headers'] = ['Authorization' => 'Bearer ' . $SECRET_KEY];

            
            // $response = $this->client->post("https://api.paystack.co/transaction/charge_authorization", $options);
           

            // $result_out = json_decode($response->getBody()->getContents());

            // $result = $result_out->data->authorization;

    }
}
