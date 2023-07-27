<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'price',
        'stock',
        'discount',
        'status',
        // 'rating',
        'slug',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category\Category');
    }
    
    
}
