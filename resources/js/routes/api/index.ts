import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
/**
* @see \App\Http\Controllers\TemplateVariableController::templateVariables
 * @see app/Http/Controllers/TemplateVariableController.php:38
 * @route '/api/template-variables'
 */
export const templateVariables = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: templateVariables.url(options),
    method: 'get',
})

templateVariables.definition = {
    methods: ["get","head"],
    url: '/api/template-variables',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\TemplateVariableController::templateVariables
 * @see app/Http/Controllers/TemplateVariableController.php:38
 * @route '/api/template-variables'
 */
templateVariables.url = (options?: RouteQueryOptions) => {
    return templateVariables.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\TemplateVariableController::templateVariables
 * @see app/Http/Controllers/TemplateVariableController.php:38
 * @route '/api/template-variables'
 */
templateVariables.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: templateVariables.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\TemplateVariableController::templateVariables
 * @see app/Http/Controllers/TemplateVariableController.php:38
 * @route '/api/template-variables'
 */
templateVariables.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: templateVariables.url(options),
    method: 'head',
})

    /**
* @see \App\Http\Controllers\TemplateVariableController::templateVariables
 * @see app/Http/Controllers/TemplateVariableController.php:38
 * @route '/api/template-variables'
 */
    const templateVariablesForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: templateVariables.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\TemplateVariableController::templateVariables
 * @see app/Http/Controllers/TemplateVariableController.php:38
 * @route '/api/template-variables'
 */
        templateVariablesForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: templateVariables.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\TemplateVariableController::templateVariables
 * @see app/Http/Controllers/TemplateVariableController.php:38
 * @route '/api/template-variables'
 */
        templateVariablesForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: templateVariables.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    templateVariables.form = templateVariablesForm
const api = {
    templateVariables: Object.assign(templateVariables, templateVariables),
}

export default api