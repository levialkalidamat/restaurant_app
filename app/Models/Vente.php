<?php

namespace App\Models;

use App\Models\Plat;
use App\Models\Table;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;

    //
    protected $fillable = 
    [
        'idDelivery',
        'quantityVente',
        'priceVente',
        'totalVente',
        'changeVente',
        'typePaymentVente',
        'statusPaymentVente'
    ];

    public function plats()
    {
        return $this->belongsToMany(Plat::class);
    }

    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
