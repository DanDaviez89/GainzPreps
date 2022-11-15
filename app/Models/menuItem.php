<?php

namespace App\Models;

use App\Models\Allegen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'dishTitle',
        'description',
        'protein',
        'calories',
        'carbs',
        'price',
        'image_path',
    ];

    public function allegens() {
        return $this->belongsToMany(Allegen::class);
    }
}
