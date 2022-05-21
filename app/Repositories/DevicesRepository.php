<?php

namespace App\Repositories;

use App\Http\Requests\DevicesRequest;
use App\Interfaces\DevicesRepositoryInterface;
use App\Models\Devices;

class DevicesRepository implements DevicesRepositoryInterface
{

    public function save(DevicesRequest $request)
    {
        return Devices::create($request->toArray());
    }

    public function find(string $uid)
    {
        return Devices::where('uid', $uid)->first();
    }

    public function purchase()
    {
        // TODO: Implement purchase() method.
    }

    public function checkSub()
    {
        // TODO: Implement checkSub() method.
    }
}
