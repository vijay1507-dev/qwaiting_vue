import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
import products237d17 from './products'
import bundles15d926 from './bundles'
import ordersB47e5f from './orders'
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::index
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:10
 * @route '/ecommerce'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/ecommerce',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::index
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:10
 * @route '/ecommerce'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::index
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:10
 * @route '/ecommerce'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::index
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:10
 * @route '/ecommerce'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::index
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:10
 * @route '/ecommerce'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::index
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:10
 * @route '/ecommerce'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::index
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:10
 * @route '/ecommerce'
 */
        indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    index.form = indexForm
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::products
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:50
 * @route '/ecommerce/products'
 */
export const products = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: products.url(options),
    method: 'get',
})

products.definition = {
    methods: ["get","head"],
    url: '/ecommerce/products',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::products
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:50
 * @route '/ecommerce/products'
 */
products.url = (options?: RouteQueryOptions) => {
    return products.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::products
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:50
 * @route '/ecommerce/products'
 */
products.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: products.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::products
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:50
 * @route '/ecommerce/products'
 */
products.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: products.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::products
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:50
 * @route '/ecommerce/products'
 */
    const productsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: products.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::products
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:50
 * @route '/ecommerce/products'
 */
        productsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: products.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::products
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:50
 * @route '/ecommerce/products'
 */
        productsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: products.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    products.form = productsForm
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::bundles
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:228
 * @route '/ecommerce/bundles'
 */
export const bundles = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: bundles.url(options),
    method: 'get',
})

bundles.definition = {
    methods: ["get","head"],
    url: '/ecommerce/bundles',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::bundles
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:228
 * @route '/ecommerce/bundles'
 */
bundles.url = (options?: RouteQueryOptions) => {
    return bundles.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::bundles
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:228
 * @route '/ecommerce/bundles'
 */
bundles.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: bundles.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::bundles
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:228
 * @route '/ecommerce/bundles'
 */
bundles.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: bundles.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::bundles
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:228
 * @route '/ecommerce/bundles'
 */
    const bundlesForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: bundles.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::bundles
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:228
 * @route '/ecommerce/bundles'
 */
        bundlesForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: bundles.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::bundles
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:228
 * @route '/ecommerce/bundles'
 */
        bundlesForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: bundles.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    bundles.form = bundlesForm
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::cart
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:269
 * @route '/ecommerce/cart'
 */
export const cart = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: cart.url(options),
    method: 'get',
})

cart.definition = {
    methods: ["get","head"],
    url: '/ecommerce/cart',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::cart
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:269
 * @route '/ecommerce/cart'
 */
cart.url = (options?: RouteQueryOptions) => {
    return cart.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::cart
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:269
 * @route '/ecommerce/cart'
 */
cart.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: cart.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::cart
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:269
 * @route '/ecommerce/cart'
 */
cart.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: cart.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::cart
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:269
 * @route '/ecommerce/cart'
 */
    const cartForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: cart.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::cart
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:269
 * @route '/ecommerce/cart'
 */
        cartForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: cart.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::cart
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:269
 * @route '/ecommerce/cart'
 */
        cartForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: cart.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    cart.form = cartForm
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::orders
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:303
 * @route '/ecommerce/orders'
 */
export const orders = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: orders.url(options),
    method: 'get',
})

orders.definition = {
    methods: ["get","head"],
    url: '/ecommerce/orders',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::orders
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:303
 * @route '/ecommerce/orders'
 */
orders.url = (options?: RouteQueryOptions) => {
    return orders.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::orders
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:303
 * @route '/ecommerce/orders'
 */
orders.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: orders.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::orders
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:303
 * @route '/ecommerce/orders'
 */
orders.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: orders.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::orders
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:303
 * @route '/ecommerce/orders'
 */
    const ordersForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: orders.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::orders
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:303
 * @route '/ecommerce/orders'
 */
        ordersForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: orders.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::orders
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:303
 * @route '/ecommerce/orders'
 */
        ordersForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: orders.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    orders.form = ordersForm
const ecommerce = {
    index: Object.assign(index, index),
products: Object.assign(products, products237d17),
bundles: Object.assign(bundles, bundles15d926),
cart: Object.assign(cart, cart),
orders: Object.assign(orders, ordersB47e5f),
}

export default ecommerce