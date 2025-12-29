import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:102
 * @route '/subscription/features'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/subscription/features',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:102
 * @route '/subscription/features'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:102
 * @route '/subscription/features'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:116
 * @route '/subscription/features/{feature}'
 */
export const update = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/subscription/features/{feature}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:116
 * @route '/subscription/features/{feature}'
 */
update.url = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { feature: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    feature: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        feature: args.feature,
                }

    return update.definition.url
            .replace('{feature}', parsedArgs.feature.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:116
 * @route '/subscription/features/{feature}'
 */
update.put = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:132
 * @route '/subscription/features/{feature}'
 */
export const destroy = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/subscription/features/{feature}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:132
 * @route '/subscription/features/{feature}'
 */
destroy.url = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { feature: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    feature: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        feature: args.feature,
                }

    return destroy.definition.url
            .replace('{feature}', parsedArgs.feature.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:132
 * @route '/subscription/features/{feature}'
 */
destroy.delete = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})
const features = {
    store: Object.assign(store, store),
update: Object.assign(update, update),
destroy: Object.assign(destroy, destroy),
}

export default features