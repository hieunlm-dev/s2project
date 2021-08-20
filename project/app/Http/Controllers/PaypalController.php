<?php

namespace App\Http\Controllers;

use App\Services\PayPalService;
use Illuminate\Http\Request;
use Session;

class PaypalController extends Controller
{
    private $paypalSvc;

    public function __construct(PayPalService $paypalSvc)
    {
        //parent::__construct();

        $this->paypalSvc = $paypalSvc;
    }

    public function index()
    {   
        $cart = Session::get('cart');
        $total = 0;
        $quantity = 0;
        foreach($cart as $item){
            $total += $item->quantity * $item->price;
            $quantity += $item->quantity;
        }
        $total2 = $total / 23000;
        $data = [
            [
                'name' => 'Payment for 2HATStore',
                'quantity' => 1,
                'price' => $total2,
                // 'sku' => '1'
            ]
        ];
        session()->forget('cart');
        // $data =[];
        // $data['items'] = [];
        // $cart = Session::get('cart');
        // foreach($cart as $key=>$cart){
        //     $itemDetail=[
        //         'name' => $cart->name,
        //         'quantity' => $cart->quantity,
        //         'price' => ($cart->price)/23000,
        //     ];
        //     $data['items'] = $itemDetail;
        // }
        $transactionDescription = "Payment 2HATStore";

        $paypalCheckoutUrl = $this->paypalSvc
            // ->setCurrency('eur')
            ->setReturnUrl(url('pay/status'))
            // ->setCancelUrl(url('paypal/status'))
            ->setItem($data)
            // ->setItem($data[0])
            // ->setItem($data[1])
            ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) {
            return redirect($paypalCheckoutUrl);
        } else {
            dd(['Error']);
        }
    }

    public function status()
    {
        $paymentStatus = $this->paypalSvc->getPaymentStatus();
        dd($paymentStatus);
    }

    public function paymentList()
    {
        $limit = 10;
        $offset = 0;

        $paymentList = $this->paypalSvc->getPaymentList($limit, $offset);

        dd($paymentList);
    }

    public function paymentDetail($paymentId)
    {
        $paymentDetails = $this->paypalSvc->getPaymentDetails($paymentId);

        dd($paymentDetails);
        echo('Test ');
    }
}
