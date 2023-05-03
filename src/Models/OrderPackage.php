<?php

namespace BiztechEG\laravelBostaIntegration\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPackage extends Model
{
    protected $fillable = [
        'order_id',
        'tracking_number',
        'request_id',
        'sender_id',
        'sender_phone',
        'sender_name',
        'account_type',
        'sub_account_id',
        'is_confirmed_delivery',
        'fulfilled',
        'delivery_promise_date',
        'last_state',
        'last_meassage',
    ];

    protected $casts = [
        'delivery_promise_date' => 'date',
        'is_confirmed_delivery' => 'boolean',
        'last_state' => 'int',
    ];

    public function packageItems()
    {
        return $this->hasMany(config('bosta.OrderDetailModal'), 'package_id');
    }

    public function packageTrack()
    {
        return $this->hasMany(PackageTrack::class);
    }

    public function trackingUrl()
    {
        return config('bosta.tracking_url') . $this->tracking_number;
    }

    public function state()
    {
        return $this->hasOne(PackageState::class,'state_code','last_state');
    }
}
