<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plat extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'namePlat',
        'descriptionPlat',
        'imagePlat',
        'pricePlat',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ventes()
    {
        return $this->belongsToMany(Vente::class);
    }

    public function getRouteKeyName()
    {
        return "nameCategory";
    }

}
