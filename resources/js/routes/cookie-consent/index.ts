import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../wayfinder'
/**
* @see \App\Http\Controllers\website\CookieConsentController::store
 * @see app/Http/Controllers/website/CookieConsentController.php:11
 * @route '/cookie-consent'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/cookie-consent',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\website\CookieConsentController::store
 * @see app/Http/Controllers/website/CookieConsentController.php:11
 * @route '/cookie-consent'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\CookieConsentController::store
 * @see app/Http/Controllers/website/CookieConsentController.php:11
 * @route '/cookie-consent'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})
const cookieConsent = {
    store: Object.assign(store, store),
}

export default cookieConsent