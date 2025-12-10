<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class EcommerceController extends Controller
{
    public function index()
    {
        return Inertia::render('Ecommerce/Index', [
            'stats' => [
                'totalProducts' => 7,
                'totalBundles' => 2,
                'totalOrders' => 45,
                'totalRevenue' => 125000,
                'pendingOrders' => 5,
                'lowStockItems' => 2,
            ],
            'recentOrders' => [
                [
                    'id' => 'ORD-2025-001',
                    'customer' => 'Acme Corporation',
                    'products' => ['QK-15', 'DS-32'],
                    'total' => 1798.00,
                    'status' => 'completed',
                    'date' => '2025-01-15',
                ],
                [
                    'id' => 'ORD-2025-002',
                    'customer' => 'Tech Solutions Inc',
                    'products' => ['Pro Bundle'],
                    'total' => 2461.00,
                    'status' => 'processing',
                    'date' => '2025-01-18',
                ],
                [
                    'id' => 'ORD-2025-003',
                    'customer' => 'Global Enterprises',
                    'products' => ['QK-22', 'DS-55'],
                    'total' => 2798.00,
                    'status' => 'shipped',
                    'date' => '2025-01-20',
                ],
            ],
        ]);
    }

    public function products()
    {
        $products = [
            [
                'id' => '1',
                'name' => '15-inch Touch Kiosk',
                'sku' => 'QK-15',
                'description' => 'Floor-standing kiosk with ticket printer',
                'price' => 1299.00,
                'stock' => 45,
                'image' => '/images/products/qk-15.jpg',
                'category' => 'Kiosks',
                'specifications' => [
                    'Screen Size' => '15 inches',
                    'Resolution' => '1920x1080',
                    'Touch' => 'Capacitive',
                    'Printer' => 'Included',
                ],
            ],
            [
                'id' => '2',
                'name' => '22-inch Touch Kiosk',
                'sku' => 'QK-22',
                'description' => 'Premium floor-standing kiosk',
                'price' => 1899.00,
                'stock' => 32,
                'image' => '/images/products/qk-22.jpg',
                'category' => 'Kiosks',
                'specifications' => [
                    'Screen Size' => '22 inches',
                    'Resolution' => '1920x1080',
                    'Touch' => 'Capacitive',
                    'Printer' => 'Included',
                ],
            ],
            [
                'id' => '3',
                'name' => 'Wall-Mount Kiosk',
                'sku' => 'QK-WALL',
                'description' => 'Space-saving wall mount solution',
                'price' => 899.00,
                'stock' => 28,
                'image' => '/images/products/qk-wall.jpg',
                'category' => 'Kiosks',
                'specifications' => [
                    'Screen Size' => '15 inches',
                    'Resolution' => '1920x1080',
                    'Touch' => 'Capacitive',
                    'Mount' => 'Wall',
                ],
            ],
            [
                'id' => '4',
                'name' => '32-inch Queue Display',
                'sku' => 'DS-32',
                'description' => 'HD display for queue status',
                'price' => 499.00,
                'stock' => 67,
                'image' => '/images/products/ds-32.jpg',
                'category' => 'Displays',
                'specifications' => [
                    'Screen Size' => '32 inches',
                    'Resolution' => '1920x1080',
                    'Type' => 'LED',
                    'Mount' => 'VESA',
                ],
            ],
            [
                'id' => '5',
                'name' => '55-inch Queue Display',
                'sku' => 'DS-55',
                'description' => 'Large format queue display',
                'price' => 899.00,
                'stock' => 24,
                'image' => '/images/products/ds-55.jpg',
                'category' => 'Displays',
                'specifications' => [
                    'Screen Size' => '55 inches',
                    'Resolution' => '3840x2160',
                    'Type' => 'LED',
                    'Mount' => 'VESA',
                ],
            ],
            [
                'id' => '6',
                'name' => 'Thermal Ticket Printer',
                'sku' => 'TP-80',
                'description' => 'High-speed ticket printer',
                'price' => 299.00,
                'stock' => 89,
                'image' => '/images/products/tp-80.jpg',
                'category' => 'Accessories',
                'specifications' => [
                    'Type' => 'Thermal',
                    'Speed' => '80mm/s',
                    'Connectivity' => 'USB, Ethernet',
                    'Paper Width' => '80mm',
                ],
            ],
            [
                'id' => '7',
                'name' => 'Numeric Keyboard',
                'sku' => 'KB-NUM',
                'description' => 'Customer input keyboard',
                'price' => 79.00,
                'stock' => 156,
                'image' => '/images/products/kb-num.jpg',
                'category' => 'Accessories',
                'specifications' => [
                    'Type' => 'Numeric',
                    'Keys' => '12',
                    'Connectivity' => 'USB',
                    'Material' => 'Plastic',
                ],
            ],
        ];

        return Inertia::render('Ecommerce/Products', [
            'products' => $products,
        ]);
    }

    public function productView($id)
    {
        $products = [
            '1' => [
                'id' => '1',
                'name' => '15-inch Touch Kiosk',
                'sku' => 'QK-15',
                'description' => 'Floor-standing kiosk with ticket printer',
                'price' => 1299.00,
                'stock' => 45,
                'image' => '/images/products/qk-15.jpg',
                'category' => 'Kiosks',
                'specifications' => [
                    'Screen Size' => '15 inches',
                    'Resolution' => '1920x1080',
                    'Touch' => 'Capacitive',
                    'Printer' => 'Included',
                ],
                'features' => [
                    'High-resolution touchscreen display',
                    'Built-in thermal ticket printer',
                    'Durable floor-standing design',
                    'Easy to install and configure',
                ],
            ],
            '2' => [
                'id' => '2',
                'name' => '22-inch Touch Kiosk',
                'sku' => 'QK-22',
                'description' => 'Premium floor-standing kiosk',
                'price' => 1899.00,
                'stock' => 32,
                'image' => '/images/products/qk-22.jpg',
                'category' => 'Kiosks',
                'specifications' => [
                    'Screen Size' => '22 inches',
                    'Resolution' => '1920x1080',
                    'Touch' => 'Capacitive',
                    'Printer' => 'Included',
                ],
                'features' => [
                    'Larger premium display',
                    'Enhanced processing power',
                    'Advanced security features',
                    'Extended warranty included',
                ],
            ],
        ];

        $product = $products[$id] ?? $products['1'];

        return Inertia::render('Ecommerce/ProductView', [
            'product' => $product,
        ]);
    }

    public function bundles()
    {
        $bundles = [
            [
                'id' => '1',
                'name' => 'Starter Bundle',
                'products' => ['QK-15', 'DS-32', 'TP-80'],
                'productNames' => [
                    '15-inch Touch Kiosk',
                    '32-inch Queue Display',
                    'Thermal Ticket Printer',
                ],
                'discount' => 15,
                'originalPrice' => 2097.00,
                'price' => 1784.00,
                'savings' => 313.00,
                'description' => 'Perfect starter package for small businesses',
            ],
            [
                'id' => '2',
                'name' => 'Pro Bundle',
                'products' => ['QK-22', 'DS-55', 'TP-80', 'KB-NUM'],
                'productNames' => [
                    '22-inch Touch Kiosk',
                    '55-inch Queue Display',
                    'Thermal Ticket Printer',
                    'Numeric Keyboard',
                ],
                'discount' => 20,
                'originalPrice' => 3076.00,
                'price' => 2461.00,
                'savings' => 615.00,
                'description' => 'Complete professional solution for larger operations',
            ],
        ];

        return Inertia::render('Ecommerce/Bundles', [
            'bundles' => $bundles,
        ]);
    }

    public function cart()
    {
        return Inertia::render('Ecommerce/Cart', [
            'cartItems' => [
                [
                    'id' => '1',
                    'productId' => '1',
                    'name' => '15-inch Touch Kiosk',
                    'sku' => 'QK-15',
                    'price' => 1299.00,
                    'quantity' => 2,
                    'subtotal' => 2598.00,
                    'image' => '/images/products/qk-15.jpg',
                ],
                [
                    'id' => '2',
                    'productId' => '4',
                    'name' => '32-inch Queue Display',
                    'sku' => 'DS-32',
                    'price' => 499.00,
                    'quantity' => 1,
                    'subtotal' => 499.00,
                    'image' => '/images/products/ds-32.jpg',
                ],
            ],
            'subtotal' => 3097.00,
            'tax' => 247.76,
            'shipping' => 0.00,
            'total' => 3344.76,
            'couponCode' => '',
            'couponDiscount' => 0.00,
        ]);
    }

    public function orders()
    {
        $orders = [
            [
                'id' => 'ORD-2025-001',
                'orderNumber' => 'ORD-2025-001',
                'customer' => 'Acme Corporation',
                'items' => [
                    ['name' => '15-inch Touch Kiosk', 'sku' => 'QK-15', 'quantity' => 2, 'price' => 1299.00],
                    ['name' => '32-inch Queue Display', 'sku' => 'DS-32', 'quantity' => 1, 'price' => 499.00],
                ],
                'subtotal' => 3097.00,
                'tax' => 247.76,
                'shipping' => 50.00,
                'total' => 3394.76,
                'status' => 'completed',
                'paymentStatus' => 'paid',
                'paymentMethod' => 'Stripe',
                'shippingAddress' => '123 Main St, New York, NY 10001',
                'orderDate' => '2025-01-15',
                'shippedDate' => '2025-01-16',
                'deliveredDate' => '2025-01-20',
                'trackingNumber' => 'TRACK-123456',
            ],
            [
                'id' => 'ORD-2025-002',
                'orderNumber' => 'ORD-2025-002',
                'customer' => 'Tech Solutions Inc',
                'items' => [
                    ['name' => 'Pro Bundle', 'sku' => 'PRO-BUNDLE', 'quantity' => 1, 'price' => 2461.00],
                ],
                'subtotal' => 2461.00,
                'tax' => 196.88,
                'shipping' => 75.00,
                'total' => 2732.88,
                'status' => 'processing',
                'paymentStatus' => 'paid',
                'paymentMethod' => 'PayPal',
                'shippingAddress' => '456 Tech Ave, San Francisco, CA 94102',
                'orderDate' => '2025-01-18',
                'shippedDate' => null,
                'deliveredDate' => null,
                'trackingNumber' => null,
            ],
            [
                'id' => 'ORD-2025-003',
                'orderNumber' => 'ORD-2025-003',
                'customer' => 'Global Enterprises',
                'items' => [
                    ['name' => '22-inch Touch Kiosk', 'sku' => 'QK-22', 'quantity' => 1, 'price' => 1899.00],
                    ['name' => '55-inch Queue Display', 'sku' => 'DS-55', 'quantity' => 1, 'price' => 899.00],
                ],
                'subtotal' => 2798.00,
                'tax' => 223.84,
                'shipping' => 100.00,
                'total' => 3121.84,
                'status' => 'shipped',
                'paymentStatus' => 'paid',
                'paymentMethod' => 'Stripe',
                'shippingAddress' => '789 Global Blvd, Chicago, IL 60601',
                'orderDate' => '2025-01-20',
                'shippedDate' => '2025-01-21',
                'deliveredDate' => null,
                'trackingNumber' => 'TRACK-789012',
            ],
            [
                'id' => 'ORD-2025-004',
                'orderNumber' => 'ORD-2025-004',
                'customer' => 'Retail Solutions',
                'items' => [
                    ['name' => 'Starter Bundle', 'sku' => 'STARTER-BUNDLE', 'quantity' => 1, 'price' => 1784.00],
                ],
                'subtotal' => 1784.00,
                'tax' => 142.72,
                'shipping' => 0.00,
                'total' => 1926.72,
                'status' => 'pending',
                'paymentStatus' => 'pending',
                'paymentMethod' => null,
                'shippingAddress' => '321 Retail St, Miami, FL 33101',
                'orderDate' => '2025-01-22',
                'shippedDate' => null,
                'deliveredDate' => null,
                'trackingNumber' => null,
            ],
        ];

        return Inertia::render('Ecommerce/Orders', [
            'orders' => $orders,
        ]);
    }

    public function orderView($id)
    {
        $orders = [
            'ORD-2025-001' => [
                'id' => 'ORD-2025-001',
                'orderNumber' => 'ORD-2025-001',
                'customer' => 'Acme Corporation',
                'items' => [
                    ['name' => '15-inch Touch Kiosk', 'sku' => 'QK-15', 'quantity' => 2, 'price' => 1299.00],
                    ['name' => '32-inch Queue Display', 'sku' => 'DS-32', 'quantity' => 1, 'price' => 499.00],
                ],
                'subtotal' => 3097.00,
                'tax' => 247.76,
                'shipping' => 50.00,
                'total' => 3394.76,
                'status' => 'completed',
                'paymentStatus' => 'paid',
                'paymentMethod' => 'Stripe',
                'shippingAddress' => '123 Main St, New York, NY 10001',
                'billingAddress' => '123 Main St, New York, NY 10001',
                'orderDate' => '2025-01-15',
                'shippedDate' => '2025-01-16',
                'deliveredDate' => '2025-01-20',
                'trackingNumber' => 'TRACK-123456',
                'invoiceNumber' => 'INV-2025-001',
            ],
        ];

        $order = $orders[$id] ?? $orders['ORD-2025-001'];

        return Inertia::render('Ecommerce/OrderView', [
            'order' => $order,
        ]);
    }

    public function productForm($id = null)
    {
        $product = null;
        if ($id) {
            $products = [
                '1' => [
                    'id' => '1',
                    'name' => '15-inch Touch Kiosk',
                    'sku' => 'QK-15',
                    'description' => 'Floor-standing kiosk with ticket printer',
                    'price' => 1299.00,
                    'stock' => 45,
                    'image' => '/images/products/qk-15.jpg',
                    'category' => 'Kiosks',
                    'specifications' => [
                        'Screen Size' => '15 inches',
                        'Resolution' => '1920x1080',
                        'Touch' => 'Capacitive',
                        'Printer' => 'Included',
                    ],
                    'features' => [
                        'High-resolution touchscreen display',
                        'Built-in thermal ticket printer',
                        'Durable floor-standing design',
                        'Easy to install and configure',
                    ],
                ],
                '2' => [
                    'id' => '2',
                    'name' => '22-inch Touch Kiosk',
                    'sku' => 'QK-22',
                    'description' => 'Premium floor-standing kiosk',
                    'price' => 1899.00,
                    'stock' => 32,
                    'image' => '/images/products/qk-22.jpg',
                    'category' => 'Kiosks',
                    'specifications' => [
                        'Screen Size' => '22 inches',
                        'Resolution' => '1920x1080',
                        'Touch' => 'Capacitive',
                        'Printer' => 'Included',
                    ],
                    'features' => [
                        'Larger premium display',
                        'Enhanced processing power',
                        'Advanced security features',
                        'Extended warranty included',
                    ],
                ],
            ];
            $product = $products[$id] ?? null;
        }

        return Inertia::render('Ecommerce/ProductForm', [
            'id' => $id,
            'product' => $product,
            'categories' => ['Kiosks', 'Displays', 'Accessories'],
        ]);
    }

    public function bundleForm($id = null)
    {
        $bundle = null;
        if ($id) {
            $bundles = [
                '1' => [
                    'id' => '1',
                    'name' => 'Starter Bundle',
                    'products' => ['QK-15', 'DS-32', 'TP-80'],
                    'productNames' => [
                        '15-inch Touch Kiosk',
                        '32-inch Queue Display',
                        'Thermal Ticket Printer',
                    ],
                    'discount' => 15,
                    'originalPrice' => 2097.00,
                    'price' => 1784.00,
                    'savings' => 313.00,
                    'description' => 'Perfect starter package for small businesses',
                ],
                '2' => [
                    'id' => '2',
                    'name' => 'Pro Bundle',
                    'products' => ['QK-22', 'DS-55', 'TP-80', 'KB-NUM'],
                    'productNames' => [
                        '22-inch Touch Kiosk',
                        '55-inch Queue Display',
                        'Thermal Ticket Printer',
                        'Numeric Keyboard',
                    ],
                    'discount' => 20,
                    'originalPrice' => 3076.00,
                    'price' => 2461.00,
                    'savings' => 615.00,
                    'description' => 'Complete professional solution for larger operations',
                ],
            ];
            $bundle = $bundles[$id] ?? null;
        }

        // Get all products for selection
        $allProducts = [
            ['id' => '1', 'sku' => 'QK-15', 'name' => '15-inch Touch Kiosk', 'price' => 1299.00],
            ['id' => '2', 'sku' => 'QK-22', 'name' => '22-inch Touch Kiosk', 'price' => 1899.00],
            ['id' => '3', 'sku' => 'QK-WALL', 'name' => 'Wall-Mount Kiosk', 'price' => 899.00],
            ['id' => '4', 'sku' => 'DS-32', 'name' => '32-inch Queue Display', 'price' => 499.00],
            ['id' => '5', 'sku' => 'DS-55', 'name' => '55-inch Queue Display', 'price' => 899.00],
            ['id' => '6', 'sku' => 'TP-80', 'name' => 'Thermal Ticket Printer', 'price' => 299.00],
            ['id' => '7', 'sku' => 'KB-NUM', 'name' => 'Numeric Keyboard', 'price' => 79.00],
        ];

        return Inertia::render('Ecommerce/BundleForm', [
            'id' => $id,
            'bundle' => $bundle,
            'products' => $allProducts,
        ]);
    }
}
