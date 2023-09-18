<?php

namespace App\Http\Controllers;

use App\Http\Services\FatoorahServices;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    private $fatoorahService;

   public function __construct(FatoorahServices $fatoorahService)
   {
        $this->fatoorahService = $fatoorahService;
   }


    public function payOrder()
    {
        $data = [
            "CustomerName" => "Ali",
            "NotificationOption" => "LNK",
            "invoiceValue" => 100,
            "CustomerEmail"=>"ali@example.com",
            "CallBackUrl" => "http//google.com", //env('fatoora.success_url') 
            "ErrorUrl"=>  "http//yotube.com" ,//env('fatoora.error_url'),
            "language" =>"en",
            "DisplayCurrencIsoy"=>"SAR",
        ];

        return $this->fatoorahService->sendPayment($data); 
    }
}
