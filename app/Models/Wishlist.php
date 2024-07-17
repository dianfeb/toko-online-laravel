<?php

namespace App\Models;

use App\Models\User;
use App\Models\WishlistItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;


    protected $fillable = ['user_id'];

    public function items()
    {
        return $this->hasMany(WishlistItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
