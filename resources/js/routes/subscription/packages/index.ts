import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../wayfinder'
import configuration from './configuration'
import pricing from './pricing'
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:145
 * @route '/subscription/packages'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/subscription/packages',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:145
 * @route '/subscription/packages'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::store
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:145
 * @route '/subscription/packages'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:155
 * @route '/subscription/packages/{package}'
 */
export const update = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/subscription/packages/{package}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:155
 * @route '/subscription/packages/{package}'
 */
update.url = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return update.definition.url
            .replace('{package}', parsedArgs.package.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::update
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:155
 * @route '/subscription/packages/{package}'
 */
update.put = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:166
 * @route '/subscription/packages/{package}'
 */
export const destroy = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/subscription/packages/{package}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:166
 * @route '/subscription/packages/{package}'
 */
destroy.url = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return destroy.definition.url
            .replace('{package}', parsedArgs.package.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::destroy
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:166
 * @route '/subscription/packages/{package}'
 */
destroy.delete = (args: { package: string | number } | [packageParam: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})
const packages = {
    store: Object.assign(store, store),
update: Object.assign(update, update),
destroy: Object.assign(destroy, destroy),
configuration: Object.assign(configuration, configuration),
pricing: Object.assign(pricing, pricing),
}

export default packages