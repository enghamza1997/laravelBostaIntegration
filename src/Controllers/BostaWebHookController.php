<?php

namespace BiztechEG\laravelBostaIntegration\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\BostaService;
use BiztechEG\laravelBostaIntegration\Models\OrderPackage;
use Hash;
use Illuminate\Http\Request;

class BostaWebHookController extends Controller
{
    /**
     * @param Illuminate\Http\Request $request
     * 
     */
    public function webHook(Request $request)
    {
        info($request);
        if ($request->filled('trackingNumber') && $package = $this->getPackage($request->trackingNumber)) {
            # order has beed founded 
            // if ($request->headers->has('Autherization') && hash('ripemd160', $package->order_id) == $request->headers->has('Autherization')) {
            $bostaService = new BostaService;
            $bostaService->createTrackHistory($package, $request);
            return response()->json([
                'success' => true,
                'message' => 'Track history registered successfully'
            ]);
            // }
            throw new \Exception('unauthorized', 401);
        }
    }


    /**
     * $@param string $trackingNumber
     * @return \BiztechEG\laravelBostaIntegration\Models\OrderPackage
     */
    private function getPackage($trackingNumber)
    {
        return OrderPackage::where('tracking_number', $trackingNumber)->firstOrfail();
    }
}
