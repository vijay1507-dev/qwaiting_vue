import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\Api\CartController::add
 * @see app/Http/Controllers/Api/CartController.php:18
 * @route '/api/ecommerce/cart/add'
 */
export const add = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: add.url(options),
    method: 'post',
})

add.definition = {
    methods: ["post"],
    url: '/api/ecommerce/cart/add',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Api\CartController::add
 * @see app/Http/Controllers/Api/CartController.php:18
 * @route '/api/ecommerce/cart/add'
 */
add.url = (options?: RouteQueryOptions) => {
    return add.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Api\CartController::add
 * @see app/Http/Controllers/Api/CartController.php:18
 * @route '/api/ecommerce/cart/add'
 */
add.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: add.url(options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\Api\CartController::add
 * @see app/Http/Controllers/Api/CartController.php:18
 * @route '/api/ecommerce/cart/add'
 */
    const addForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: add.url(options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Api\CartController::add
 * @see app/Http/Controllers/Api/CartController.php:18
 * @route '/api/ecommerce/cart/add'
 */
        addForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: add.url(options),
            method: 'post',
        })
    
    add.form = addForm
/**
* @see \App\Http\Controllers\Api\CartController::update
 * @see app/Http/Controllers/Api/CartController.php:35
 * @route '/api/ecommerce/cart/{id}'
 */
export const update = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/api/ecommerce/cart/{id}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Api\CartController::update
 * @see app/Http/Controllers/Api/CartController.php:35
 * @route '/api/ecommerce/cart/{id}'
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
* @see \App\Http\Controllers\Api\CartController::update
 * @see app/Http/Controllers/Api/CartController.php:35
 * @route '/api/ecommerce/cart/{id}'
 */
update.put = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

    /**
* @see \App\Http\Controllers\Api\CartController::update
 * @see app/Http/Controllers/Api/CartController.php:35
 * @route '/api/ecommerce/cart/{id}'
 */
    const updateForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: update.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'PUT',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Api\CartController::update
 * @see app/Http/Controllers/Api/CartController.php:35
 * @route '/api/ecommerce/cart/{id}'
 */
        updateForm.put = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: update.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'PUT',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    update.form = updateForm
/**
* @see \App\Http\Controllers\Api\CartController::remove
 * @see app/Http/Controllers/Api/CartController.php:51
 * @route '/api/ecommerce/cart/{id}'
 */
export const remove = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: remove.url(args, options),
    method: 'delete',
})

remove.definition = {
    methods: ["delete"],
    url: '/api/ecommerce/cart/{id}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\Api\CartController::remove
 * @see app/Http/Controllers/Api/CartController.php:51
 * @route '/api/ecommerce/cart/{id}'
 */
remove.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return remove.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Api\CartController::remove
 * @see app/Http/Controllers/Api/CartController.php:51
 * @route '/api/ecommerce/cart/{id}'
 */
remove.delete = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: remove.url(args, options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\Api\CartController::remove
 * @see app/Http/Controllers/Api/CartController.php:51
 * @route '/api/ecommerce/cart/{id}'
 */
    const removeForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: remove.url(args, {
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'DELETE',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Api\CartController::remove
 * @see app/Http/Controllers/Api/CartController.php:51
 * @route '/api/ecommerce/cart/{id}'
 */
        removeForm.delete = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: remove.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'DELETE',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    remove.form = removeForm
/**
* @see \App\Http\Controllers\Api\CartController::clear
 * @see app/Http/Controllers/Api/CartController.php:62
 * @route '/api/ecommerce/cart'
 */
export const clear = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: clear.url(options),
    method: 'delete',
})

clear.definition = {
    methods: ["delete"],
    url: '/api/ecommerce/cart',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\Api\CartController::clear
 * @see app/Http/Controllers/Api/CartController.php:62
 * @route '/api/ecommerce/cart'
 */
clear.url = (options?: RouteQueryOptions) => {
    return clear.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Api\CartController::clear
 * @see app/Http/Controllers/Api/CartController.php:62
 * @route '/api/ecommerce/cart'
 */
clear.delete = (options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: clear.url(options),
    method: 'delete',
})

    /**
* @see \App\Http\Controllers\Api\CartController::clear
 * @see app/Http/Controllers/Api/CartController.php:62
 * @route '/api/ecommerce/cart'
 */
    const clearForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: clear.url({
                    [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                        _method: 'DELETE',
                        ...(options?.query ?? options?.mergeQuery ?? {}),
                    }
                }),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Api\CartController::clear
 * @see app/Http/Controllers/Api/CartController.php:62
 * @route '/api/ecommerce/cart'
 */
        clearForm.delete = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: clear.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'DELETE',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'post',
        })
    
    clear.form = clearForm
const cart = {
    add: Object.assign(add, add),
update: Object.assign(update, update),
remove: Object.assign(remove, remove),
clear: Object.assign(clear, clear),
}

export default cart