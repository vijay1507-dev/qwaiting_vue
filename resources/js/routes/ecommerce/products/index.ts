import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/create'
 */
export const create = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

create.definition = {
    methods: ["get","head"],
    url: '/ecommerce/products/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/create'
 */
create.url = (options?: RouteQueryOptions) => {
    return create.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/create'
 */
create.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/create'
 */
create.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: create.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/create'
 */
    const createForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: create.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/create'
 */
        createForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: create.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/create'
 */
        createForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: create.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    create.form = createForm
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/{id}/edit'
 */
export const edit = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/ecommerce/products/{id}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/{id}/edit'
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
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/{id}/edit'
 */
edit.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/{id}/edit'
 */
edit.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/{id}/edit'
 */
    const editForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: edit.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/{id}/edit'
 */
        editForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: edit.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:430
 * @route '/ecommerce/products/{id}/edit'
 */
        editForm.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: edit.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    edit.form = editForm
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::view
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:172
 * @route '/ecommerce/products/{id}'
 */
export const view = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: view.url(args, options),
    method: 'get',
})

view.definition = {
    methods: ["get","head"],
    url: '/ecommerce/products/{id}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::view
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:172
 * @route '/ecommerce/products/{id}'
 */
view.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return view.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::view
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:172
 * @route '/ecommerce/products/{id}'
 */
view.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: view.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::view
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:172
 * @route '/ecommerce/products/{id}'
 */
view.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: view.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::view
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:172
 * @route '/ecommerce/products/{id}'
 */
    const viewForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: view.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::view
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:172
 * @route '/ecommerce/products/{id}'
 */
        viewForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: view.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::view
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:172
 * @route '/ecommerce/products/{id}'
 */
        viewForm.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: view.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    view.form = viewForm
const products = {
    create: Object.assign(create, create),
edit: Object.assign(edit, edit),
view: Object.assign(view, view),
}

export default products