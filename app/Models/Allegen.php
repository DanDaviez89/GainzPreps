<?php

namespace App\Models;

use App\Models\menuItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allegen extends Model
{
    use HasFactory;

    protected $fillable = [
        'allegen',
        'key',
    ];

    public function menuItems() {
        return $this->belongsToMany(menuItem::class);
    }
}
