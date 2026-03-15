<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Devuelve los ítems del carrito según si el usuario está autenticado o no.
     * Si no hay sesión de auth, usa sesión de PHP para un carrito de invitado.
     */
    private function getCartItems()
    {
        if (Auth::check()) {
            return CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get();
        }

        // Carrito de invitado via sesión
        $sessionCart = Session::get('cart', []);
        $items = collect();
        foreach ($sessionCart as $productId => $qty) {
            $product = Product::find($productId);
            if ($product) {
                $items->push((object)[
                    'id'       => null,
                    'product'  => $product,
                    'quantity' => $qty,
                ]);
            }
        }
        return $items;
    }

    public function index()
    {
        $cartItems = $this->getCartItems();
        $total     = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'nullable|integer|min:1|max:99',
        ]);

        $quantity = $request->quantity ?? 1;

        if (Auth::check()) {
            $cartItem = CartItem::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {
                $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
            } else {
                CartItem::create([
                    'user_id'    => Auth::id(),
                    'product_id' => $product->id,
                    'quantity'   => $quantity,
                ]);
            }
        } else {
            $cart = Session::get('cart', []);
            $cart[$product->id] = ($cart[$product->id] ?? 0) + $quantity;
            Session::put('cart', $cart);
        }

        return redirect()->back()
            ->with('success', "'{$product->name}' agregado al carrito.");
    }

    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        if (Auth::check()) {
            $cartItem = CartItem::where('id', $itemId)
                ->where('user_id', Auth::id())
                ->firstOrFail();
            $cartItem->update(['quantity' => $request->quantity]);
        } else {
            $cart = Session::get('cart', []);
            if (isset($cart[$itemId])) {
                $cart[$itemId] = $request->quantity;
                Session::put('cart', $cart);
            }
        }

        return redirect()->route('cart.index')
            ->with('success', 'Cantidad actualizada.');
    }

    public function remove($itemId)
    {
        if (Auth::check()) {
            CartItem::where('id', $itemId)
                ->where('user_id', Auth::id())
                ->delete();
        } else {
            $cart = Session::get('cart', []);
            unset($cart[$itemId]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Producto eliminado del carrito.');
    }

    public function clear()
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cart.index')
            ->with('success', 'Carrito vaciado.');
    }
}