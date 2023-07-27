<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\Product\Product;
use Illuminate\Support\Collection;
use App\Services\Product\ProductService;
use DataTables;
use Illuminate\Support\Facades\Http;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Category\Category;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;


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

        // $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:product-create', ['only' => ['create','store']]);
        // $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->productService->getAllProducts();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($product) {
                    return '<td class="text-center">
                                <form onsubmit="return confirm(\'Apakah Anda Yakin ?\');" action="' . route('product.destroy', $product->id) . '" method="POST">
                                    <a href="' . route('product.edit', $product->id) . '" class="btn btn-sm btn-primary">EDIT</a>
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>';
                })
                ->addColumn('category_id', function ($product) {
                    return $product->category ? $product->category->name : '-';
                })
                ->addColumn('status', function ($product) {
                    $status = '';
            
                    switch ($product->status) {
                        case 'out-of-stock':
                            $status = '<span class="badge badge-danger">Out of Stock</span>';
                            break;
                        case 'pre-order':
                            $status = '<span class="badge badge-primary">Pre-Order</span>';
                            break;
                        case 'back-order':
                            $status = '<span class="badge badge-info">Back Order</span>';
                            break;
                        case 'on-sale':
                            $status = '<span class="badge badge-info">On Sale</span>';
                            break;
                        case 'discontinued':
                            $status = '<span class="badge badge-secondary">Discontinued</span>';
                            break;
                        case 'cooming-soon':
                            $status = '<span class="badge badge-warning">Coming Soon</span>';
                            break;
                        case 'limited-edition':
                            $status = '<span class="badge badge-dark">Limited Edition</span>';
                            break;
                        case 'sold-out':
                            $status = '<span class="badge badge-success">Sold Out</span>';
                            break;
                        default:
                            $status = '';
                            break;
                    }
            
                    return $status;
                })
                // ->addColumn('rating', function ($product) {
                //     return $product->rating ? $product->rating : 0;
                // })
                ->rawColumns(['action','category_name','status','rating'])
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
        $productRecommendation = $this->productService->getTopProductsByCategory($id);

        if (!$product) {
            // If the product is not found, you can handle the error here
            abort(404, 'Product not found');
        }

        return view('products.detail', compact('product','productRecommendation'));
    }

    public function create()
    {
        $categories = DB::select('SELECT * FROM categories');
        return view('products.create', compact('categories'));
    }

    public function edit(Product $product)
    {
        $categories = DB::select('SELECT * FROM categories');
    
        // Verify if the product exists
        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found.');
        }
    
        return view('products.edit', compact('product', 'categories'));
    }


    public function store(Request $request)
    {
        $product = $this->productService->createProduct($request->all());

        if ($product) {
            return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('product.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->updateProduct($id, $request->all());
        return redirect()->route('product.index');
    }
    
    public function destroy($id)
    {
        $products = $this->productService->deleteProduct($id);
        return redirect()->route('product.index');
    }

    // public function export_excel(){
    //     return (new FastExcel(Product::all()))->download('products.xlsx');
    // }

    public function export_excel()
    {
        $filename = 'products_' . Carbon::now()->format('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new ProductsExport, $filename);
    }

    public function export_pdf()
    {
        $filename = 'products_' . Carbon::now()->format('Y-m-d_H-i-s') . '.pdf';
        return Excel::download(new ProductsExport, $filename);
    }


    public function export_csv()
    {
        $filename = 'products_' . Carbon::now()->format('Y-m-d_H-i-s') . '.csv';
        return Excel::download(new ProductsExport, $filename);
    }

    public function productList()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

}

