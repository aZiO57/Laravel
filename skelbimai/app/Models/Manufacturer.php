<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function carModel()
    {
        return $this->hasOne(carModel::class, 'id', 'car_model_id');
    }
}
