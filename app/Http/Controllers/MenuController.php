<?php

namespace App\Http\Controllers;

use App\Enums\ProductType;
use App\Http\Requests\MenuRequest;
use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;

class MenuController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'pizzas' => MenuItem::where('product_type', ProductType::PIZZA)->where('size', 'M')->get(),
            'coffees' => MenuItem::where('product_type', ProductType::COFFEE)->where('size', 'M')->get(),
            'promotions' => MenuItem::where('product_type', ProductType::PROMOTION)->get(),
        ]);
    }

    public function show($id): JsonResponse
    {
        $menuItem = MenuItem::find($id);

        if (!$menuItem) {
            return response()->json(['message' => 'Menu item not found'], 404);
        }

        return response()->json($menuItem);
    }

    public function getPizzas(): JsonResponse
    {
        return response()->json(
            MenuItem::where('product_type', ProductType::PIZZA)->get()
        );
    }

    public function getCoffee(): JsonResponse
    {
        return response()->json(
            MenuItem::where('product_type', ProductType::COFFEE)->get()
        );
    }

    public function getPrice(MenuRequest $request): JsonResponse
    {
        $size = $request->validated()['size'];
        $pizza = MenuItem::where('product_type', ProductType::PIZZA)
            ->where('size', $size)
            ->first();

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        return response()->json(['price' => $pizza->price]);
    }
}
