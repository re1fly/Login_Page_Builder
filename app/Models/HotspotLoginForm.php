<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HotspotLoginForm extends Model
{
    use HasFactory;

    protected $connection = 'smart_wifi';
    protected $table = 'hotspotLoginForms';
    protected $guarded = [''];

    protected $casts = [
        'forms' => 'array'
    ];

    public function toArray()
    {
        $attributes = parent::toArray();

        if (isset($attributes['forms'])) {

            $forms = $attributes['forms'];
            if (is_array($forms)) {

                foreach ($forms as $key => $form) {

                    $display = str_replace("_", " ", $form['name']);
                    $attributes['forms'][$key]['display'] = Str::title($display);

                }

            }

        }

        return $attributes;
    }

}
