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

    public function debit_nominal_account()
    {
        return $this->belongsTo(NominalAccount::class, 'debit_nominal_account_id');
    }

    public function credit_nominal_account()
    {
        return $this->belongsTo(NominalAccount::class, 'credit_nominal_account_id');
    }
}
