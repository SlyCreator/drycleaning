<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['ref_code','laundry_id','staff_id','is_paid'];

    public function laundry()
    {
        return $this->belongsTo(Laundry::class);
    }
}
