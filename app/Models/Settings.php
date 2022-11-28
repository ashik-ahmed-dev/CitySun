<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function getByKey($key, $default = null){
        $settings = self::where('key', $key)->first();
        if (isset($settings)){
            return $settings->value;
        }else{
            return $default;
        }
    }
}
