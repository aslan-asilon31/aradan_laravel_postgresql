<?php

namespace App\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Product\Product;
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
        return $this->productRepository->createProduct($data);
    }

    public function updateProduct($id, array $data)
    {
        return $this->productRepository->updateProduct($id, $data);
    }

    public function deleteProduct($id)
    {
        $this->productRepository->deleteProduct($id);
    }
}