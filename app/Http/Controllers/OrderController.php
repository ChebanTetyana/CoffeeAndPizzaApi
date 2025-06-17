<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use OpenApi\Annotations as OA;

class OrderController extends Controller
{
    /**
     * @OA\Post(
     *     path="/orders/create",
     *     summary="Create order",
     *     tags={"Orders"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="totalPrice", type="number", format="float", example=8.99),
     *             @OA\Property(
     *                 property="cartItems",
     *                 type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="name", type="string", example="Margarita"),
     *                     @OA\Property(property="size", type="string", example="M"),
     *                     @OA\Property(property="price", type="number", format="float", example=8.99),
     *                     @OA\Property(property="product_type", type="integer", example=2),
     *                     @OA\Property(property="count", type="integer", example=1)
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Order created"
     *     )
     * )
     */
    public function create(OrderRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $user = Auth::user();
//dd( $validatedData);
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        if (empty($validatedData['cartItems'])) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        return DB::transaction(function () use ($validatedData, $user) {

            $totalPrice = array_reduce($validatedData['cartItems'], function ($sum, $cartItem) {
                return $sum + ($cartItem['price'] * $cartItem['count']);
            }, 0);

            if ($totalPrice <= 0) {
                return response()->json(['message' => 'Total price must be greater than zero'], 400);
            }

            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $totalPrice,
            ]);

            OrderItem::whereNull('order_id')
                ->where('user_id', $user->id)
                ->update(['order_id' => $order->id]);

            return response()->json([
                'message' => 'Order created successfully',
                'order_id' => $order->id,
            ]);
        });
    }

    public function index(): JsonResponse
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $orders = Order::where('user_id', $user->id)->get();
        return response()->json($orders);
    }

    public function show(int $id): JsonResponse
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $order = Order::where('user_id', $user->id)->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order);
    }
}
