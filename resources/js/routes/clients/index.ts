import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../wayfinder'
import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\Client\ClientsController::index
 * @see app/Http/Controllers/Client/ClientsController.php:21
 * @route '/clients'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/clients',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Client\ClientsController::index
 * @see app/Http/Controllers/Client/ClientsController.php:21
 * @route '/clients'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Client\ClientsController::index
 * @see app/Http/Controllers/Client/ClientsController.php:21
 * @route '/clients'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Client\ClientsController::index
 * @see app/Http/Controllers/Client/ClientsController.php:21
 * @route '/clients'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Client\ClientsController::index
 * @see app/Http/Controllers/Client/ClientsController.php:21
 * @route '/clients'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Client\ClientsController::index
 * @see app/Http/Controllers/Client/ClientsController.php:21
 * @route '/clients'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Client\ClientsController::index
 * @see app/Http/Controllers/Client/ClientsController.php:21
 * @route '/clients'
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
* @see \App\Http\Controllers\Client\ClientsController::show
 * @see app/Http/Controllers/Client/ClientsController.php:123
 * @route '/clients/{id}'
 */
export const show = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/clients/{id}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Client\ClientsController::show
 * @see app/Http/Controllers/Client/ClientsController.php:123
 * @route '/clients/{id}'
 */
show.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return show.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Client\ClientsController::show
 * @see app/Http/Controllers/Client/ClientsController.php:123
 * @route '/clients/{id}'
 */
show.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Client\ClientsController::show
 * @see app/Http/Controllers/Client/ClientsController.php:123
 * @route '/clients/{id}'
 */
show.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Client\ClientsController::show
 * @see app/Http/Controllers/Client/ClientsController.php:123
 * @route '/clients/{id}'
 */
    const showForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: show.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Client\ClientsController::show
 * @see app/Http/Controllers/Client/ClientsController.php:123
 * @route '/clients/{id}'
 */
        showForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Client\ClientsController::show
 * @see app/Http/Controllers/Client/ClientsController.php:123
 * @route '/clients/{id}'
 */
        showForm.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: show.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    show.form = showForm
/**
* @see \App\Http\Controllers\Client\ClientsController::edit
 * @see app/Http/Controllers/Client/ClientsController.php:371
 * @route '/clients/{id}/edit'
 */
export const edit = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/clients/{id}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Client\ClientsController::edit
 * @see app/Http/Controllers/Client/ClientsController.php:371
 * @route '/clients/{id}/edit'
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
* @see \App\Http\Controllers\Client\ClientsController::edit
 * @see app/Http/Controllers/Client/ClientsController.php:371
 * @route '/clients/{id}/edit'
 */
edit.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Client\ClientsController::edit
 * @see app/Http/Controllers/Client/ClientsController.php:371
 * @route '/clients/{id}/edit'
 */
edit.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Client\ClientsController::edit
 * @see app/Http/Controllers/Client/ClientsController.php:371
 * @route '/clients/{id}/edit'
 */
    const editForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: edit.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Client\ClientsController::edit
 * @see app/Http/Controllers/Client/ClientsController.php:371
 * @route '/clients/{id}/edit'
 */
        editForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: edit.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Client\ClientsController::edit
 * @see app/Http/Controllers/Client/ClientsController.php:371
 * @route '/clients/{id}/edit'
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
* @see \App\Http\Controllers\Client\ClientsController::emailLogs
 * @see app/Http/Controllers/Client/ClientsController.php:247
 * @route '/clients/{id}/email-logs'
 */
export const emailLogs = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: emailLogs.url(args, options),
    method: 'get',
})

emailLogs.definition = {
    methods: ["get","head"],
    url: '/clients/{id}/email-logs',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Client\ClientsController::emailLogs
 * @see app/Http/Controllers/Client/ClientsController.php:247
 * @route '/clients/{id}/email-logs'
 */
emailLogs.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return emailLogs.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Client\ClientsController::emailLogs
 * @see app/Http/Controllers/Client/ClientsController.php:247
 * @route '/clients/{id}/email-logs'
 */
emailLogs.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: emailLogs.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Client\ClientsController::emailLogs
 * @see app/Http/Controllers/Client/ClientsController.php:247
 * @route '/clients/{id}/email-logs'
 */
emailLogs.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: emailLogs.url(args, options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\Client\ClientsController::emailLogs
 * @see app/Http/Controllers/Client/ClientsController.php:247
 * @route '/clients/{id}/email-logs'
 */
    const emailLogsForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: emailLogs.url(args, options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Client\ClientsController::emailLogs
 * @see app/Http/Controllers/Client/ClientsController.php:247
 * @route '/clients/{id}/email-logs'
 */
        emailLogsForm.get = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: emailLogs.url(args, options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Client\ClientsController::emailLogs
 * @see app/Http/Controllers/Client/ClientsController.php:247
 * @route '/clients/{id}/email-logs'
 */
        emailLogsForm.head = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: emailLogs.url(args, {
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    emailLogs.form = emailLogsForm
/**
* @see \App\Http\Controllers\Client\ClientsController::update
 * @see app/Http/Controllers/Client/ClientsController.php:432
 * @route '/clients/{id}'
 */
export const update = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/clients/{id}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Client\ClientsController::update
 * @see app/Http/Controllers/Client/ClientsController.php:432
 * @route '/clients/{id}'
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
* @see \App\Http\Controllers\Client\ClientsController::update
 * @see app/Http/Controllers/Client/ClientsController.php:432
 * @route '/clients/{id}'
 */
update.put = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

    /**
* @see \App\Http\Controllers\Client\ClientsController::update
 * @see app/Http/Controllers/Client/ClientsController.php:432
 * @route '/clients/{id}'
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
* @see \App\Http\Controllers\Client\ClientsController::update
 * @see app/Http/Controllers/Client/ClientsController.php:432
 * @route '/clients/{id}'
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
* @see \App\Http\Controllers\Client\ClientsController::resetPassword
 * @see app/Http/Controllers/Client/ClientsController.php:481
 * @route '/clients/{id}/reset-password'
 */
export const resetPassword = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: resetPassword.url(args, options),
    method: 'post',
})

resetPassword.definition = {
    methods: ["post"],
    url: '/clients/{id}/reset-password',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Client\ClientsController::resetPassword
 * @see app/Http/Controllers/Client/ClientsController.php:481
 * @route '/clients/{id}/reset-password'
 */
resetPassword.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return resetPassword.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Client\ClientsController::resetPassword
 * @see app/Http/Controllers/Client/ClientsController.php:481
 * @route '/clients/{id}/reset-password'
 */
resetPassword.post = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: resetPassword.url(args, options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\Client\ClientsController::resetPassword
 * @see app/Http/Controllers/Client/ClientsController.php:481
 * @route '/clients/{id}/reset-password'
 */
    const resetPasswordForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: resetPassword.url(args, options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Client\ClientsController::resetPassword
 * @see app/Http/Controllers/Client/ClientsController.php:481
 * @route '/clients/{id}/reset-password'
 */
        resetPasswordForm.post = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: resetPassword.url(args, options),
            method: 'post',
        })
    
    resetPassword.form = resetPasswordForm
const clients = {
    index: Object.assign(index, index),
show: Object.assign(show, show),
edit: Object.assign(edit, edit),
emailLogs: Object.assign(emailLogs, emailLogs),
update: Object.assign(update, update),
resetPassword: Object.assign(resetPassword, resetPassword),
}

export default clients