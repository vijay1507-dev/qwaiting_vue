import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../wayfinder'
import dashboard074181 from './dashboard'
import kpis17354a from './kpis'
import analytics72d765 from './analytics'
/**
* @see \App\Http\Controllers\Finance\FinanceController::index
 * @see app/Http/Controllers/Finance/FinanceController.php:10
 * @route '/finance'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/finance',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Finance\FinanceController::index
 * @see app/Http/Controllers/Finance/FinanceController.php:10
 * @route '/finance'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Finance\FinanceController::index
 * @see app/Http/Controllers/Finance/FinanceController.php:10
 * @route '/finance'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Finance\FinanceController::index
 * @see app/Http/Controllers/Finance/FinanceController.php:10
 * @route '/finance'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Finance\FinanceController::dashboard
 * @see app/Http/Controllers/Finance/FinanceController.php:54
 * @route '/finance/dashboard'
 */
export const dashboard = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: dashboard.url(options),
    method: 'get',
})

dashboard.definition = {
    methods: ["get","head"],
    url: '/finance/dashboard',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Finance\FinanceController::dashboard
 * @see app/Http/Controllers/Finance/FinanceController.php:54
 * @route '/finance/dashboard'
 */
dashboard.url = (options?: RouteQueryOptions) => {
    return dashboard.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Finance\FinanceController::dashboard
 * @see app/Http/Controllers/Finance/FinanceController.php:54
 * @route '/finance/dashboard'
 */
dashboard.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: dashboard.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Finance\FinanceController::dashboard
 * @see app/Http/Controllers/Finance/FinanceController.php:54
 * @route '/finance/dashboard'
 */
dashboard.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: dashboard.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Finance\FinanceController::kpis
 * @see app/Http/Controllers/Finance/FinanceController.php:151
 * @route '/finance/kpis'
 */
export const kpis = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: kpis.url(options),
    method: 'get',
})

kpis.definition = {
    methods: ["get","head"],
    url: '/finance/kpis',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Finance\FinanceController::kpis
 * @see app/Http/Controllers/Finance/FinanceController.php:151
 * @route '/finance/kpis'
 */
kpis.url = (options?: RouteQueryOptions) => {
    return kpis.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Finance\FinanceController::kpis
 * @see app/Http/Controllers/Finance/FinanceController.php:151
 * @route '/finance/kpis'
 */
kpis.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: kpis.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Finance\FinanceController::kpis
 * @see app/Http/Controllers/Finance/FinanceController.php:151
 * @route '/finance/kpis'
 */
kpis.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: kpis.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Finance\FinanceController::analytics
 * @see app/Http/Controllers/Finance/FinanceController.php:231
 * @route '/finance/analytics'
 */
export const analytics = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: analytics.url(options),
    method: 'get',
})

analytics.definition = {
    methods: ["get","head"],
    url: '/finance/analytics',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Finance\FinanceController::analytics
 * @see app/Http/Controllers/Finance/FinanceController.php:231
 * @route '/finance/analytics'
 */
analytics.url = (options?: RouteQueryOptions) => {
    return analytics.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Finance\FinanceController::analytics
 * @see app/Http/Controllers/Finance/FinanceController.php:231
 * @route '/finance/analytics'
 */
analytics.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: analytics.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Finance\FinanceController::analytics
 * @see app/Http/Controllers/Finance/FinanceController.php:231
 * @route '/finance/analytics'
 */
analytics.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: analytics.url(options),
    method: 'head',
})
const finance = {
    index: Object.assign(index, index),
dashboard: Object.assign(dashboard, dashboard074181),
kpis: Object.assign(kpis, kpis17354a),
analytics: Object.assign(analytics, analytics72d765),
}

export default finance