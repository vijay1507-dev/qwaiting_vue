import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:490
 * @route '/ecommerce/bundles/create'
 */
export const create = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

create.definition = {
    methods: ["get","head"],
    url: '/ecommerce/bundles/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:490
 * @route '/ecommerce/bundles/create'
 */
create.url = (options?: RouteQueryOptions) => {
    return create.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:490
 * @route '/ecommerce/bundles/create'
 */
create.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::create
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:490
 * @route '/ecommerce/bundles/create'
 */
create.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: create.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:490
 * @route '/ecommerce/bundles/{id}/edit'
 */
export const edit = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/ecommerce/bundles/{id}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:490
 * @route '/ecommerce/bundles/{id}/edit'
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
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:490
 * @route '/ecommerce/bundles/{id}/edit'
 */
edit.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Ecommerce\EcommerceController::edit
 * @see app/Http/Controllers/Ecommerce/EcommerceController.php:490
 * @route '/ecommerce/bundles/{id}/edit'
 */
edit.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})
const bundles = {
    create: Object.assign(create, create),
edit: Object.assign(edit, edit),
}

export default bundles