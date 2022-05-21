<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = "purchase";
    protected $fillable = ["device_id", "client-token", "receipt", "status"];

    public function setExpireDateAttribute($value)
    {
        return $this->attributes['expire-date'] = Carbon::parse($value)->setTimezone('America/Los_Angeles')->format('Y-m-d H:i:s');
    }
}
