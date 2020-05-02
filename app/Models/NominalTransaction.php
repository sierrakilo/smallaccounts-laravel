<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NominalTransaction extends Model
{
    public function getAmountAttribute($value)
    {
        return $value / 100;
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }
}
