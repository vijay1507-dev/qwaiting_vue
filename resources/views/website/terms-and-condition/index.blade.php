@extends('website.layout.website')

@section('title', 'Terms and Conditions | Qwaiting')
@section('meta_description', 'Qwaiting offers a customer service management software platform provided as a service. Read our Terms of Service.')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-40 pb-12 lg:pt-48 lg:pb-20 bg-gradient-to-br from-slate-50 via-white to-blue-50">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 -left-40 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
                Terms & <span
                    class="bg-gradient-to-r from-primary via-blue-600 to-purple-600 bg-clip-text text-transparent">Conditions</span>
            </h1>
            <p class="text-lg lg:text-xl text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed">
                Welcome to Qwaiting's Terms and Conditions page. This document details the terms of use and conditions that are applicable when you access, use, or interact with our website, products, and services. It is crucial that you read and understand the following information carefully.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="py-16 lg:py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-gray-600 space-y-16">

                <!-- Introduction -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 border-l-4 border-primary pl-4">Introduction</h2>
                    <p class="leading-relaxed mb-4">
                        Qwaiting offers a customer service management software platform provided as a service, allowing
                        users to manage waiting lines and walk-in appointments at physical locations effectively. This
                        service is accessible through the Qwaiting App and online at <a href="https://qwaiting.com/"
                            class="text-primary hover:underline">https://qwaiting.com/</a>
                    </p>
                    <p class="leading-relaxed">
                        These Terms of Service outline the conditions under which you are permitted to utilize the Qwaiting
                        Service, including any applications or features provided by Qwaiting through the service, whether on
                        a trial or paid subscription basis. By signing up for a subscription form, you acknowledge and agree
                        to comply with these Terms of Service.
                    </p>
                </div>

                <!-- Commencement and Duration -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 border-l-4 border-primary pl-4">Commencement and Duration</h2>
                    <p class="leading-relaxed mb-4">
                        The agreement will start when the client agrees to the terms of service and signs a subscription form, and it will continue until the trial or paid subscription period ends unless it is ended earlier according to clause 19 or clause 4.3.
                    </p>
                </div>

                <!-- Trial and Subscription -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Trial and Subscription</h2>
                    <div class="grid gap-8">
                        <!-- Free Trial -->
                        <div class="bg-blue-50/50 rounded-2xl p-8 border border-blue-100">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <span class="p-2 bg-blue-100 rounded-lg text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Free Trial/Demo
                            </h3>
                            <p class="mb-4">
                                Qwaiting offers a free trial of the Qwaiting Service, which starts on the Service Start Date
                                and will end at the Last Date of the Trial Period unless terminated earlier according to
                                clause 4.3 or clause 19. The client needs Qwaiting's prior consent to use the Qwaiting
                                Service for more than one Trial Period.
                            </p>
                        </div>

                        <!-- Subscription -->
                        <div class="bg-purple-50/50 rounded-2xl p-8 border border-purple-100">
                            <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                                <span class="p-2 bg-purple-100 rounded-lg text-purple-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Subscription
                            </h3>
                            <p class="mb-4">
                                If the customer purchases a paid subscription to access and uses the Qwaiting Services, the
                                Paid Subscription will start on the relevant Service Start Date and, unless terminated
                                earlier as per clause 19, will continue for an Initial Subscription Period.
                            </p>
                            <p class="mb-4">
                                The Paid Subscription will automatically renew for an additional Initial Subscription Period
                                (referred to as an "Extended Subscription Period") at the end of the Initial Subscription
                                Period and the end of each subsequent Extended Subscription Period, unless:
                            </p>
                            <ul class="space-y-3">
                                <li class="flex items-start gap-3">
                                    <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-purple-500 flex-shrink-0"></span>
                                    <span>Either party gives written notice to the other party to end the Paid Subscription
                                        at the end of the Initial Subscription Period or Extended Subscription Period. This
                                        notice must be given no later than one (1) day before the expiry of the Initial
                                        Subscription Period or the then-current Extended Subscription Period.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-purple-500 flex-shrink-0"></span>
                                    <span>There are no outstanding Service Fees or other amounts at that time.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Access & Changes Group -->
                <div class="grid md:grid-cols-1 gap-8">
                    <!-- Access -->
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-green-500 pl-4">Access to the
                            Qwaiting Service</h2>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Qwaiting grants the Client a non-exclusive, non-transferable license to access and use
                                    the Qwaiting Service during the Trial Period or Subscription Period, in line with the
                                    Agreement.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>The Client may not sublicense the rights granted, except to allow Authorized Users
                                    access to the Qwaiting Service.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>The Client must ensure that all Authorized Users are aware of the Agreement's terms
                                    and comply with them and that Qwaiting is not liable to the Authorized Users.</span>
                            </li>
                        </ul>
                        <div class="mt-6 space-y-3 pl-8 border-l border-green-100">
                            <p>- The Client is solely responsible for maintaining the confidentiality of its login details
                                and other activities within Client Accounts, including all activities of Authorized Users.
                            </p>
                            <p>- Qwaiting encourages the use of "strong" passwords to prevent unauthorized access to the
                                Qwaiting Service.</p>
                            <p>- The Client must notify Qwaiting of any unauthorized access or use as soon as possible. If
                                any login details are compromised, the Client shall notify Qwaiting at <a
                                    href="mailto:info@qwaiting.com"
                                    class="text-primary hover:underline">info@qwaiting.com</a> and disable the relevant
                                Client Account.</p>
                            <p>- The Client is prohibited from accepting any commission or payment for granting access to
                                the Qwaiting Service to Authorized Users, whether during or after the Trial Period or
                                Subscription Period.</p>
                        </div>
                    </div>

                    <!-- Changes -->
                    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-orange-500 pl-4">Changes to the
                            Service Plan</h2>
                        <p class="mb-4">If the client wants to switch to another service plan, they must submit the
                            requested change in writing to Qwaiting (a "Change Request").</p>
                        <p class="mb-4">Upon receiving the change request, Qwaiting will, in a reasonable time, give the
                            client a written estimate of:</p>
                        <ul class="space-y-2 list-disc pl-5">
                            <li>the time needed to implement the change;</li>
                            <li>the effect the proposed changes would have on the service fees, and any other extra costs
                                the client needs to pay to implement the change.</li>
                        </ul>
                    </div>
                </div>

                <!-- Qwaiting Apps -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-indigo-500 pl-4">Qwaiting Apps</h2>
                    <p class="leading-relaxed">
                        Qwaiting gives client permission to download and use their apps on their devices. This permission is
                        limited and cannot be transferred to others. The client is allowed to let authorized users and
                        customers use the apps, but they cannot give the rights to anyone else. Also, Qwaiting may provide
                        updates for the apps, and the client is required to install these updates on their devices when
                        notified.
                    </p>
                </div>

                <!-- Client's Obligations -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-red-500 pl-4">Client’s Obligations
                    </h2>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-2 h-2 rounded-full bg-red-400 flex-shrink-0"></span>
                            <span>The client needs to follow all applicable laws and regulations when using the Qwaiting
                                Service and during its activities under the Agreement.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-2 h-2 rounded-full bg-red-400 flex-shrink-0"></span>
                            <span>They are responsible for ensuring that authorized users use the Qwaiting Service and Apps
                                in accordance with the terms of the Agreement.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-2 h-2 rounded-full bg-red-400 flex-shrink-0"></span>
                            <span>The client must also take responsibility for any actions and oversights related to the use
                                of the Qwaiting Service by its authorized users. If an authorized user terminates their
                                employment or relationship with the client, the client must terminate that user's access to
                                the Qwaiting Service.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-2 h-2 rounded-full bg-red-400 flex-shrink-0"></span>
                            <span>The client must notify Qwaiting in writing of any changes to their contact details as
                                specified in the Subscription Form.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-2 h-2 rounded-full bg-red-400 flex-shrink-0"></span>
                            <span>The client must ensure that their network and systems, including their internet browser
                                and operating systems, comply with any relevant specifications provided by Qwaiting in
                                writing.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-2 h-2 rounded-full bg-red-400 flex-shrink-0"></span>
                            <span>They are solely responsible for obtaining and maintaining their network connections and
                                telecommunications links from their systems in order to access and use the Qwaiting
                                Service.</span>
                        </li>
                    </ul>
                </div>

                <!-- Intellectual Property Rights -->
                <div class="bg-gradient-to-r from-gray-50 to-white rounded-2xl p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-gray-800 pl-4">Intellectual Property
                        Rights (Legal Rights)</h2>
                    <p class="mb-6">
                        Qwaiting owns all intellectual property rights in the Qwaiting Service and these works are protected
                        by copyright and other laws and treaties. All rights are reserved. The Client is not granted any
                        rights or licenses in respect of the Qwaiting Service, except as expressly set out in the Agreement.
                    </p>
                    <p class="font-semibold mb-4">When using the Qwaiting Service or Apps, the Client will not:</p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gray-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <span>try to copy, modify, duplicate, create derivative works from, republish, download, or
                                distribute any part of the Qwaiting Service or Apps in any form or media or by any
                                means;</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gray-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <span>access any part of the Qwaiting Service or Apps to build a product or service that
                                competes with the Qwaiting Service;</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gray-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <span>delete or remove any proprietary or intellectual property notice contained in the Qwaiting
                                Service or Apps.</span>
                        </li>
                    </ul>
                </div>

                <!-- Fees and Payment -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-yellow-500 pl-4">Fees and Payment
                    </h2>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-yellow-500 flex-shrink-0"></span>
                            <span>The Client must pay Qwaiting the service fees in advance for the Initial Subscription
                                Period before the service starts. For each subsequent Extended Subscription Period, the
                                Client also needs to pay the service fees in advance.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-yellow-500 flex-shrink-0"></span>
                            <span>The Client will provide their bank details and any other requested information to
                                Qwaiting. Qwaiting is authorized to debit the service fees from the Client's bank account on
                                specific dates.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-yellow-500 flex-shrink-0"></span>
                            <span>If the Client adds new locations, they will be charged additional service fees.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-yellow-500 flex-shrink-0"></span>
                            <span>If the service fees are not paid on time, Qwaiting may suspend the Client's access to the
                                service.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-yellow-500 flex-shrink-0"></span>
                            <span>If payment is not made within 30 days, interest will accrue, and the Client will need to
                                reimburse Qwaiting for any incurred costs and expenses.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-yellow-500 flex-shrink-0"></span>
                            <span>All amounts are payable in US dollars, and any taxes are deducted from the payable
                                amount.</span>
                        </li>
                    </ul>
                </div>

                <!-- Availability and Support -->
                <div class="bg-teal-50/50 rounded-2xl p-8 border border-teal-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-teal-500 pl-4">Availability and
                        Support</h2>
                    <div class="space-y-4 text-gray-700">
                        <p>Qwaiting will try to ensure that the Qwaiting Service is available with a 99% uptime rate, except
                            for planned maintenance, for which 24 hours notice will be given, and unscheduled maintenance
                            during normal business hours or otherwise, for which Qwaiting will give the Client advance
                            notice.</p>
                        <p>Qwaiting also commits to responding to Client queries regarding technical issues within 34 hours
                            from receipt of a query, which should be sent by the Client to Qwaiting at: <a
                                href="mailto:info@qwaiting.com"
                                class="text-teal-600 font-semibold hover:underline">info@qwaiting.com</a> and providing
                            support during normal working hours.</p>
                        <p>However, the client is expected to provide necessary support to Qwaiting, including detailed
                            descriptions of issues and updates on the performance of the Qwaiting Service.</p>
                        <p>Qwaiting is not obligated to provide support or advice if the request is unrelated to the
                            service's functionalities, unlawful, in breach of the agreement, related to a failure to install
                            an update, or falls outside the scope of Qwaiting’s expertise.</p>
                    </div>
                </div>

                <!-- Suspension and Termination -->
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-red-600 pl-4">Suspension and
                        Termination</h2>
                    <p class="mb-8">We are not responsible to you or any third party if we terminate or suspend your account
                        or access to the services as per these terms and conditions.</p>

                    <div class="space-y-8">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">For Clients using a Free Trial:</h3>
                            <ul class="space-y-3 pl-4 border-l-2 border-red-100">
                                <li class="text-gray-600">If you violate the terms and conditions, we can stop your access
                                    to the services and your account. We will notify you of the activities that break the
                                    terms and conditions and give you 15 days to correct or stop those activities. If you
                                    don't do this, or if we find that the violation can't be fixed, your account will be
                                    terminated, and all related service data will be removed permanently.</li>
                                <li class="text-gray-600">You can delete your account before the free trial ends, but this
                                    will lead to the permanent removal of all related service data.</li>
                                <li class="text-gray-600">If you don't delete your account or modify it before or on the
                                    expiry of the free trial, we might terminate your account. We will keep any related
                                    service data for 6 months after the account is terminated, after which it will be
                                    removed permanently.</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Customers on a Service Plan:</h3>
                            <p class="mb-3">If you have a service plan, your account can be suspended or terminated for the
                                following reasons:</p>
                            <ul class="space-y-3 pl-4 border-l-2 border-red-100">
                                <li class="text-gray-600">- If you don't pay for the subscription or violate the terms and
                                    conditions, we can stop your access to the service or your account. We'll let you know
                                    what you did wrong and give you 15 days to fix it. If you don't, your account will be
                                    terminated. Some of your data will be kept for 14 days after termination.</li>
                                <li class="text-gray-600">- You can choose to stop your account at any time if you pay with
                                    a credit card. If you use other payment methods, you can request to stop your account by
                                    emailing info@qwaiting.com. Your data will be kept for 14 days after termination.</li>
                                <li class="text-gray-600">- If you don't renew your subscription, we may terminate your
                                    account. Some of your data will be kept for 6 months after termination.</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">If your Account is Terminated:</h3>
                            <ul class="space-y-3 pl-4 border-l-2 border-red-100">
                                <li class="text-gray-600">- We recommend that you save all your data before your account is
                                    terminated. Once your data is deleted, it cannot be recovered.</li>
                                <li class="text-gray-600">- You may need to pay any outstanding subscription costs when your
                                    account is terminated unless we agree otherwise.</li>
                                <li class="text-gray-600">- You might be eligible for a refund if you terminate your account
                                    due to a serious violation by us, provided you give us at least 30 days' notice.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Liability & Governing Law -->
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-gray-500 pl-4">Qwaiting’s
                            Liability</h2>
                        <p class="mb-4">Qwaiting will not be responsible for any loss arising from the Agreement in the
                            following categories: loss of profit, business opportunity, goodwill, revenue, turnover,
                            anticipated savings, wasted expenditure, data, or any special, indirect, or consequential damage
                            or loss, costs, or expenses.</p>
                        <p class="mb-4">However, Qwaiting's liability for death or personal injury caused by negligence, or
                            for fraud or fraudulent misrepresentation, is not excluded or limited.</p>
                        <p>Qwaiting's total liability under the Agreement will be limited to the Service Fees payable by the
                            Client in the 12 months before the event giving rise to the claim.</p>
                    </div>

                    <div class="bg-blue-50/50 rounded-2xl p-8 border border-blue-100">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 border-l-4 border-blue-500 pl-4">Governing Law</h2>
                        <p class="mb-4">These terms will be governed by the laws of the State of California, regardless of
                            any conflicting laws. By agreeing to these terms, you are also agreeing to have any disputes
                            related to the terms or your use of the service resolved in the federal and state courts of
                            California, specifically in San Francisco County.</p>
                        <p class="text-sm italic text-gray-500 mt-4">
                            I hope you have a clear understanding of the rules and guidelines that shape your experience
                            with Qwaiting. If you have any questions or concerns, please don't hesitate to reach out to our
                            support team via <a href="mailto:info@qwaiting.com"
                                class="text-primary hover:underline">info@qwaiting.com</a>.
                        </p>
                    </div>

            </div>
        </div>
</div>

<!-- Trusted By Section -->
        <div class="trusted-section">
            <h2>Trusted by 65K+ Businesses Worldwide</h2>
            <p>Join the industry leaders who trust Q-Waiting for their queue management</p>

            <div class="trusted-logos">
                <!-- Placeholder for logos using text/icons for now -->
                <div class="logo-item"> <img src="{{ asset('website/asset/images/daleel_alzowar.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/hospital_at_maayo.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/ministry_of_hajj_and_umrah.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/tatapwer_ddl.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/PSB.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/jtc.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/stuffd.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/a1-business.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/nus-logo.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/dhl-logo.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/wgs.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/HDT_taxi_logo.jpg" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore_Polytechnic_logo.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/skechers-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/healthway-medical.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Loreal.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Nirvana.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NTUC_FairPrice.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry_of_Education.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/msq-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MND-singapore.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/current-corporate-signature.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MOH.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cropped-BL.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/logo-dark.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/andy-cr-icon.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cortinawatch.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/subway.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/TianPo.jpg" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/grab.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Inland-Revenue-Authority.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry-of-Manpower.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NLB.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/ntuc-learning-hub.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Raffles-Medical-Group.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/service-SG.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/SIM-SOC.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore-Medical.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg" alt="">
                </div>
            </div>
        </div>
@endsection