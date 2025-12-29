import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:444
 * @route '/finance/analytics/view'
 */
export const view = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: view.url(options),
    method: 'get',
})

view.definition = {
    methods: ["get","head"],
    url: '/finance/analytics/view',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:444
 * @route '/finance/analytics/view'
 */
view.url = (options?: RouteQueryOptions) => {
    return view.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:444
 * @route '/finance/analytics/view'
 */
view.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: view.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:444
 * @route '/finance/analytics/view'
 */
view.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: view.url(options),
    method: 'head',
})
const analytics = {
    view: Object.assign(view, view),
}

export default analytics