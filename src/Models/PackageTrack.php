<?php

namespace BiztechEG\laravelBostaIntegration\Models;

use Illuminate\Database\Eloquent\Model;

class PackageTrack extends Model
{
    protected $fillable = [
        'cod',
        'state_code',
        'request_id',
        'exception_code',
        'exception_reason',
        'tracking_number',
        'is_confirmed_delivery',
        'delivery_promise_date',
        'updated_at',
    ];

    protected $casts = [
        'delivery_promise_date' => 'date',
        'is_confirmed_delivery' => 'boolean',
        'state_code' => 'int',
    ];
    
    public function TrackingHistory()
    {
        return $this->hasMany(TrackHistory::class, 'tracking_number');
    }

    public function state()
    {
        return $this->hasOne(PackageState::class,'state_code','state_code');
    }

    public function exception()
    {
        return $this->hasOne(ExceptionReason::class,'reason_code','exception_code');
    }
}
