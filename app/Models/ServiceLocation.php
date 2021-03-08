<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceLocation extends Model
{
    use HasFactory;

    protected $connection = 'customer';
    protected $table = 'serviceLocations';
    protected $guarded = [''];

    public function smartWifi(): HasOne
    {
        return $this->hasOne(ServiceLocationSmartWifi::class, 'serviceLocationId');
    }

    public function loginPage(): HasOne
    {
        return $this->hasOne(HotspotLoginPage::class, 'serviceLocationId');
    }

}
