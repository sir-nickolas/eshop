<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'name',
        'qty',
        'small_description',
        'description',
        'price',
        'image',
        'sku',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "cate_id", "id");
    }
}
