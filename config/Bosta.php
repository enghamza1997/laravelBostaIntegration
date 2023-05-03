<?php
/*
    |api---------------------------------------------------------------------
    | prefix Defaults
    |--------------------------------------------------------------------------
    | prefix
    | This option controls the default admin dashboard URL prefix
    | middleware
    | This option controls the applied middleware for admin dashboard 
    */

use App\Models\Order;

return [

  'tracking_url' => 'https://bosta.co/tracking-shipments?shipment-number=',
  'sandboxMode' => env('BOSTA_SANDBOX_MODE', false),
  'baseUrl' => env('BOSTA_BASE_URL', 'https://app.bosta.co'),
  'sandBoxBaseUrl' => env('BOSTA_SANDBOX_BASE_URL', 'https://stg-app.bosta.co'),
  'ApiKey' => '9d04469456ecc29de1e79d7007446c74575d80a421a5fdbeab6b6678452e44a8',
  'sandBoxApiKey' => '11faf0426ed3b477fc08bf04ddc42a500622774a7e651aad765bf6df857bc1b1',
  'apiPath' => '/api/v2',

  'api_prefix' => env('BOSTA_API_PREFIX', 'api'),
  'api_middleware' => ['api'],

  'fulfillmentApiPath' => '/api/v0',

  'pickUpAddress' => [
    'city' => 'Red Sea',
    'zone' => 'Qesm Hurghada 2',
    'district' => 'Qesm Hurghada 2',
    'firstLine' => 'el-mohandseen',
    'secondLine' => 'el-mohandseen',
    'floor' => '1',
    'apartment' => '2',
    'buildingNumber' => '12',
    'isWorkAddress' => 'false'
  ],

  'order_table' => [
    /** table name where you store orders information */
    'table_name' => 'orders',
    /**orders table primery key name */
    'order_id_filed_name' => 'id'    
  ],

  'OrderDetailModal' => App\Models\OrderDetail::class,
  // 'OrderModal' => App\Models\Order::class
];
