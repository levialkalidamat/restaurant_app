<?php

namespace App\Models;

use App\Models\Vente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'nameTable',
        'statusTable',
    ];

    public function ventes()
    {
        return $this->belongsToMany(Vente::class);
    }

    public function getRouteKey()
    {
        return 'contenue';
    }
}
