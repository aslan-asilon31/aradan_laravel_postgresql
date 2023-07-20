<?php

namespace App\Services\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Product\Product;
use Illuminate\Http\UploadedFile;
use App\Models\Category\Category;
use Illuminate\Support\Collection;
use App\Repositories\ProductRepositoryInterface;
use DataTables;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($id)
    {
        return $this->productRepository->getProductById($id);
    }

    public function createProduct(array $data)
    {
        // dd
        // return $this->productRepository->createProduct($data);
        $this->validateData($data);

        // Upload image
        $imagePath = $this->uploadImage($data['image']);

        // Create the product in the database
        $product = Product::create([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'image' => $imagePath,
            'price' => $data['price'],
            'stock' => $data['stock'],
            'discount' => $data['discount'],
            'status' => $data['status'],
            'rating' => $data['rating'],
            'slug' => $data['slug'],
            'description' => $data['description'],
        ]);
    }

    private function validateData(array $data)
    {
        // Perform validation here
        // Example:
        // $validator = Validator::make($data, [
        //     'image'     => 'required|image|mimes:png,jpg,jpeg',
        //     'title'     => 'required',
        //     'content'   => 'required'
        // ]);

        // // Check if the validation fails and handle accordingly.
    }

    private function uploadImage(UploadedFile $image)
    {
        $imagePath = $image->storeAs('public/products', $image->hashName());
        return str_replace('public/products', '', $imagePath);
    }

    public function updateProduct($id, array $data)
    {
        $this->validateData($data);
    
        // Retrieve the product by ID
        $product = Product::findOrFail($id);
    
        // Upload image if it exists in the data
        if (isset($data['image'])) {
            $imagePath = $this->uploadImage($data['image']);
            $data['image'] = $imagePath;
        }
    
        // Update the product attributes
        $product->update([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'discount' => $data['discount'],
            'status' => $data['status'],
            'rating' => $data['rating'],
            'slug' => $data['slug'],
            'description' => $data['description'],
        ]);
    
        return $product;
    }

    public function deleteProduct($id)
    {
        $this->productRepository->deleteProduct($id);
    }

    public function getTopProductsByCategory($id)
    {
        $topCategory = DB::table('products')
        ->select('category_id')
        ->groupBy('category_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->pluck('category_id');

    return Product::where('category_id', $topCategory)
        ->orderByDesc('rating')
        ->take(4)
        ->get();
    }
}