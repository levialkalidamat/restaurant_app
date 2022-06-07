<?php

namespace App\Models;

use App\Models\Plat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;

    //
    protected $fillable = 
    [
        'quantité',
        'prix',
        'total',
        'change',
        'type_payment',
        'status_payment'
    ];

    public function plat()
    {
        return $this->belongsToMany(Plat::class);
    }
}
