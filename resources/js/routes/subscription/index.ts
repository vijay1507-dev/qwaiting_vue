import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
import features from './features'
import packages from './packages'
import coupons from './coupons'
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::index
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:32
 * @route '/subscription'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/subscription',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::index
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:32
 * @route '/subscription'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::index
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:32
 * @route '/subscription'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::index
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:32
 * @route '/subscription'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::index
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:32
 * @route '/subscription'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::index
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:32
 * @route '/subscription'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::index
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:32
 * @route '/subscription'
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
* @see \App\Http\Controllers\Subscription\SubscriptionController::preview
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:430
 * @route '/subscription/preview'
 */
export const preview = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: preview.url(options),
    method: 'get',
})

preview.definition = {
    methods: ["get","head"],
    url: '/subscription/preview',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::preview
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:430
 * @route '/subscription/preview'
 */
preview.url = (options?: RouteQueryOptions) => {
    return preview.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::preview
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:430
 * @route '/subscription/preview'
 */
preview.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: preview.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Subscription\SubscriptionController::preview
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:430
 * @route '/subscription/preview'
 */
preview.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: preview.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::preview
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:430
 * @route '/subscription/preview'
 */
    const previewForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: preview.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::preview
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:430
 * @route '/subscription/preview'
 */
        previewForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: preview.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Subscription\SubscriptionController::preview
 * @see app/Http/Controllers/Subscription/SubscriptionController.php:430
 * @route '/subscription/preview'
 */
        previewForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: preview.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    preview.form = previewForm
const subscription = {
    index: Object.assign(index, index),
features: Object.assign(features, features),
packages: Object.assign(packages, packages),
coupons: Object.assign(coupons, coupons),
preview: Object.assign(preview, preview),
}

export default subscription