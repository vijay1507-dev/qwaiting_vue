import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\website\SignupController::step
 * @see app/Http/Controllers/website/SignupController.php:136
 * @route '/signup/step{step}'
 */
export const step = (args: { step: string | number } | [step: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: step.url(args, options),
    method: 'post',
})

step.definition = {
    methods: ["post"],
    url: '/signup/step{step}',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\website\SignupController::step
 * @see app/Http/Controllers/website/SignupController.php:136
 * @route '/signup/step{step}'
 */
step.url = (args: { step: string | number } | [step: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { step: args }
    }

    
    if (Array.isArray(args)) {
        args = {
                    step: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        step: args.step,
                }

    return step.definition.url
            .replace('{step}', parsedArgs.step.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SignupController::step
 * @see app/Http/Controllers/website/SignupController.php:136
 * @route '/signup/step{step}'
 */
step.post = (args: { step: string | number } | [step: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: step.url(args, options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\website\SignupController::sendVerification
 * @see app/Http/Controllers/website/SignupController.php:431
 * @route '/signup/send-verification'
 */
export const sendVerification = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: sendVerification.url(options),
    method: 'post',
})

sendVerification.definition = {
    methods: ["post"],
    url: '/signup/send-verification',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\website\SignupController::sendVerification
 * @see app/Http/Controllers/website/SignupController.php:431
 * @route '/signup/send-verification'
 */
sendVerification.url = (options?: RouteQueryOptions) => {
    return sendVerification.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SignupController::sendVerification
 * @see app/Http/Controllers/website/SignupController.php:431
 * @route '/signup/send-verification'
 */
sendVerification.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: sendVerification.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\website\SignupController::verify
 * @see app/Http/Controllers/website/SignupController.php:535
 * @route '/signup/verify/{id}/{hash}'
 */
export const verify = (args: { id: string | number, hash: string | number } | [id: string | number, hash: string | number ], options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: verify.url(args, options),
    method: 'get',
})

verify.definition = {
    methods: ["get","head"],
    url: '/signup/verify/{id}/{hash}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\website\SignupController::verify
 * @see app/Http/Controllers/website/SignupController.php:535
 * @route '/signup/verify/{id}/{hash}'
 */
verify.url = (args: { id: string | number, hash: string | number } | [id: string | number, hash: string | number ], options?: RouteQueryOptions) => {
    if (Array.isArray(args)) {
        args = {
                    id: args[0],
                    hash: args[1],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        id: args.id,
                                hash: args.hash,
                }

    return verify.definition.url
            .replace('{id}', parsedArgs.id.toString())
            .replace('{hash}', parsedArgs.hash.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SignupController::verify
 * @see app/Http/Controllers/website/SignupController.php:535
 * @route '/signup/verify/{id}/{hash}'
 */
verify.get = (args: { id: string | number, hash: string | number } | [id: string | number, hash: string | number ], options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: verify.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\website\SignupController::verify
 * @see app/Http/Controllers/website/SignupController.php:535
 * @route '/signup/verify/{id}/{hash}'
 */
verify.head = (args: { id: string | number, hash: string | number } | [id: string | number, hash: string | number ], options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: verify.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\website\SignupController::verifyRedirect
 * @see app/Http/Controllers/website/SignupController.php:588
 * @route '/signup/verify-redirect'
 */
export const verifyRedirect = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: verifyRedirect.url(options),
    method: 'get',
})

verifyRedirect.definition = {
    methods: ["get","head"],
    url: '/signup/verify-redirect',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\website\SignupController::verifyRedirect
 * @see app/Http/Controllers/website/SignupController.php:588
 * @route '/signup/verify-redirect'
 */
verifyRedirect.url = (options?: RouteQueryOptions) => {
    return verifyRedirect.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SignupController::verifyRedirect
 * @see app/Http/Controllers/website/SignupController.php:588
 * @route '/signup/verify-redirect'
 */
verifyRedirect.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: verifyRedirect.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\website\SignupController::verifyRedirect
 * @see app/Http/Controllers/website/SignupController.php:588
 * @route '/signup/verify-redirect'
 */
verifyRedirect.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: verifyRedirect.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\website\SignupController::verifyEmailSent
 * @see app/Http/Controllers/website/SignupController.php:596
 * @route '/signup/verify-email-sent'
 */
export const verifyEmailSent = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: verifyEmailSent.url(options),
    method: 'get',
})

verifyEmailSent.definition = {
    methods: ["get","head"],
    url: '/signup/verify-email-sent',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\website\SignupController::verifyEmailSent
 * @see app/Http/Controllers/website/SignupController.php:596
 * @route '/signup/verify-email-sent'
 */
verifyEmailSent.url = (options?: RouteQueryOptions) => {
    return verifyEmailSent.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SignupController::verifyEmailSent
 * @see app/Http/Controllers/website/SignupController.php:596
 * @route '/signup/verify-email-sent'
 */
verifyEmailSent.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: verifyEmailSent.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\website\SignupController::verifyEmailSent
 * @see app/Http/Controllers/website/SignupController.php:596
 * @route '/signup/verify-email-sent'
 */
verifyEmailSent.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: verifyEmailSent.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\website\SignupController::resendVerification
 * @see app/Http/Controllers/website/SignupController.php:610
 * @route '/signup/resend-verification'
 */
export const resendVerification = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: resendVerification.url(options),
    method: 'post',
})

resendVerification.definition = {
    methods: ["post"],
    url: '/signup/resend-verification',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\website\SignupController::resendVerification
 * @see app/Http/Controllers/website/SignupController.php:610
 * @route '/signup/resend-verification'
 */
resendVerification.url = (options?: RouteQueryOptions) => {
    return resendVerification.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SignupController::resendVerification
 * @see app/Http/Controllers/website/SignupController.php:610
 * @route '/signup/resend-verification'
 */
resendVerification.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: resendVerification.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\website\SignupController::clearSession
 * @see app/Http/Controllers/website/SignupController.php:127
 * @route '/signup/clear-session'
 */
export const clearSession = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: clearSession.url(options),
    method: 'post',
})

clearSession.definition = {
    methods: ["post"],
    url: '/signup/clear-session',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\website\SignupController::clearSession
 * @see app/Http/Controllers/website/SignupController.php:127
 * @route '/signup/clear-session'
 */
clearSession.url = (options?: RouteQueryOptions) => {
    return clearSession.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\website\SignupController::clearSession
 * @see app/Http/Controllers/website/SignupController.php:127
 * @route '/signup/clear-session'
 */
clearSession.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: clearSession.url(options),
    method: 'post',
})
const signup = {
    step: Object.assign(step, step),
sendVerification: Object.assign(sendVerification, sendVerification),
verify: Object.assign(verify, verify),
verifyRedirect: Object.assign(verifyRedirect, verifyRedirect),
verifyEmailSent: Object.assign(verifyEmailSent, verifyEmailSent),
resendVerification: Object.assign(resendVerification, resendVerification),
clearSession: Object.assign(clearSession, clearSession),
}

export default signup