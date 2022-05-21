<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseStoreRequest;
use App\Repositories\PurchaseRepository;
use \Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    private PurchaseRepository $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    public function purchase(PurchaseStoreRequest $request): JsonResponse
    {
        $userAgent = $request->header('user_agent');
        if (str_contains($userAgent, 'Apple')) {
            $isReceiptOkay = iosMockup($request->get('receipt'));
        } else {
            $isReceiptOkay = googleMockup($request->get('receipt'));
        }
        if ($isReceiptOkay == 0) {
            $response = [
                "status" => true,
                "expire-date" => Carbon::now('UTC')->setTimezone('America/Los_Angeles')->format('Y-m-d H:i:s')
            ];
            $this->purchaseRepository->purchase($request);
        } else {
            $response = [
                "status" => false,
            ];
        }
        return response()->json($response);
    }

    public function subscription(PurchaseStoreRequest $request): JsonResponse
    {
        $subscriptionStatus = $this->purchaseRepository->subscription($request->get('client-token'));
        return response()->json($subscriptionStatus['expire-date']);
    }
}
