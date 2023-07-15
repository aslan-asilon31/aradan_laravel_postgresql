<?php 

namespace App\Repositories;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Product\Product;
use Illuminate\Support\Collection;
use App\Repositories\ProductRepositoryInterface;
use DataTables;

class ProductRepositoryEloquent implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::with('category')->get();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct($id, array $data)
    {
        $product = Product::find($id);
        $product->update($data);
        return $product;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
