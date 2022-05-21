<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Devices extends Model
{
    use HasFactory;

    protected $table = "Devices";
    protected $fillable = ["uid", "appId", "language", "os", "client-token"];

    public function setClientTokenAttribute($value)
    {
        $this->attributes['client-token'] = Str::uuid();
    }
}
