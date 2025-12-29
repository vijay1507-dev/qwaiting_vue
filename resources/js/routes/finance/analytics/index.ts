import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../wayfinder'
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

    /**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:444
 * @route '/finance/analytics/view'
 */
    const viewForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: view.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:444
 * @route '/finance/analytics/view'
 */
        viewForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: view.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Finance\FinanceController::view
 * @see app/Http/Controllers/Finance/FinanceController.php:444
 * @route '/finance/analytics/view'
 */
        viewForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: view.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    view.form = viewForm
const analytics = {
    view: Object.assign(view, view),
}

export default analytics