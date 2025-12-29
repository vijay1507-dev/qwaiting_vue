import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:310
 * @route '/subscription/coupons'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/subscription/coupons',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:310
 * @route '/subscription/coupons'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:310
 * @route '/subscription/coupons'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:310
 * @route '/subscription/coupons'
 */
    const storeForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: store.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:310
 * @route '/subscription/coupons'
 */
        storeForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: store.url(options),
            method: 'post',
        })
    
    store.form = storeForm
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:345
 * @route '/subscription/coupons/{coupon}'
 */
export const update = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/subscription/coupons/{coupon}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:345
 * @route '/subscription/coupons/{coupon}'
 */
update.url = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { coupon: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    coupon: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        coupon: args.coupon,
                }

    return update.definition.url
            .replace('{coupon}', parsedArgs.coupon.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:345
 * @route '/subscription/coupons/{coupon}'
 */
update.put = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

    /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:345
 * @route '/subscription/coupons/{coupon}'
 */
    const updateForm = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: update.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'PUT',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:345
 * @route '/subscription/coupons/{coupon}'
 */
        updateForm.put = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: update.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'PUT',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    update.form = updateForm
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:378
 * @route '/subscription/coupons/{coupon}'
 */
export const destroy = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/subscription/coupons/{coupon}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:378
 * @route '/subscription/coupons/{coupon}'
 */
destroy.url = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { coupon: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    coupon: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        coupon: args.coupon,
                }

    return destroy.definition.url
            .replace('{coupon}', parsedArgs.coupon.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:378
 * @route '/subscription/coupons/{coupon}'
 */
destroy.delete = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:378
 * @route '/subscription/coupons/{coupon}'
 */
    const destroyForm = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: destroy.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'DELETE',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:378
 * @route '/subscription/coupons/{coupon}'
 */
        destroyForm.delete = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: destroy.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'DELETE',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    destroy.form = destroyForm
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::usage
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:390
 * @route '/subscription/coupons/{coupon}/usage'
 */
export const usage = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: usage.url(args, options),
    method: 'get',
})

usage.definition = {
    methods: ["get","head"],
    url: '/subscription/coupons/{coupon}/usage',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::usage
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:390
 * @route '/subscription/coupons/{coupon}/usage'
 */
usage.url = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { coupon: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    coupon: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        coupon: args.coupon,
                }

    return usage.definition.url
            .replace('{coupon}', parsedArgs.coupon.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::usage
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:390
 * @route '/subscription/coupons/{coupon}/usage'
 */
usage.get = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: usage.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::usage
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:390
 * @route '/subscription/coupons/{coupon}/usage'
 */
usage.head = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: usage.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::usage
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:390
 * @route '/subscription/coupons/{coupon}/usage'
 */
    const usageForm = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: usage.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::usage
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:390
 * @route '/subscription/coupons/{coupon}/usage'
 */
        usageForm.get = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: usage.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::usage
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:390
 * @route '/subscription/coupons/{coupon}/usage'
 */
        usageForm.head = (args: { coupon: string | number } | [coupon: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: usage.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    usage.form = usageForm
const coupons = {
    store: Object.assign(store, store),
update: Object.assign(update, update),
destroy: Object.assign(destroy, destroy),
usage: Object.assign(usage, usage),
}

export default coupons