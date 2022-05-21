<?php

namespace App\Repositories;

use App\Http\Requests\PurchaseStoreRequest;
use App\Interfaces\PurchaseRepositoryInterface;
use App\Models\Devices;
use App\Models\Purchase;
use Carbon\Carbon;

class PurchaseRepository implements PurchaseRepositoryInterface
{

    public function purchase(PurchaseStoreRequest $request)
    {
        $device = Devices::where('client-token', $request->get('client-token'))->first();
        $purchase = Purchase::create($request->except('device_id'));
        Purchase::whereId($purchase->id)->update([
            'device_id' => $device->id,
            'expire-date' => Carbon::now('UTC')->setTimezone('America/Los_Angeles')->format('Y-m-d H:i:s')
        ]);
    }

    public function subscription(string $clientToken)
    {
        return Purchase::where('client-token', $clientToken)->first()->toArray();
    }
}
