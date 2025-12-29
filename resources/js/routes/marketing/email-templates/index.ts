import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Marketing\MarketingController::test
 * @see app/Http/Controllers/Marketing/MarketingController.php:458
 * @route '/marketing/email-templates/{id}/test'
 */
export const test = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: test.url(args, options),
    method: 'post',
})

test.definition = {
    methods: ["post"],
    url: '/marketing/email-templates/{id}/test',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::test
 * @see app/Http/Controllers/Marketing/MarketingController.php:458
 * @route '/marketing/email-templates/{id}/test'
 */
test.url = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions) => {
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

    return test.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::test
 * @see app/Http/Controllers/Marketing/MarketingController.php:458
 * @route '/marketing/email-templates/{id}/test'
 */
test.post = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: test.url(args, options),
    method: 'post',
})

    /**
* @see \App\Http\Controllers\Marketing\MarketingController::test
 * @see app/Http/Controllers/Marketing/MarketingController.php:458
 * @route '/marketing/email-templates/{id}/test'
 */
    const testForm = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
        action: test.url(args, options),
        method: 'post',
    })

            /**
* @see \App\Http\Controllers\Marketing\MarketingController::test
 * @see app/Http/Controllers/Marketing/MarketingController.php:458
 * @route '/marketing/email-templates/{id}/test'
 */
        testForm.post = (args: { id: string | number } | [id: string | number ] | string | number, options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
            action: test.url(args, options),
            method: 'post',
        })
    
    test.form = testForm
const emailTemplates = {
    test: Object.assign(test, test),
}

export default emailTemplates