<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'user_id',
        'menu_items_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function menuItem() {
        return $this->belongsTo(menuItem::class);
    }
}
