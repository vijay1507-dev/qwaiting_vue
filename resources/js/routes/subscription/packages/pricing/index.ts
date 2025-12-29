import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::get
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:237
 * @route '/subscription/packages/{package}/pricing'
 */
export const get = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: get.url(args, options),
    method: 'get',
})

get.definition = {
    methods: ["get","head"],
    url: '/subscription/packages/{package}/pricing',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::get
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:237
 * @route '/subscription/packages/{package}/pricing'
 */
get.url = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { package: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    package: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        package: args.package,
                }

    return get.definition.url
            .replace('{package}', parsedArgs.package.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::get
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:237
 * @route '/subscription/packages/{package}/pricing'
 */
get.get = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: get.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::get
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:237
 * @route '/subscription/packages/{package}/pricing'
 */
get.head = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: get.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:266
 * @route '/subscription/packages/{package}/pricing'
 */
export const store = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(args, options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/subscription/packages/{package}/pricing',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:266
 * @route '/subscription/packages/{package}/pricing'
 */
store.url = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { package: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    package: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        package: args.package,
                }

    return store.definition.url
            .replace('{package}', parsedArgs.package.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:266
 * @route '/subscription/packages/{package}/pricing'
 */
store.post = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(args, options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:279
 * @route '/subscription/packages/{package}/pricing/{pricing}'
 */
export const update = (args: { package: string | number, pricing: string | number } | [packageParam: string | number, pricing: string | number ], options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/subscription/packages/{package}/pricing/{pricing}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:279
 * @route '/subscription/packages/{package}/pricing/{pricing}'
 */
update.url = (args: { package: string | number, pricing: string | number } | [packageParam: string | number, pricing: string | number ], options?: RouteQueryOptions) => {
    if (Array.isArray(args)) {
        args = {
                    package: args[0],
                    pricing: args[1],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        package: args.package,
                                pricing: args.pricing,
                }

    return update.definition.url
            .replace('{package}', parsedArgs.package.toString())
            .replace('{pricing}', parsedArgs.pricing.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:279
 * @route '/subscription/packages/{package}/pricing/{pricing}'
 */
update.put = (args: { package: string | number, pricing: string | number } | [packageParam: string | number, pricing: string | number ], options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:296
 * @route '/subscription/packages/{package}/pricing/{pricing}'
 */
export const destroy = (args: { package: string | number, pricing: string | number } | [packageParam: string | number, pricing: string | number ], options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/subscription/packages/{package}/pricing/{pricing}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:296
 * @route '/subscription/packages/{package}/pricing/{pricing}'
 */
destroy.url = (args: { package: string | number, pricing: string | number } | [packageParam: string | number, pricing: string | number ], options?: RouteQueryOptions) => {
    if (Array.isArray(args)) {
        args = {
                    package: args[0],
                    pricing: args[1],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        package: args.package,
                                pricing: args.pricing,
                }

    return destroy.definition.url
            .replace('{package}', parsedArgs.package.toString())
            .replace('{pricing}', parsedArgs.pricing.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:296
 * @route '/subscription/packages/{package}/pricing/{pricing}'
 */
destroy.delete = (args: { package: string | number, pricing: string | number } | [packageParam: string | number, pricing: string | number ], options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})
const pricing = {
    get: Object.assign(get, get),
store: Object.assign(store, store),
update: Object.assign(update, update),
destroy: Object.assign(destroy, destroy),
}

export default pricing