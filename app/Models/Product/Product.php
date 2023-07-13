<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\Category;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
        'category_uuid',
        'name',
        'image',
        'price',
        'stock',
        'discount',
        'status',
        'category',
        'slug',
        'description',
    ];

    public function category()
    {
        return $this->hasMany('App\Models\Category\Category', 'uuid', 'category_uuid');
    }
    
    
}
