<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\MenuItem;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;

class CartController extends Controller
{
    public function index() :JsonResponse {

        $userId = Auth::id();
        $cartItems = OrderItem::query()->whereNull('order_id')->where('user_id', $userId)->get();

        $totalPrice = $cartItems->sum(function($item) {
            return $item->price * $item->count;
        });
        $totalPricePerItems = $cartItems->keyBy('id')->map(function ($item) {
            return $item->price * $item->count;
        });

        return response()->json([
            'cart_items' => $cartItems,
            'total_price' => $totalPrice,
            'total_price_per_items' => $totalPricePerItems
        ]);
    }

    public function delete($id) :JsonResponse
    {
        $product = OrderItem::query()->find($id);

        if (!$product) {
            return response()->json(['message' => 'Item not found in cart'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Item removed from cart']);
    }

    /**
     * @OA\Post(
     *     path="/cart/add",
     *     summary="Add item to cart",
     *     tags={"Cart"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"menu_item_id","size","price","count"},
     *             @OA\Property(property="menu_item_id", type="integer", example=2),
     *             @OA\Property(property="size", type="string", example="M"),
     *             @OA\Property(property="price", type="number", format="float", example=2.99),
     *             @OA\Property(property="count", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Item added to cart"
     *     )
     * )
     */
    public function addToCart(CartRequest $request) :JsonResponse
    {
        $userId = Auth::id();
        $validated = $request->validated();

        $menuItem = MenuItem::find($validated['menu_item_id']);
        if (!$menuItem) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $existingCartItem = OrderItem::query()->whereNull('order_id')
            ->where('user_id', $userId)
            ->where('name', $menuItem->name)
            ->where('size', $validated['size'])
            ->first();

        if ($existingCartItem) {
            $existingCartItem->count += $request->input('count', 1);
            $existingCartItem->save();
            return response()->json(['message' => 'Item count updated']);
        }

        $cartItem = OrderItem::create([
            'name' => $menuItem->name,
            'size' => $validated['size'],
            'price' => $validated['price'],
            'image' => $menuItem->image,
            'product_type' => $menuItem->product_type,
            'count' => $request->input('count', 1),
            'order_id' => null,
            'user_id' => $userId,
        ]);

        return response()->json(['message' => 'Item added to cart', 'cart_item' => $cartItem]);
    }

    public function getCartItemCount() :JsonResponse
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $count = OrderItem::query()->whereNull('order_id')->where('user_id', $userId)->count();

        return response()->json(['count' => $count]);
    }
}
