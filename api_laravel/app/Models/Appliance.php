<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    use HasFactory;

    protected $fillable = ["name", "voltage", "brand_id", "description"];

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
}
