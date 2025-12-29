import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../wayfinder'
/**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::login
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:47
 * @route '/crm/login'
 */
export const login = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: login.url(options),
    method: 'get',
})

login.definition = {
    methods: ["get","head"],
    url: '/crm/login',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::login
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:47
 * @route '/crm/login'
 */
login.url = (options?: RouteQueryOptions) => {
    return login.definition.url + queryParams(options)
}

/**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::login
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:47
 * @route '/crm/login'
 */
login.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: login.url(options),
    method: 'get',
})
/**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::login
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:47
 * @route '/crm/login'
 */
login.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: login.url(options),
    method: 'head',
})

    /**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::login
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:47
 * @route '/crm/login'
 */
    const loginForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: login.url(options),
        method: 'get',
    })

            /**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::login
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:47
 * @route '/crm/login'
 */
        loginForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: login.url(options),
            method: 'get',
        })
            /**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::login
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:47
 * @route '/crm/login'
 */
        loginForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: login.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    login.form = loginForm
/**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::logout
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:100
 * @route '/crm/logout'
 */
export const logout = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: logout.url(options),
    method: 'post',
})

logout.definition = {
    methods: ["post"],
    url: '/crm/logout',
} satisfies RouteDefinition<["post"]>

/**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::logout
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:100
 * @route '/crm/logout'
 */
logout.url = (options?: RouteQueryOptions) => {
    return logout.definition.url + queryParams(options)
}

/**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::logout
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:100
 * @route '/crm/logout'
 */
logout.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: logout.url(options),
    method: 'post',
})

    /**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::logout
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:100
 * @route '/crm/logout'
 */
    const logoutForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: logout.url(options),
        method: 'post',
    })

            /**
* @see \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::logout
 * @see vendor/laravel/fortify/src/Http/Controllers/AuthenticatedSessionController.php:100
 * @route '/crm/logout'
 */
        logoutForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: logout.url(options),
            method: 'post',
        })
    
    logout.form = logoutForm
/**
 * @see routes/web.php:8
 * @route '/'
 */
export const home = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: home.url(options),
    method: 'get',
})

home.definition = {
    methods: ["get","head"],
    url: '/',
} satisfies RouteDefinition<["get","head"]>

/**
 * @see routes/web.php:8
 * @route '/'
 */
home.url = (options?: RouteQueryOptions) => {
    return home.definition.url + queryParams(options)
}

/**
 * @see routes/web.php:8
 * @route '/'
 */
home.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: home.url(options),
    method: 'get',
})
/**
 * @see routes/web.php:8
 * @route '/'
 */
home.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: home.url(options),
    method: 'head',
})

    /**
 * @see routes/web.php:8
 * @route '/'
 */
    const homeForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: home.url(options),
        method: 'get',
    })

            /**
 * @see routes/web.php:8
 * @route '/'
 */
        homeForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: home.url(options),
            method: 'get',
        })
            /**
 * @see routes/web.php:8
 * @route '/'
 */
        homeForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: home.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    home.form = homeForm
/**
 * @see routes/web.php:15
 * @route '/dashboard'
 */
export const dashboard = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: dashboard.url(options),
    method: 'get',
})

dashboard.definition = {
    methods: ["get","head"],
    url: '/dashboard',
} satisfies RouteDefinition<["get","head"]>

/**
 * @see routes/web.php:15
 * @route '/dashboard'
 */
dashboard.url = (options?: RouteQueryOptions) => {
    return dashboard.definition.url + queryParams(options)
}

/**
 * @see routes/web.php:15
 * @route '/dashboard'
 */
dashboard.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: dashboard.url(options),
    method: 'get',
})
/**
 * @see routes/web.php:15
 * @route '/dashboard'
 */
dashboard.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: dashboard.url(options),
    method: 'head',
})

    /**
 * @see routes/web.php:15
 * @route '/dashboard'
 */
    const dashboardForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: dashboard.url(options),
        method: 'get',
    })

            /**
 * @see routes/web.php:15
 * @route '/dashboard'
 */
        dashboardForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: dashboard.url(options),
            method: 'get',
        })
            /**
 * @see routes/web.php:15
 * @route '/dashboard'
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
* @see \App\Http\Controllers\website\PricingController::pricing
 * @see app/Http/Controllers/website/PricingController.php:16
 * @route '/pricing'
 */
export const pricing = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: pricing.url(options),
    method: 'get',
})

pricing.definition = {
    methods: ["get","head"],
    url: '/pricing',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\website\PricingController::pricing
 * @see app/Http/Controllers/website/PricingController.php:16
 * @route '/pricing'
 */
pricing.url = (options?: RouteQueryOptions) => {
    return pricing.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\PricingController::pricing
 * @see app/Http/Controllers/website/PricingController.php:16
 * @route '/pricing'
 */
pricing.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: pricing.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\website\PricingController::pricing
 * @see app/Http/Controllers/website/PricingController.php:16
 * @route '/pricing'
 */
pricing.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: pricing.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\website\PricingController::pricing
 * @see app/Http/Controllers/website/PricingController.php:16
 * @route '/pricing'
 */
    const pricingForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: pricing.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\website\PricingController::pricing
 * @see app/Http/Controllers/website/PricingController.php:16
 * @route '/pricing'
 */
        pricingForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: pricing.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\website\PricingController::pricing
 * @see app/Http/Controllers/website/PricingController.php:16
 * @route '/pricing'
 */
        pricingForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: pricing.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    pricing.form = pricingForm
/**
* @see \App\Http\Controllers\website\SignupController::signup
 * @see app/Http/Controllers/website/SignupController.php:23
 * @route '/signup'
 */
export const signup = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: signup.url(options),
    method: 'get',
})

signup.definition = {
    methods: ["get","head"],
    url: '/signup',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\website\SignupController::signup
 * @see app/Http/Controllers/website/SignupController.php:23
 * @route '/signup'
 */
signup.url = (options?: RouteQueryOptions) => {
    return signup.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SignupController::signup
 * @see app/Http/Controllers/website/SignupController.php:23
 * @route '/signup'
 */
signup.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: signup.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\website\SignupController::signup
 * @see app/Http/Controllers/website/SignupController.php:23
 * @route '/signup'
 */
signup.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: signup.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\website\SignupController::signup
 * @see app/Http/Controllers/website/SignupController.php:23
 * @route '/signup'
 */
    const signupForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: signup.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\website\SignupController::signup
 * @see app/Http/Controllers/website/SignupController.php:23
 * @route '/signup'
 */
        signupForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: signup.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\website\SignupController::signup
 * @see app/Http/Controllers/website/SignupController.php:23
 * @route '/signup'
 */
        signupForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: signup.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    signup.form = signupForm
/**
 * @see routes/web.php:325
 * @route '/website-login'
 */
export const websiteLogin = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: websiteLogin.url(options),
    method: 'get',
})

websiteLogin.definition = {
    methods: ["get","head"],
    url: '/website-login',
} satisfies RouteDefinition<["get","head"]>

/**
 * @see routes/web.php:325
 * @route '/website-login'
 */
websiteLogin.url = (options?: RouteQueryOptions) => {
    return websiteLogin.definition.url + queryParams(options)
}

/**
 * @see routes/web.php:325
 * @route '/website-login'
 */
websiteLogin.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: websiteLogin.url(options),
    method: 'get',
})
/**
 * @see routes/web.php:325
 * @route '/website-login'
 */
websiteLogin.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: websiteLogin.url(options),
    method: 'head',
})

    /**
 * @see routes/web.php:325
 * @route '/website-login'
 */
    const websiteLoginForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: websiteLogin.url(options),
        method: 'get',
    })

            /**
 * @see routes/web.php:325
 * @route '/website-login'
 */
        websiteLoginForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: websiteLogin.url(options),
            method: 'get',
        })
            /**
 * @see routes/web.php:325
 * @route '/website-login'
 */
        websiteLoginForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: websiteLogin.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    websiteLogin.form = websiteLoginForm
/**
 * @see routes/web.php:335
 * @route '/request-demo'
 */
export const requestDemo = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: requestDemo.url(options),
    method: 'get',
})

requestDemo.definition = {
    methods: ["get","head"],
    url: '/request-demo',
} satisfies RouteDefinition<["get","head"]>

/**
 * @see routes/web.php:335
 * @route '/request-demo'
 */
requestDemo.url = (options?: RouteQueryOptions) => {
    return requestDemo.definition.url + queryParams(options)
}

/**
 * @see routes/web.php:335
 * @route '/request-demo'
 */
requestDemo.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: requestDemo.url(options),
    method: 'get',
})
/**
 * @see routes/web.php:335
 * @route '/request-demo'
 */
requestDemo.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: requestDemo.url(options),
    method: 'head',
})

    /**
 * @see routes/web.php:335
 * @route '/request-demo'
 */
    const requestDemoForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: requestDemo.url(options),
        method: 'get',
    })

            /**
 * @see routes/web.php:335
 * @route '/request-demo'
 */
        requestDemoForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: requestDemo.url(options),
            method: 'get',
        })
            /**
 * @see routes/web.php:335
 * @route '/request-demo'
 */
        requestDemoForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: requestDemo.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    requestDemo.form = requestDemoForm