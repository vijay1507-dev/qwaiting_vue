import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Marketing\MarketingController::create
 * @see app/Http/Controllers/Marketing/MarketingController.php:403
 * @route '/marketing/sequences/create'
 */
export const create = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

create.definition = {
    methods: ["get","head"],
    url: '/marketing/sequences/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::create
 * @see app/Http/Controllers/Marketing/MarketingController.php:403
 * @route '/marketing/sequences/create'
 */
create.url = (options?: RouteQueryOptions) => {
    return create.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::create
 * @see app/Http/Controllers/Marketing/MarketingController.php:403
 * @route '/marketing/sequences/create'
 */
create.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\MarketingController::create
 * @see app/Http/Controllers/Marketing/MarketingController.php:403
 * @route '/marketing/sequences/create'
 */
create.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: create.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::store
 * @see app/Http/Controllers/Marketing/MarketingController.php:521
 * @route '/marketing/sequences'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/marketing/sequences',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::store
 * @see app/Http/Controllers/Marketing/MarketingController.php:521
 * @route '/marketing/sequences'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::store
 * @see app/Http/Controllers/Marketing/MarketingController.php:521
 * @route '/marketing/sequences'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::edit
 * @see app/Http/Controllers/Marketing/MarketingController.php:403
 * @route '/marketing/sequences/{id}/edit'
 */
export const edit = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/marketing/sequences/{id}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::edit
 * @see app/Http/Controllers/Marketing/MarketingController.php:403
 * @route '/marketing/sequences/{id}/edit'
 */
edit.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { id: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    id: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        id: args.id,
                }

    return edit.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::edit
 * @see app/Http/Controllers/Marketing/MarketingController.php:403
 * @route '/marketing/sequences/{id}/edit'
 */
edit.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\MarketingController::edit
 * @see app/Http/Controllers/Marketing/MarketingController.php:403
 * @route '/marketing/sequences/{id}/edit'
 */
edit.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::update
 * @see app/Http/Controllers/Marketing/MarketingController.php:550
 * @route '/marketing/sequences/{id}'
 */
export const update = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/marketing/sequences/{id}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::update
 * @see app/Http/Controllers/Marketing/MarketingController.php:550
 * @route '/marketing/sequences/{id}'
 */
update.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { id: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    id: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        id: args.id,
                }

    return update.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::update
 * @see app/Http/Controllers/Marketing/MarketingController.php:550
 * @route '/marketing/sequences/{id}'
 */
update.put = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::destroy
 * @see app/Http/Controllers/Marketing/MarketingController.php:585
 * @route '/marketing/sequences/{id}'
 */
export const destroy = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/marketing/sequences/{id}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::destroy
 * @see app/Http/Controllers/Marketing/MarketingController.php:585
 * @route '/marketing/sequences/{id}'
 */
destroy.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { id: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    id: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        id: args.id,
                }

    return destroy.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::destroy
 * @see app/Http/Controllers/Marketing/MarketingController.php:585
 * @route '/marketing/sequences/{id}'
 */
destroy.delete = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::testBatch
 * @see app/Http/Controllers/Marketing/MarketingController.php:480
 * @route '/marketing/sequences/{id}/test-batch'
 */
export const testBatch = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: testBatch.url(args, options),
    method: 'post',
})

testBatch.definition = {
    methods: ["post"],
    url: '/marketing/sequences/{id}/test-batch',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::testBatch
 * @see app/Http/Controllers/Marketing/MarketingController.php:480
 * @route '/marketing/sequences/{id}/test-batch'
 */
testBatch.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { id: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    id: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        id: args.id,
                }

    return testBatch.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::testBatch
 * @see app/Http/Controllers/Marketing/MarketingController.php:480
 * @route '/marketing/sequences/{id}/test-batch'
 */
testBatch.post = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: testBatch.url(args, options),
    method: 'post',
})
const sequences = {
    create: Object.assign(create, create),
store: Object.assign(store, store),
edit: Object.assign(edit, edit),
update: Object.assign(update, update),
destroy: Object.assign(destroy, destroy),
testBatch: Object.assign(testBatch, testBatch),
}

export default sequences