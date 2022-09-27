<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
