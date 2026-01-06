<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreBundleRequest;
use App\Http\Requests\UpdateBundleRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Bundle;
use App\Models\Order;
use App\Services\Ecommerce\ProductService;
use App\Services\Ecommerce\BundleService;
use App\Services\Ecommerce\OrderService;
use App\Services\Ecommerce\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EcommerceController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected BundleService $bundleService,
        protected OrderService $orderService,
        protected CartService $cartService
    ) {}

    public function index(): Response|RedirectResponse
    {
        $user = auth()->user();

        if (! $user->can('ecommerce.overview.read')) {
            if ($user->can('ecommerce.product_catalog.read')) {
                return redirect()->route('ecommerce.products');
            }
            if ($user->can('ecommerce.bundle_offers.read')) {
                return redirect()->route('ecommerce.bundles');
            }
            if ($user->can('ecommerce.shopping_cart.read')) {
                return redirect()->route('ecommerce.cart');
            }
            if ($user->can('ecommerce.orders.read')) {
                return redirect()->route('ecommerce.orders');
            }

            abort(403, 'Unauthorized action.');
        }
        $stats = [
            'totalProducts' => Product::where('is_active', true)->count(),
            'totalBundles' => Bundle::where('is_active', true)->count(),
            'totalOrders' => Order::count(),
            'totalRevenue' => Order::where('payment_status', 'paid')->sum('total'),
            'pendingOrders' => Order::where('status', 'pending')->count(),
            'lowStockItems' => $this->productService->getLowStockProducts()->count(),
        ];

        $recentOrders = Order::with('items')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($order) {
                return [
                    'id' => (string) $order->id,
                    'customer' => $order->customer_name,
                    'products' => $order->items->pluck('item_sku')->toArray(),
                    'total' => (float) $order->total,
                    'status' => $order->status,
                    'date' => $order->order_date->format('Y-m-d'),
                ];
            });

        return Inertia::render('Ecommerce/Index', [
            'stats' => $stats,
            'recentOrders' => $recentOrders,
        ]);
    }

    public function products(): Response
    {
        $products = Product::with(['category', 'specifications'])
            ->where('is_active', true)
            ->get()
            ->map(function ($product) {
                $specs = $product->specifications->mapWithKeys(function ($spec) {
                    return [$spec->spec_key => $spec->spec_value];
                })->toArray();

                return [
                    'id' => (string) $product->id,
                    'name' => $product->name,
                    'sku' => $product->sku,
                    'description' => $product->description,
                    'price' => (float) $product->price,
                    'stock' => $product->stock,
                    'image' => $product->image,
                    'category' => $product->category?->name ?? 'Uncategorized',
                    'specifications' => $specs,
                ];
            });

        return Inertia::render('Ecommerce/Products', [
            'products' => $products,
        ]);
    }

    public function productView(string $id): Response
    {
        $product = Product::with(['category', 'specifications'])
            ->findOrFail($id);

        $specs = $product->specifications->mapWithKeys(function ($spec) {
            return [$spec->spec_key => $spec->spec_value];
        })->toArray();

        $productData = [
            'id' => (string) $product->id,
            'name' => $product->name,
            'sku' => $product->sku,
            'description' => $product->description,
            'price' => (float) $product->price,
            'stock' => $product->stock,
            'image' => $product->image,
            'category' => $product->category?->name ?? 'Uncategorized',
            'specifications' => $specs,
            'features' => $product->features ?? [],
        ];

        return Inertia::render('Ecommerce/ProductView', [
            'product' => $productData,
        ]);
    }

    public function productForm(?string $id = null): Response
    {
        $product = null;
        if ($id) {
            $product = Product::with(['category', 'specifications'])->findOrFail($id);
            $product = [
                'id' => (string) $product->id,
                'name' => $product->name,
                'sku' => $product->sku,
                'description' => $product->description,
                'price' => (float) $product->price,
                'stock' => $product->stock,
                'low_stock_threshold' => $product->low_stock_threshold,
                'image' => $product->image,
                'category_id' => $product->category_id ? (string) $product->category_id : null,
                'features' => $product->features ?? [],
                'specifications' => $product->specifications->map(function ($spec) {
                    return [
                        'spec_key' => $spec->spec_key,
                        'spec_value' => $spec->spec_value,
                    ];
                })->toArray(),
            ];
        }

        $categories = ProductCategory::where('is_active', true)
            ->orderBy('display_order')
            ->get()
            ->map(function ($category) {
                return [
                    'id' => (string) $category->id,
                    'name' => $category->name,
                ];
            });

        return Inertia::render('Ecommerce/ProductForm', [
            'id' => $id,
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function storeProduct(StoreProductRequest $request): RedirectResponse
    {
        $product = $this->productService->create($request->validated());

        return redirect()->route('ecommerce.products')
            ->with('success', 'Product created successfully.');
    }

    public function updateProduct(UpdateProductRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $this->productService->update($product, $request->validated());

        return redirect()->route('ecommerce.products')
            ->with('success', 'Product updated successfully.');
    }

    public function destroyProduct(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $this->productService->delete($product);

        return redirect()->route('ecommerce.products')
            ->with('success', 'Product deleted successfully.');
    }

    public function bundles(): Response
    {
        $bundles = Bundle::with('products')
            ->where('is_active', true)
            ->get()
            ->map(function ($bundle) {
                return [
                    'id' => (string) $bundle->id,
                    'name' => $bundle->name,
                    'products' => $bundle->products->pluck('sku')->toArray(),
                    'productNames' => $bundle->products->pluck('name')->toArray(),
                    'discount' => (float) $bundle->discount_percentage,
                    'originalPrice' => (float) $bundle->original_price,
                    'price' => (float) $bundle->price,
                    'savings' => (float) $bundle->savings,
                    'description' => $bundle->description,
                ];
            });

        return Inertia::render('Ecommerce/Bundles', [
            'bundles' => $bundles,
        ]);
    }

    public function bundleForm(?string $id = null): Response
    {
        $bundle = null;
        if ($id) {
            $bundle = Bundle::with('products')->findOrFail($id);
            $bundle = [
                'id' => (string) $bundle->id,
                'name' => $bundle->name,
                'description' => $bundle->description,
                'discount_percentage' => (float) $bundle->discount_percentage,
                'is_active' => $bundle->is_active,
                'products' => $bundle->products->map(function ($product) {
                    return [
                        'product_id' => (string) $product->id,
                        'quantity' => $product->pivot->quantity,
                    ];
                })->toArray(),
            ];
        }

        $products = Product::where('is_active', true)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => (string) $product->id,
                    'sku' => $product->sku,
                    'name' => $product->name,
                    'price' => (float) $product->price,
                ];
            });

        return Inertia::render('Ecommerce/BundleForm', [
            'id' => $id,
            'bundle' => $bundle,
            'products' => $products,
        ]);
    }

    public function storeBundle(StoreBundleRequest $request): RedirectResponse
    {
        $bundle = $this->bundleService->create($request->validated());

        return redirect()->route('ecommerce.bundles')
            ->with('success', 'Bundle created successfully.');
    }

    public function updateBundle(UpdateBundleRequest $request, string $id): RedirectResponse
    {
        $bundle = Bundle::findOrFail($id);
        $this->bundleService->update($bundle, $request->validated());

        return redirect()->route('ecommerce.bundles')
            ->with('success', 'Bundle updated successfully.');
    }

    public function destroyBundle(string $id): RedirectResponse
    {
        $bundle = Bundle::findOrFail($id);
        $this->bundleService->delete($bundle);

        return redirect()->route('ecommerce.bundles')
            ->with('success', 'Bundle deleted successfully.');
    }

    public function cart(): Response
    {
        $cartItems = $this->cartService->getCartItems();
        $subtotal = $this->cartService->getCartTotal();
        $tax = $subtotal * 0.08; // 8% tax
        $shipping = 0;
        $total = $subtotal + $tax + $shipping;

        $formattedItems = collect($cartItems)->map(function ($item) {
            if (isset($item['product'])) {
                return [
                    'id' => $item['id'],
                    'productId' => $item['product_id'],
                    'name' => $item['product']['name'],
                    'sku' => $item['product']['sku'],
                    'price' => $item['product']['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['product']['price'] * $item['quantity'],
                    'image' => $item['product']['image'] ?? null,
                ];
            } elseif (isset($item['bundle'])) {
                return [
                    'id' => $item['id'],
                    'bundleId' => $item['bundle_id'],
                    'name' => $item['bundle']['name'],
                    'sku' => 'BUNDLE-' . $item['bundle_id'],
                    'price' => $item['bundle']['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['bundle']['price'] * $item['quantity'],
                    'image' => null,
                ];
            }
            return null;
        })->filter();

        return Inertia::render('Ecommerce/Cart', [
            'cartItems' => $formattedItems,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total' => $total,
            'couponCode' => '',
            'couponDiscount' => 0.00,
        ]);
    }

    public function orders(): Response
    {
        $orders = Order::with('items')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($order) {
                return [
                    'id' => (string) $order->id,
                    'orderNumber' => $order->order_number,
                    'customer' => $order->customer_name,
                    'items' => $order->items->map(function ($item) {
                        return [
                            'name' => $item->item_name,
                            'sku' => $item->item_sku,
                            'quantity' => $item->quantity,
                            'price' => (float) $item->unit_price,
                        ];
                    })->toArray(),
                    'subtotal' => (float) $order->subtotal,
                    'tax' => (float) $order->tax,
                    'shipping' => (float) $order->shipping,
                    'total' => (float) $order->total,
                    'status' => $order->status,
                    'paymentStatus' => $order->payment_status,
                    'paymentMethod' => $order->payment_method,
                    'shippingAddress' => $order->shipping_address,
                    'orderDate' => $order->order_date->format('Y-m-d'),
                    'shippedDate' => $order->shipped_date?->format('Y-m-d'),
                    'deliveredDate' => $order->delivered_date?->format('Y-m-d'),
                    'trackingNumber' => $order->tracking_number,
                ];
            });

        return Inertia::render('Ecommerce/Orders', [
            'orders' => $orders,
        ]);
    }

    public function orderView(string $id): Response
    {
        $order = Order::with('items.product', 'items.bundle')->findOrFail($id);

        $orderData = [
            'id' => (string) $order->id,
            'orderNumber' => $order->order_number,
            'customer' => $order->customer_name,
            'items' => $order->items->map(function ($item) {
                return [
                    'name' => $item->item_name,
                    'sku' => $item->item_sku,
                    'quantity' => $item->quantity,
                    'price' => (float) $item->unit_price,
                ];
            })->toArray(),
            'subtotal' => (float) $order->subtotal,
            'tax' => (float) $order->tax,
            'shipping' => (float) $order->shipping,
            'total' => (float) $order->total,
            'status' => $order->status,
            'paymentStatus' => $order->payment_status,
            'paymentMethod' => $order->payment_method,
            'shippingAddress' => $order->shipping_address,
            'billingAddress' => $order->billing_address ?? $order->shipping_address,
            'orderDate' => $order->order_date->format('Y-m-d'),
            'shippedDate' => $order->shipped_date?->format('Y-m-d'),
            'deliveredDate' => $order->delivered_date?->format('Y-m-d'),
            'trackingNumber' => $order->tracking_number,
            'invoiceNumber' => $order->invoice_number,
        ];

        return Inertia::render('Ecommerce/OrderView', [
            'order' => $orderData,
        ]);
    }

    public function storeOrder(StoreOrderRequest $request): RedirectResponse
    {
        $order = $this->orderService->create($request->validated());

        return redirect()->route('ecommerce.orders.view', $order->id)
            ->with('success', 'Order created successfully.');
    }

    public function updateOrder(UpdateOrderRequest $request, string $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $this->orderService->update($order, $request->validated());

        return redirect()->route('ecommerce.orders.view', $id)
            ->with('success', 'Order updated successfully.');
    }
}
