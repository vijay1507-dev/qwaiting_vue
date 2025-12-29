import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:356
 * @route '/finance/kpis/view'
 */
export const view = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: view.url(options),
    method: 'get',
})

view.definition = {
    methods: ["get","head"],
    url: '/finance/kpis/view',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:356
 * @route '/finance/kpis/view'
 */
view.url = (options?: RouteQueryOptions) => {
    return view.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:356
 * @route '/finance/kpis/view'
 */
view.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: view.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:356
 * @route '/finance/kpis/view'
 */
view.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: view.url(options),
    method: 'head',
})
const kpis = {
    view: Object.assign(view, view),
}

export default kpis