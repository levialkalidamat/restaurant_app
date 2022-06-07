<?php

namespace App\Models;

use App\Models\Vente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nameDelivery',
        'addressDelivery'
    ];

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
}
