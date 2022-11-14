<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allegens_menu_item extends Model
{
    use HasFactory;

    public $fillable = [
        'allegen_id',
        'menu_items_id',
    ];

    public $timestamps = false;
}
