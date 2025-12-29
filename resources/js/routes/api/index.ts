import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../wayfinder'
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
const api = {
    templateVariables: Object.assign(templateVariables, templateVariables),
}

export default api