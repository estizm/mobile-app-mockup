<?php

namespace App\Interfaces;

use App\Http\Requests\DevicesRequest;

interface DevicesRepositoryInterface
{
    public function save(DevicesRequest $request);
    public function checkSub();
}
