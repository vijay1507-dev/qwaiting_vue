import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../wayfinder'
import campaignsF10cdd from './campaigns'
import sequences883570 from './sequences'
import emailTemplates from './email-templates'
import workflowsC7a9dd from './workflows'
import systemTemplates from './system-templates'

export { default as systemTemplates } from './system-templates'
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
 * @see routes/web.php:55
 * @route '/marketing'
 */
    const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: index.url(options),
        method: 'get',
    })

            /**
 * @see routes/web.php:55
 * @route '/marketing'
 */
        indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: index.url(options),
            method: 'get',
        })
            /**
 * @see routes/web.php:55
 * @route '/marketing'
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
* @see \App\Http\Controllers\Marketing\MarketingController::campaigns
 * @see app/Http/Controllers/Marketing/MarketingController.php:76
 * @route '/marketing/campaigns'
 */
    const campaignsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: campaigns.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Marketing\MarketingController::campaigns
 * @see app/Http/Controllers/Marketing/MarketingController.php:76
 * @route '/marketing/campaigns'
 */
        campaignsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: campaigns.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Marketing\MarketingController::campaigns
 * @see app/Http/Controllers/Marketing/MarketingController.php:76
 * @route '/marketing/campaigns'
 */
        campaignsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: campaigns.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    campaigns.form = campaignsForm
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
* @see \App\Http\Controllers\Marketing\MarketingController::sequences
 * @see app/Http/Controllers/Marketing/MarketingController.php:184
 * @route '/marketing/sequences'
 */
    const sequencesForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: sequences.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Marketing\MarketingController::sequences
 * @see app/Http/Controllers/Marketing/MarketingController.php:184
 * @route '/marketing/sequences'
 */
        sequencesForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: sequences.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Marketing\MarketingController::sequences
 * @see app/Http/Controllers/Marketing/MarketingController.php:184
 * @route '/marketing/sequences'
 */
        sequencesForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: sequences.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    sequences.form = sequencesForm
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
* @see \App\Http\Controllers\Marketing\MarketingController::workflows
 * @see app/Http/Controllers/Marketing/MarketingController.php:226
 * @route '/marketing/workflows'
 */
    const workflowsForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: workflows.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Marketing\MarketingController::workflows
 * @see app/Http/Controllers/Marketing/MarketingController.php:226
 * @route '/marketing/workflows'
 */
        workflowsForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: workflows.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Marketing\MarketingController::workflows
 * @see app/Http/Controllers/Marketing/MarketingController.php:226
 * @route '/marketing/workflows'
 */
        workflowsForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: workflows.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    workflows.form = workflowsForm
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
* @see \App\Http\Controllers\Marketing\MarketingController::tracking
 * @see app/Http/Controllers/Marketing/MarketingController.php:303
 * @route '/marketing/tracking'
 */
    const trackingForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
        action: tracking.url(options),
        method: 'get',
    })

            /**
* @see \App\Http\Controllers\Marketing\MarketingController::tracking
 * @see app/Http/Controllers/Marketing/MarketingController.php:303
 * @route '/marketing/tracking'
 */
        trackingForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: tracking.url(options),
            method: 'get',
        })
            /**
* @see \App\Http\Controllers\Marketing\MarketingController::tracking
 * @see app/Http/Controllers/Marketing/MarketingController.php:303
 * @route '/marketing/tracking'
 */
        trackingForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
            action: tracking.url({
                        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
                            _method: 'HEAD',
                            ...(options?.query ?? options?.mergeQuery ?? {}),
                        }
                    }),
            method: 'get',
        })
    
    tracking.form = trackingForm
const marketing = {
    index: Object.assign(index, index),
campaigns: Object.assign(campaigns, campaignsF10cdd),
sequences: Object.assign(sequences, sequences883570),
emailTemplates: Object.assign(emailTemplates, emailTemplates),
workflows: Object.assign(workflows, workflowsC7a9dd),
tracking: Object.assign(tracking, tracking),
systemTemplates: Object.assign(systemTemplates, systemTemplates),
}

export default marketing