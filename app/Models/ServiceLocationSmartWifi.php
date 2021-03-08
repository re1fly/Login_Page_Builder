<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceLocationSmartWifi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'smart_wifi';
    protected $table = 'serviceLocationSmartWifis';
    protected $guarded = [''];

    public function smartWifi(): HasOne
    {
        return $this->hasOne(ServiceLocationSmartWifi::class, 'serviceLocationId');
    }

}
