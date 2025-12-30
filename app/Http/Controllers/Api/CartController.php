<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Ecommerce\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {}

    public function add(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'product_id' => ['nullable', 'required_without:bundle_id', 'exists:products,id'],
            'bundle_id' => ['nullable', 'required_without:product_id', 'exists:bundles,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cartItem = $this->cartService->addItem($validated);

        return response()->json([
            'success' => true,
            'message' => 'Item added to cart',
            'cart_item' => $cartItem,
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cartItem = $this->cartService->updateItem($id, $validated['quantity']);

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart item updated',
            'cart_item' => $cartItem,
        ]);
    }

    public function remove(string $id): JsonResponse
    {
        $result = $this->cartService->removeItem($id);

        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart',
        ]);
    }

    public function clear(): JsonResponse
    {
        $count = $this->cartService->clearCart();

        return response()->json([
            'success' => true,
            'message' => "{$count} item(s) removed from cart",
        ]);
    }
}
