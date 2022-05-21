<?php

namespace App\Http\Controllers;

use App\Http\Requests\DevicesRequest;
use App\Repositories\DevicesRepository;
use Illuminate\Http\JsonResponse;

class DevicesController extends Controller
{
    private DevicesRepository $devicesRepository;

    public function __construct(DevicesRepository $devicesRepository)
    {
        $this->devicesRepository = $devicesRepository;
    }

    public function register(DevicesRequest $request): JsonResponse
    {
        if (!$this->devicesRepository->find($request->get('uid')))
            $this->devicesRepository->save($request);
        return response()->json(['client-token' => $this->devicesRepository->find($request->get('uid'))['client-token'], 'message' => 'Register OK']);
    }
}
