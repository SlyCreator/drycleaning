<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    protected $fillable = [ 'user_id','service_id','address','amount','is_delivered','cloth_no'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
