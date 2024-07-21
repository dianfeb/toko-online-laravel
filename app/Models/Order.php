<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItem;
use Dipantry\Rajaongkir\Models\ROCity;
use Illuminate\Database\Eloquent\Model;
use Dipantry\Rajaongkir\Models\ROProvince;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address', 
        'province_id',
        'city_id',
        'subdistrict',
        'shipping_cost',
        'courier',
        'weight',
        'total', 
        'status',
    ];


    public function province()
    {
        return $this->belongsTo(ROProvince::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(ROCity::class, 'city_id');
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
