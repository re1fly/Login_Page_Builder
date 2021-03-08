<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Router extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'network';
    protected $table = 'routers';
    protected $guarded = [''];

    public function serviceLocations(): BelongsToMany
    {
        return $this->belongsToMany(
            ServiceLocation::class,
            'serviceLocationSmartWifis',
            'routerId',
            'serviceLocationId'
        );
    }

}
