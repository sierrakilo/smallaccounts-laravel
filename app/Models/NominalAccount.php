<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NominalAccount extends Model
{
    public function getAmountAttribute($value)
    {
        return $value / 100;
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }

    public function debit_nominal_transactions()
    {
        return $this->hasMany(NominalTransaction::class, 'debit_nominal_account_id');
    }

    public function credit_nominal_transactions()
    {
        return $this->hasMany(NominalTransaction::class, 'credit_nominal_account_id');
    }

}
