<?php

namespace App\Http\Services\Checkout;

use App\Models\MasterData\Parameter;
use Xendit\Xendit;

class CheckoutService {

    function __construct() {
        $apiKey     = Parameter::where('code', 'xendit')->first();
        Xendit::setApiKey($apiKey->value);
    }

    public function createInvoice($args) {
  
        $date = new \DateTime();
        $redirectUrl = '';
        $defParams = [
            'external_id' => $args['code'] . $date->getTimestamp(),
            'payer_email' => 'mifaabiyyu@gmail.com', 
            'description' => 'Payment', 
            'failure_redirect_url' => $redirectUrl, 
            'success_redirect_url' => $redirectUrl
        ];

        $data = json_decode(json_encode($args), true);
        $defParams['failure_redirect_url'] = route('fail');
        $defParams['success_redirect_url'] = route('success', base64_encode(base64_encode($args['code'])));
        $params = array_merge($defParams, $data);
        $response = [];

        try {
            $response = \Xendit\Invoice::create($params);
        } catch (\Throwable $e) {
            $response['message'] = $e->getMessage();
        }

        logger($response);
        return $response;
    }
}