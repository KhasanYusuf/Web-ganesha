<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentList extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'reparation_id'];

    // Relasi dengan order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi dengan reparation
    public function reparation()
    {
        return $this->belongsTo(Reparation::class);
    }
}
