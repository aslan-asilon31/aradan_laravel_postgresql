<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Models\Product\Product;
use App\Models\Order\Order;
use DB;use Carbon\Carbon;
use Darryldecode\Cart\CartCondition;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function cartList()
    {
        $totalPrice = 0;
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        
        $cartCount = $cartItems->count();
        return view('visitors/cart', compact('cartItems','totalPrice','cartCount'));
    }


    public function addToCart(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $price = $request->price;
        $quantity = $request->quantity;
    
        \Cart::add([
            'id' => $id, // Use a unique identifier for the cart item (e.g., product ID).
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity, // Make sure this is a numeric value.
            'attributes' => [
                'image' => $request->image, // You can include additional attributes as needed.
            ]
        ]);
    
        // Calculate total price for the order
        $totalPrice = $price * $quantity;
    
        // Create an order for the added product
        Order::create([
            // Add any other relevant fields here, like user_id or user_name if available.
            'product_id' => $id,
            'product_name' => $name,
            'total_price' => $totalPrice,
            'qty' => $quantity,
        ]);
    
        session()->flash('success', 'Product is Added to Cart Successfully !');
    
        return redirect()->route('cart.list');
    }
    

    public function updateCart(Request $request)
    {
        // Update the Cart item quantity
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]);
    
        // Retrieve the cart items using getContent() method
        $cartItems = \Cart::getContent();
    
        // Find the specific cart item by comparing its ID
        $cartItem = $cartItems->firstWhere('id', $request->id);
    
        // Check if the cart item exists
        if ($cartItem) {
            // Get the associated Order model using the defined relationship
            $order = Order::find($cartItem->id);
    
            // Check if the order exists before updating its 'qty' field
            if ($order) {
                DB::table('orders')
                    ->where('id', $order->id)
                    ->update(['qty' => $request->quantity]);
    
                session()->flash('success', 'Item Cart is Updated Successfully !');
            } else {
                // Handle the case where the order does not exist
                session()->flash('error', 'Order not found for the cart item.');
            }
        } else {
            // Handle the case where the cart item does not exist
            session()->flash('error', 'Cart item not found.');
        }
    
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

                
        Order::remove($request->id);

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function checkout(Request $request)
    {

        $totalPrice = 0;
        $cartItems = \Cart::getContent();
        $cartCount = $cartItems->count();
        
        $date = Carbon::now();
        $formattedDate = $date->format('l, F d, Y');
        
        
        $request->request->add(['total_price' => $request->qty * 100000, 'status' => 'Unpaid']);
        // $order = Order::all();

        // Set merchant server key 
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // set to development/sandbox environtment (default). set to true for production environtment
        \Midtrans\Config::$isProduction = false;
        //set sanitization on (default)
        \Midtrans\Config::$isSanitized = true; 
        //set transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


            // Calculate the total gross amount from the cart items
        $totalGrossAmount = 0;
        foreach ($cartItems as $item) {
            $totalGrossAmount += ($item->price * $item->quantity);
        }

        // Generate a unique order ID (you can use any unique identifier here)
        $orderId = $item->id; // Example: ORDER_1630082133

        // Now create the $params array with the updated transaction_details
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $totalGrossAmount,
            ),
            'customer_details' => array(
                'first_name' => 'aslan',
                // Add other customer details like email and phone if needed.
                // 'email' => $request->email,
                // 'phone' => $request->phone,
            ),
            'item_details' => array(),
        );

        foreach ($cartItems as $item) {
            $params['item_details'][] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
            ];
        }

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $order = Order::where('id', $orderId)->get();

        // return view('checkout', compact('snapToken','order'));
        return view('visitors.checkout', [
            'snapToken' => $snapToken,
            'order' => $order,
            'cartItems' => $cartItems,
            'formattedDate' => $formattedDate,
            'totalPrice' => $totalPrice,
            'totalGrossAmount' => $totalGrossAmount,
        ]);
    }

    public function invoice_print(){
        
        $totalPrice = 0;
        $cartItems = \Cart::getContent();
        $cartCount = $cartItems->count();
        
        $date = Carbon::now();
        $formattedDate = $date->format('l, F d, Y');

        $request->request->add(['total_price' => $request->qty * 100000, 'status' => 'Unpaid']);
        // $order = Order::all();

        // Set merchant server key 
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // set to development/sandbox environtment (default). set to true for production environtment
        \Midtrans\Config::$isProduction = false;
        //set sanitization on (default)
        \Midtrans\Config::$isSanitized = true; 
        //set transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


            // Calculate the total gross amount from the cart items
        $totalGrossAmount = 0;
        foreach ($cartItems as $item) {
            $totalGrossAmount += ($item->price * $item->quantity);
        }

        // Generate a unique order ID (you can use any unique identifier here)
        $orderId = $item->id; // Example: ORDER_1630082133

        // Now create the $params array with the updated transaction_details
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $totalGrossAmount,
            ),
            'customer_details' => array(
                'first_name' => 'aslan',
                // Add other customer details like email and phone if needed.
                // 'email' => $request->email,
                // 'phone' => $request->phone,
            ),
            'item_details' => array(),
        );

        foreach ($cartItems as $item) {
            $params['item_details'][] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
            ];
        }

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $order = Order::where('id', $orderId)->get();
        
        return view('visitors.invoice-print', [
            'snapToken' => $snapToken,
            'order' => $order,
            'cartItems' => $cartItems,
            'formattedDate' => $formattedDate,
            'totalPrice' => $totalPrice,
            'totalGrossAmount' => $totalGrossAmount,
        ]);
    }

    public function generatePDF()
    {
                
        $totalPrice = 0;
        $cartItems = \Cart::getContent();
        $cartCount = $cartItems->count();
        
        $date = Carbon::now();
        $formattedDate = $date->format('l, F d, Y');

        // Get the content from the Blade view
        $pdfContent = View::make('visitors.invoice-print')
        ->with('totalPrice', $totalPrice)
        ->with('cartItems', $cartItems)
        ->with('formattedDate', $formattedDate)
        ->render();

        // Create a new DomPDF instance
        $pdf = new Dompdf();

        // Load the PDF content
        $pdf->loadHtml($pdfContent);

        // (Optional) Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $pdf->render();

        // Generate a filename for the PDF
        $filename = 'invoice'.now().'.pdf';

        // Optionally, you can save the PDF to a specific location on the server
        // $pdf->save(storage_path('pdfs/' . $filename));

        // Stream the PDF to the browser
        return $pdf->stream($filename);
    }
}
