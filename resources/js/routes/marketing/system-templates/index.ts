import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/marketing/system-templates',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
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
* @see \App\Http\Controllers\Marketing\SystemTemplateController::edit
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:42
 * @route '/marketing/system-templates/{id}/edit'
 */
export const edit = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/marketing/system-templates/{id}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::edit
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:42
 * @route '/marketing/system-templates/{id}/edit'
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
* @see \App\Http\Controllers\Marketing\SystemTemplateController::edit
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:42
 * @route '/marketing/system-templates/{id}/edit'
 */
edit.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::edit
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:42
 * @route '/marketing/system-templates/{id}/edit'
 */
edit.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::edit
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:42
 * @route '/marketing/system-templates/{id}/edit'
 */
    const editForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: edit.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::edit
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:42
 * @route '/marketing/system-templates/{id}/edit'
 */
        editForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: edit.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::edit
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:42
 * @route '/marketing/system-templates/{id}/edit'
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
* @see \App\Http\Controllers\Marketing\SystemTemplateController::update
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:78
 * @route '/marketing/system-templates/{id}'
 */
export const update = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/marketing/system-templates/{id}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::update
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:78
 * @route '/marketing/system-templates/{id}'
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
* @see \App\Http\Controllers\Marketing\SystemTemplateController::update
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:78
 * @route '/marketing/system-templates/{id}'
 */
update.put = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

    /**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::update
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:78
 * @route '/marketing/system-templates/{id}'
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
* @see \App\Http\Controllers\Marketing\SystemTemplateController::update
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:78
 * @route '/marketing/system-templates/{id}'
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
const systemTemplates = {
    index: Object.assign(index, index),
edit: Object.assign(edit, edit),
update: Object.assign(update, update),
}

export default systemTemplates