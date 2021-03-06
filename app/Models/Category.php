<?php

namespace App\Models;

use App\Plat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nameCategory'];

    public function plats()
    {
        return this->hasMany(Plat::class);
    }

    public function getRouteKeyName()
    {
        return "nameCategory";
    }
}
