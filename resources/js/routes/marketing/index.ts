import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../wayfinder'
import campaignsF10cdd from './campaigns'
import sequences883570 from './sequences'
import emailTemplates from './email-templates'
import workflowsC7a9dd from './workflows'
import systemTemplatesF10cdd from './system-templates'
/**
 * @see routes/web.php:55
 * @route '/marketing'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/marketing',
} satisfies RouteDefinition<["get","head"]>

/**
 * @see routes/web.php:55
 * @route '/marketing'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
 * @see routes/web.php:55
 * @route '/marketing'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
 * @see routes/web.php:55
 * @route '/marketing'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::campaigns
 * @see app/Http/Controllers/Marketing/MarketingController.php:76
 * @route '/marketing/campaigns'
 */
export const campaigns = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: campaigns.url(options),
    method: 'get',
})

campaigns.definition = {
    methods: ["get","head"],
    url: '/marketing/campaigns',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::campaigns
 * @see app/Http/Controllers/Marketing/MarketingController.php:76
 * @route '/marketing/campaigns'
 */
campaigns.url = (options?: RouteQueryOptions) => {
    return campaigns.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::campaigns
 * @see app/Http/Controllers/Marketing/MarketingController.php:76
 * @route '/marketing/campaigns'
 */
campaigns.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: campaigns.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\MarketingController::campaigns
 * @see app/Http/Controllers/Marketing/MarketingController.php:76
 * @route '/marketing/campaigns'
 */
campaigns.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: campaigns.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::sequences
 * @see app/Http/Controllers/Marketing/MarketingController.php:184
 * @route '/marketing/sequences'
 */
export const sequences = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: sequences.url(options),
    method: 'get',
})

sequences.definition = {
    methods: ["get","head"],
    url: '/marketing/sequences',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::sequences
 * @see app/Http/Controllers/Marketing/MarketingController.php:184
 * @route '/marketing/sequences'
 */
sequences.url = (options?: RouteQueryOptions) => {
    return sequences.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::sequences
 * @see app/Http/Controllers/Marketing/MarketingController.php:184
 * @route '/marketing/sequences'
 */
sequences.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: sequences.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\MarketingController::sequences
 * @see app/Http/Controllers/Marketing/MarketingController.php:184
 * @route '/marketing/sequences'
 */
sequences.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: sequences.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::workflows
 * @see app/Http/Controllers/Marketing/MarketingController.php:226
 * @route '/marketing/workflows'
 */
export const workflows = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: workflows.url(options),
    method: 'get',
})

workflows.definition = {
    methods: ["get","head"],
    url: '/marketing/workflows',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::workflows
 * @see app/Http/Controllers/Marketing/MarketingController.php:226
 * @route '/marketing/workflows'
 */
workflows.url = (options?: RouteQueryOptions) => {
    return workflows.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::workflows
 * @see app/Http/Controllers/Marketing/MarketingController.php:226
 * @route '/marketing/workflows'
 */
workflows.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: workflows.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\MarketingController::workflows
 * @see app/Http/Controllers/Marketing/MarketingController.php:226
 * @route '/marketing/workflows'
 */
workflows.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: workflows.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Marketing\MarketingController::tracking
 * @see app/Http/Controllers/Marketing/MarketingController.php:303
 * @route '/marketing/tracking'
 */
export const tracking = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: tracking.url(options),
    method: 'get',
})

tracking.definition = {
    methods: ["get","head"],
    url: '/marketing/tracking',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\MarketingController::tracking
 * @see app/Http/Controllers/Marketing/MarketingController.php:303
 * @route '/marketing/tracking'
 */
tracking.url = (options?: RouteQueryOptions) => {
    return tracking.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\MarketingController::tracking
 * @see app/Http/Controllers/Marketing/MarketingController.php:303
 * @route '/marketing/tracking'
 */
tracking.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: tracking.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\MarketingController::tracking
 * @see app/Http/Controllers/Marketing/MarketingController.php:303
 * @route '/marketing/tracking'
 */
tracking.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: tracking.url(options),
    method: 'head',
})
/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
export const systemTemplates = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: systemTemplates.url(options),
    method: 'get',
})

systemTemplates.definition = {
    methods: ["get","head"],
    url: '/marketing/system-templates',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
systemTemplates.url = (options?: RouteQueryOptions) => {
    return systemTemplates.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http/Controllers/Marketing/SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
systemTemplates.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: systemTemplates.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Marketing\SystemTemplateController::index
 * @see app/Http\Controllers\Marketing\SystemTemplateController.php:18
 * @route '/marketing/system-templates'
 */
systemTemplates.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: systemTemplates.url(options),
    method: 'head',
})
const marketing = {
    index: Object.assign(index, index),
campaigns: Object.assign(campaigns, campaignsF10cdd),
sequences: Object.assign(sequences, sequences883570),
emailTemplates: Object.assign(emailTemplates, emailTemplates),
workflows: Object.assign(workflows, workflowsC7a9dd),
tracking: Object.assign(tracking, tracking),
systemTemplates: Object.assign(systemTemplates, systemTemplatesF10cdd),
}

export default marketing