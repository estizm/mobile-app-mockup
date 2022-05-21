<?php

namespace App\Interfaces;

use App\Http\Requests\PurchaseStoreRequest;

interface PurchaseRepositoryInterface
{
    public function purchase(PurchaseStoreRequest $request);
    public function subscription(string $clientToken);
}
