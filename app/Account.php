<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['title', 'agency', 'account_number', 'balance', 'balance_initial', 'bank_id', 'bank_image'];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
