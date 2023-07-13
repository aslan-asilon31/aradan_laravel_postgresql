<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Product\Product;
use Illuminate\Support\Collection;
use App\Services\ProductService;
use DataTables;
use Illuminate\Support\Facades\Http;


/**
 * @OA\Info(
 *    title="APIs For Ecommerce Server by AslanAsilon",
 *    version="1.0.0",
 *    description = "API documentation for the Aradan Online Shop project. The API provides various endpoints to manage products, orders, customers, and more."
 * ),
 * @OA\Get(
 *    path="/api/product",
 *    summary="Get all products",
 *    description="Retrieve a list of all products",
 *    tags={"Product"},
 *    @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *      @OA\JsonContent(
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/Product")
 *      ),
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
 * @OA\Get(
 *    path="/api/product/{id}",
 *    summary="Get a product by ID",
 *    description="Retrieve a specific product by its ID",
 *    tags={"Product"},
 *    @OA\Parameter(
 *      name="id",
 *      in="path",
 *      description="ID of the product",
 *      required=true,
 *      @OA\Schema(type="integer", format="int64")
 *    ),
 *    @OA\Response(
 *      response=200,
 *      description="Successful operation",
 *      @OA\JsonContent(ref="#/components/schemas/Product")
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
 * @OA\Post(
 *     path="/api/product",
 *     summary="Create a new product",
 *     description="Create a new product in the online shop.",
 *     tags={"Product"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Product data",
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     format="int64"
 *                 ),
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="image",
 *                     type="string",
 *                     format="binary"
 *                 ),
 *                 @OA\Property(
 *                     property="price",
 *                     type="number",
 *                     format="float"
 *                 ),
 *                 @OA\Property(
 *                     property="stock",
 *                     type="integer",
 *                     format="int32"
 *                 ),
 *                 @OA\Property(
 *                     property="discount",
 *                     type="integer",
 *                     format="int32"
 *                 ),
 *                 @OA\Property(
 *                     property="status",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="slug",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     type="string"
 *                 ),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Product created successfully",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 ref="#/components/schemas/Product"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request"
 *     )
 * ),
  * @OA\Put(
 *     path="/api/product/{id}",
 *     summary="Update a product",
 *     description="Update an existing product by its ID",
 *     tags={"Product"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the product",
 *         required=true,
 *         @OA\Schema(type="integer", format="int64")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Product data",
 *         @OA\JsonContent(ref="#/components/schemas/ProductRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Product updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     security={{"bearerAuth": {}}}
 * ),
 * @OA\Delete(
 *    path="/api/product/{id}",
 *    summary="Delete a product",
 *    description="Delete a product by its ID",
 *    tags={"Product"},
 *    @OA\Parameter(
 *      name="id",
 *      in="path",
 *      description="ID of the product",
 *      required=true,
 *      @OA\Schema(type="integer", format="int64")
 *    ),
 *    @OA\Response(
 *      response=200,
 *      description="Product deleted successfully"
 *    ),
 *    security={{"bearerAuth": {}}}
 * ),
 * @OA\Schema(
 *    schema="Product",
 *    type="object",
 *    @OA\Property(property="id", type="integer", format="int64"),
 *    @OA\Property(property="name", type="string"),
 *    @OA\Property(property="description", type="string"),
 *    @OA\Property(property="price", type="number", format="float")
 * ),
 * @OA\Schema(
 *    schema="ProductRequest",
 *    type="object",
 *    @OA\Property(property="name", type="string"),
 *    @OA\Property(property="description", type="string"),
 *    @OA\Property(property="price", type="number", format="float")
 * ),
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
*/


class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->productService->getAllProducts();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        // Return the view for non-AJAX requests
        return view('products.index');
    }

    public function indexLandingPage(Request $request)
    {
        $products = $this->productService->getAllProducts();
        // Return the view for non-AJAX requests
        return view('visitors.landingpage', compact('products'));
    }


    public function indexAPI(Request $request)
    {
        $products = $this->productService->getAllProducts();

        return response()->json($products);
    }

    public function getProductsByCategory($categoryUuid)
    {
        $products = Product::where('category_uuid', $categoryUuid)->get();

        return view('products.index', ['products' => $products]);
    }

    public function ProductDashboardPie(ProductService $productService)
    {
    $products = $productService->getAllProducts();

    $labels = $products->pluck('name');
    $data = $products->pluck('quantity');

    $pieChart = new class() extends BaseChart implements Chartisan {
        public function handler(): array
        {
            return [
                'labels' => $this->labels,
                'datasets' => [
                    [
                        'data' => $this->data,
                        'backgroundColor' => ['red', 'blue', 'yellow', 'green'],
                    ],
                ],
            ];
        }
    };

    $pieChart->labels($labels);
    $pieChart->dataset('Product Quantity', 'pie', $data);

    return view('home')->with('pieChart', $pieChart);
}


    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        // ...
    }

    public function store(Request $request)
    {
        $product = $this->productService->createProduct($request->all());
        // ...
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->updateProduct($id, $request->all());
        // ...
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        // ...
    }

}

