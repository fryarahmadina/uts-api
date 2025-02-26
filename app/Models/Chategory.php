<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Chategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'chategory',
        'is_active',
    ];

    public function product(): HasMany

    {
        return $this->hasMany(Product::class);
    }

}
