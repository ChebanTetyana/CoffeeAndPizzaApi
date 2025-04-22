<?php

namespace App\Http\Controllers;

use App\Enums\ProductType;
use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function index(): JsonResponse
    {
        $menuItems = MenuItem::where('product_type', ProductType::PROMOTION)->get();

        return response()->json($menuItems);
    }

    public function about(): JsonResponse
    {
        if (auth()->check()) {
            return response()->json([
                'message' => 'About the site',
                'user' => auth()->user(),
            ]);
        }

        return response()->json(['message' => 'About the site']);
    }
}
