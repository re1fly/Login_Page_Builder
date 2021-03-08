<?php

namespace App\Models;

use App\Constants\LoginType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HotspotLoginPage extends Model
{
    use HasFactory;

    protected $connection = 'smart_wifi';
    protected $table = 'hotspotLoginPages';
    protected $guarded = [''];

    protected $casts = [
        'attributes' => 'array',
        'log' => 'array',
    ];

    protected $dates = [
        'date',
    ];


    public function form(): HasOne
    {
        return $this->hasOne(HotspotLoginForm::class, 'loginPageId');
    }

    public function serviceLocation(): BelongsTo
    {
        return $this->belongsTo(ServiceLocation::class, 'serviceLocationId');
    }

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class, 'loginPageId');
    }


    public function logoUrl()
    {
        return Storage::disk('public')->url($this->logo);
    }

    public function backgroundUrl()
    {
        return Storage::disk('public')->url($this->background);
    }

    public function saveGuest(Request $request)
    {
        $forms = optional($this->form)->forms;
        if ($forms) {

            $forms = collect($forms)->pluck('name')->toArray();
            $forms = $request->only($forms);

        }

        return $this->guests()->save(new Guest([
            'loginTypeId' => LoginType::FORM_ID,
            'attributes' => $forms,
            'log' => json_encode([
                'ip' => $request->ip(),
                'browser' => $request->header('User-Agent')
            ]),
            'date' => now()
        ]));
    }

}
