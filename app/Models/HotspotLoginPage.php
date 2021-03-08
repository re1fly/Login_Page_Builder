<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class HotspotLoginPage extends Model
{
    use HasFactory;

    protected $connection = 'smart_wifi';
    protected $table = 'hotspotLoginPages';
    protected $guarded = [''];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function form(): HasOne
    {
        return $this->hasOne(HotspotLoginForm::class, 'loginPageId');
    }

    public function serviceLocation(): BelongsTo
    {
        return $this->belongsTo(ServiceLocation::class, 'serviceLocationId');
    }


    public function logoUrl()
    {
        return Storage::disk('public')->url($this->logo);
    }

    public function backgroundUrl()
    {
        return Storage::disk('public')->url($this->background);
    }

}
