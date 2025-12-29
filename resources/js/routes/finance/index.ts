import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
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
* @see \App\Http\Controllers\Finance\FinanceController::index
 * @see app/Http/Controllers/Finance/FinanceController.php:10
 * @route '/finance'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Finance\FinanceController::index
 * @see app/Http/Controllers/Finance/FinanceController.php:10
 * @route '/finance'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Finance\FinanceController::index
 * @see app/Http/Controllers/Finance/FinanceController.php:10
 * @route '/finance'
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
* @see \App\Http\Controllers\Finance\FinanceController::dashboard
 * @see app/Http/Controllers/Finance/FinanceController.php:54
 * @route '/finance/dashboard'
 */
    const dashboardForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: dashboard.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Finance\FinanceController::dashboard
 * @see app/Http/Controllers/Finance/FinanceController.php:54
 * @route '/finance/dashboard'
 */
        dashboardForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: dashboard.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Finance\FinanceController::dashboard
 * @see app/Http/Controllers/Finance/FinanceController.php:54
 * @route '/finance/dashboard'
 */
        dashboardForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: dashboard.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    dashboard.form = dashboardForm
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
* @see \App\Http\Controllers\Finance\FinanceController::kpis
 * @see app/Http/Controllers/Finance/FinanceController.php:151
 * @route '/finance/kpis'
 */
    const kpisForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: kpis.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Finance\FinanceController::kpis
 * @see app/Http/Controllers/Finance/FinanceController.php:151
 * @route '/finance/kpis'
 */
        kpisForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: kpis.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Finance\FinanceController::kpis
 * @see app/Http/Controllers/Finance/FinanceController.php:151
 * @route '/finance/kpis'
 */
        kpisForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: kpis.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    kpis.form = kpisForm
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

    /**
* @see \App\Http\Controllers\Finance\FinanceController::analytics
 * @see app/Http/Controllers/Finance/FinanceController.php:231
 * @route '/finance/analytics'
 */
    const analyticsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: analytics.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Finance\FinanceController::analytics
 * @see app/Http/Controllers/Finance/FinanceController.php:231
 * @route '/finance/analytics'
 */
        analyticsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: analytics.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Finance\FinanceController::analytics
 * @see app/Http/Controllers/Finance/FinanceController.php:231
 * @route '/finance/analytics'
 */
        analyticsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: analytics.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    analytics.form = analyticsForm
const finance = {
    index: Object.assign(index, index),
dashboard: Object.assign(dashboard, dashboard074181),
kpis: Object.assign(kpis, kpis17354a),
analytics: Object.assign(analytics, analytics72d765),
}

export default finance