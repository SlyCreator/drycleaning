<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','description','amount'];

    public function laundries()
    {
        return $this->hasMany(Laundry::class);
    }
}
