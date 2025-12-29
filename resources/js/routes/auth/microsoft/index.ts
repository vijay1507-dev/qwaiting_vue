import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\website\SocialAuthController::callback
 * @see app/Http/Controllers/website/SocialAuthController.php:58
 * @route '/auth/microsoft/callback'
 */
export const callback = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: callback.url(options),
    method: 'get',
})

callback.definition = {
    methods: ["get","head"],
    url: '/auth/microsoft/callback',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\website\SocialAuthController::callback
 * @see app/Http/Controllers/website/SocialAuthController.php:58
 * @route '/auth/microsoft/callback'
 */
callback.url = (options?: RouteQueryOptions) => {
    return callback.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SocialAuthController::callback
 * @see app/Http/Controllers/website/SocialAuthController.php:58
 * @route '/auth/microsoft/callback'
 */
callback.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: callback.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\website\SocialAuthController::callback
 * @see app/Http/Controllers/website/SocialAuthController.php:58
 * @route '/auth/microsoft/callback'
 */
callback.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: callback.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\website\SocialAuthController::callback
 * @see app/Http/Controllers/website/SocialAuthController.php:58
 * @route '/auth/microsoft/callback'
 */
    const callbackForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: callback.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\website\SocialAuthController::callback
 * @see app/Http/Controllers/website/SocialAuthController.php:58
 * @route '/auth/microsoft/callback'
 */
        callbackForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: callback.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\website\SocialAuthController::callback
 * @see app/Http/Controllers/website/SocialAuthController.php:58
 * @route '/auth/microsoft/callback'
 */
        callbackForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: callback.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    callback.form = callbackForm
const microsoft = {
    callback: Object.assign(callback, callback),
}

export default microsoft