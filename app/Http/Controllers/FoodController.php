<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Customers;
use App\Models\Food;
use App\Models\Orders;
use App\Models\Orders_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FoodController extends Controller
{
    public function index()
    {
        $products = Food::all();
        return view('index')->with(compact('products'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function order()
    {
        return view('order');
    }

    public function addToCart(Request $request)
    {

        $product = Food::findOrFail($request->id);
        $cart = session()->get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return true;
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

    public function placeOrder(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:20',
            'phone' => 'required|numeric',
            'email' => 'required|e-mail',
            'address' => 'required|max:100',
        ]);
        //Inserarea unui nou utilizator
        $user = new Customers();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->mail_confirmation = true;
        $user->save();
        $recent_user = Customers::latest()->first();
        $total = 0;
        $cart_items = session('cart');
        foreach ($cart_items as $items) {
            $total += $items['price'] * $items['quantity'];
        }
        //Inserarea comenzii
        $order = new Orders();
        $order->customer_id = $recent_user->id;
        $order->total_price = $total;
        $order->save();
        //Inserarea produselor din comanda
        $recent_order = Orders::latest()->first();
        foreach ($cart_items as $key => $item) {
            $order_items = new Orders_items();
            $order_items->order_id = $recent_order->id;
            $order_items->quantity = $item['quantity'];
            $order_items->food_id = $key;
            $order_items->price = $item['price'];
            $order_items->save();
        }
        $email = $recent_user->email;
        $this->SendOrderConfirmation($email, $cart_items, $order, $recent_user);
        $request->session()->forget('cart');
        return redirect()->route('index');
    }

    public function SendOrderConfirmation($email, $cart_items, $order, $recent_user)
    {
        Mail::to('maxim.test2000@gmail.com')->cc([$email])->send(new OrderMail($order, $cart_items, $recent_user));
    }
}
