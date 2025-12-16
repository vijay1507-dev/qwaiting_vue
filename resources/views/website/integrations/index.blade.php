@extends('website.layout.website')

@section('title', 'Integrations - Qwaiting')
@section('meta_description', 'Connect Qwaiting with CRMs, ERPs, payment systems, and other third-party tools to automate workflows and deliver seamless customer journeys.')

@section('content')


    <!-- Hero Section -->
    <section class="relative pt-32 pb-24 bg-gradient-to-br from-gray-50 via-white to-primary/5 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-block px-4 py-2 bg-primary/10 rounded-full mb-6 fade-in-up">
                    <span class="text-primary font-semibold text-sm">120+ Countries • 65,000+ Organizations</span>
                </div>

                <h1 class="text-5xl lg:text-6xl font-bold text-text-dark mb-6 fade-in-up delay-100">
                    Qwaiting Integrations<br />
                    <span class="text-primary">Made Easy</span>
                </h1>

                <p class="text-xl text-text-medium leading-relaxed mb-10 fade-in-up delay-200">
                    Connect your favorite tools to Qwaiting and boost productivity. Explore our most popular integrations
                    built to streamline service and simplify operations.
                </p>
            </div>
        </div>
    </section>

    <!-- Featured Integrations Grid -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-text-dark mb-4">Popular Integrations</h2>
                <p class="text-lg text-text-medium max-w-2xl mx-auto">
                    Seamlessly connect with the tools your team already uses every day
                </p>
            </div>

            <div class="py-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row gap-8 justify-center items-center">
                    <!-- Industries -->
                    <div class="flex flex-wrap gap-3 justify-center">
                        <span
                            class="text-sm font-bold text-gray-400 uppercase tracking-wider mr-2 self-center">Industries:</span>
                        <button data-filter="all" data-filter-type="industry"
                            class="filter-btn px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">All</button>
                        <button data-filter="finance" data-filter-type="industry"
                            class="filter-btn px-4 py-2 bg-gray-50 text-text-medium rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">Finance</button>
                        <button data-filter="healthcare" data-filter-type="industry"
                            class="filter-btn px-4 py-2 bg-gray-50 text-text-medium rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">Healthcare</button>
                        <button data-filter="public" data-filter-type="industry"
                            class="filter-btn px-4 py-2 bg-gray-50 text-text-medium rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">Public</button>
                        <button data-filter="retail" data-filter-type="industry"
                            class="filter-btn px-4 py-2 bg-gray-50 text-text-medium rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">Retail</button>
                    </div>

                    <div class="hidden md:block w-px h-8 bg-gray-200"></div>

                    <!-- Categories -->
                    <div class="flex flex-wrap gap-3 justify-center">
                        <span
                            class="text-sm font-bold text-gray-400 uppercase tracking-wider mr-2 self-center">Categories:</span>
                        <button data-filter="all" data-filter-type="category"
                            class="filter-btn px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">All</button>
                        <button data-filter="crm" data-filter-type="category"
                            class="filter-btn px-4 py-2 bg-gray-50 text-text-medium rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">CRM</button>
                        <button data-filter="his" data-filter-type="category"
                            class="filter-btn px-4 py-2 bg-gray-50 text-text-medium rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">HIS</button>
                        <button data-filter="messaging" data-filter-type="category"
                            class="filter-btn px-4 py-2 bg-gray-50 text-text-medium rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">Messaging</button>
                        <button data-filter="vfm" data-filter-type="category"
                            class="filter-btn px-4 py-2 bg-gray-50 text-text-medium rounded-lg text-sm font-semibold hover:bg-primary hover:text-white transition-all">VFM</button>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Office 365 -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="vfm" data-industry="public retail">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/office-365.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Office 365</h3>
                    <p class="text-md text-text-medium mb-4">Access Word, Excel, PowerPoint, Teams, and Outlook directly
                        through Qwaiting—no need for multiple logins.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-green/10 text-accent-green text-xs font-semibold rounded-full">VFM</span>
                </div>

                <!-- Salesforce -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="crm" data-industry="finance public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/Salesforce.com_logo.svg.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Salesforce</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integrates with Salesforce to automatically sync
                        ticket details as leads, streamlining your sales and customer management workflows.</p>
                    <span
                        class="inline-block px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full">CRM</span>
                </div>

                <!-- Microsoft Teams -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="vfm" data-industry="public retail">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/Microsoft_Office_Teams.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Microsoft Teams</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integrates with Microsoft Teams to automate virtual
                        meeting setup for bookings.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-green/10 text-accent-green text-xs font-semibold rounded-full">VFM</span>
                </div>

                <!-- Zoom -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="vfm" data-industry="public healthcare retail">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/zoom-logo.webp') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Zoom</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integrates with Zoom to automatically create virtual
                        meeting links for appointments. This streamlines video-based appointments and reduces scheduling
                        friction.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-green/10 text-accent-green text-xs font-semibold rounded-full">VFM</span>
                </div>

                <!-- WhatsApp -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/whatsApp_logo.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">WhatsApp</h3>
                    <p class="text-md text-text-medium mb-4">The integration of WhatsApp with Qwaiting enables you to send
                        customers digital tickets, giving them real-time wait times.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- Google Calendar -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="vfm" data-industry="public retail">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/png-transparent-google-calendar-logo-icon.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Google Calendar</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting includes a manual Google Calendar sync option for
                        customers. Each booking confirmation email contains a calendar icon that lets users add the
                        appointment to their personal Google Calendar with one click.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-green/10 text-accent-green text-xs font-semibold rounded-full">VFM</span>
                </div>

                <!-- Gmail -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="vfm" data-industry="public retail">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/Gmail.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Gmail</h3>
                    <p class="text-md text-text-medium mb-4">Google's email service lets you send and receive emails,
                        organize inboxes with labels and filters, and use web & mobile apps on numerous platforms.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-green/10 text-accent-green text-xs font-semibold rounded-full">VFM</span>
                </div>

                <!-- Slack -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="crm" data-industry="finance public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/slack.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Slack</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting's seamless integration with Slack enables a central
                        workspace where teams can talk, share files, and use third-party apps, enabling organizational
                        communication and collaboration.</p>
                    <span
                        class="inline-block px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full">CRM</span>
                </div>

                <!-- Okta -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="vfm" data-industry="public retail">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/okta.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Okta</h3>
                    <p class="text-md text-text-medium mb-4">Enable secure, seamless login with Qwaiting using Okta’s SSO
                        platform for centralized identity management</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-green/10 text-accent-green text-xs font-semibold rounded-full">VFM</span>
                </div>

                <!-- Jumpcloud -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="vfm" data-industry="public retail">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/jumpcloud.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Jumpcloud</h3>
                    <p class="text-md text-text-medium mb-4">Apply SSO and MFA across all SAML and OIDC apps to secure
                        access and simplify user authentication with Qwaiting.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-green/10 text-accent-green text-xs font-semibold rounded-full">VFM</span>
                </div>

                <!-- Google Authenticator -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="vfm" data-industry="public retail">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/google-authenticator.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Google Authenticator</h3>
                    <p class="text-md text-text-medium mb-4">Add an extra layer of protection to your Qwaiting account using
                        Google Authenticator’s time-based codes.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-green/10 text-accent-green text-xs font-semibold rounded-full">VFM</span>
                </div>

                <!-- Zendesk -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="crm" data-industry="finance public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/Zendesk_logo.svg.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Zendesk</h3>
                    <p class="text-md text-text-medium mb-4">Send Qwaiting leads directly into Salesforce for real-time CRM
                        updates and simplified sales tracking.</p>
                    <span
                        class="inline-block px-3 py-1 bg-primary/10 text-primary text-xs font-semibold rounded-full">CRM</span>
                </div>

                <!-- Sendquick -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/SendQuick-logo-.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Sendquick</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integrates with SendQuickASP to send automated SMS
                        notifications for bookings, ticket updates, and reminders.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- SMS API -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/SMSAPI.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">SMS API</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integrates with SMSAPI to enable real-time SMS
                        communication for appointment updates and ticket activity. With SMSAPI’s robust platform, Qwaiting
                        delivers fast and reliable messaging across multiple regions.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- Infobip -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/68747470733a2f2f7564657369676e6373732e636f6d2f77702d636f6e74656e742f75706c6f6164732f323032302f30312f496e666f6269702d6c6f676f2d7472616e73706172656e742e706e67.png') }}"
                            alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Infobip</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integrates with Infobip to enable virtual calling
                        features within your appointment and queue system.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- wassenger -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/wassenger.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Wassenger</h3>
                    <p class="text-md text-text-medium mb-4">Using the WhatsApp Business API, Qwaiting delivers
                        confirmations, cancellations, and reschedules directly to customers in a familiar messaging format.
                    </p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- Taqnyat -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/Taqnyat.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Taqnyat</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integrates with Taqnyat to manage SMS communication
                        across the Middle East region.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- Twilio -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/twilio.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Twilio</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integration enables the voice, messaging, and video
                        capabilities in the Twilio application.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- Kaleyra -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/Kaleyra.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Kaleyra</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting works with Kaleyra to help you engage with consumers
                        through customizable messaging, chatbots, and programmable audio services.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- One Way SMS -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/One-Way-SMS.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">One Way SMS</h3>
                    <p class="text-md text-text-medium mb-4">It allows you to send SMS to customers, making it quick and
                        effective to distribute vital information, marketing materials, updates, and notifications.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- One Way SMS -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="all">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/One-Way-SMS.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">One Way SMS</h3>
                    <p class="text-md text-text-medium mb-4">It allows you to send SMS to customers, making it quick and
                        effective to distribute vital information, marketing materials, updates, and notifications.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- Sinch -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/sinch.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Sinch</h3>
                    <p class="text-md text-text-medium mb-4">With Sinch integration, you can easily incorporate real-time
                        communication like voice and video chat.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- Unifonic -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="messaging" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/Unifonic.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Unifonic</h3>
                    <p class="text-md text-text-medium mb-4">Voice, SMS, and chat message integration can boost client
                        engagement. Qwaiting works with Unifonic's APIs and tools.</p>
                    <span
                        class="inline-block px-3 py-1 bg-accent-yellow/10 text-accent-yellow text-xs font-semibold rounded-full">Messaging</span>
                </div>

                <!-- Plato -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="his" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/plato.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Plato</h3>
                    <p class="text-md text-text-medium mb-4">Qwaiting integrates with Plato, enabling you to automate the
                        work of individuals at your medical practice.</p>
                    <span
                        class="inline-block px-3 py-1 bg-gray-100 text-text-dark text-xs font-semibold rounded-full">HIS</span>
                </div>

                <!-- Elite Plus -->
                <div class="integration-card bg-white p-8 rounded-2xl border border-gray-100 text-center group"
                    data-category="his" data-industry="healthcare public">
                    <div
                        class="w-40 h-40 mx-auto rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <img src="{{ asset('website/asset/images/elite-plus.png') }}" alt="">
                    </div>
                    <h3 class="font-bold text-xl text-text-dark mb-2">Elite Plus</h3>
                    <p class="text-md text-text-medium mb-4">Elite Plus is an Enterprise Clinical Information System with
                        seamless integration of Patient management information through Electronic Patient Records.</p>
                    <span
                        class="inline-block px-3 py-1 bg-gray-100 text-text-dark text-xs font-semibold rounded-full">HIS</span>
                </div>

            </div>
        </div>
    </section>

    <!-- Industry-Specific Integrations -->
    <section class="py-24 bg-[#F4F3FF]">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Heading -->
            <div class="text-center max-w-4xl mx-auto mb-16">
                <h3 class="text-primary font-semibold tracking-wide mb-3">Customer Stories</h3>
                <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 leading-snug">
                    Discover how users from around the world are utilizing Qwaiting to
                    improve customer experiences, streamline processes, and offer a
                    smooth customer journey
                </h2>
            </div>

            <!-- Logo Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-10">

                <!-- Item -->
                <div
                    class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                    <img src="https://qwaiting.com/frontimg/wgs.png" class="w-36 opacity-90 hover:opacity-100 transition"
                        alt="Wisma">
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                    <img src="https://qwaiting.com/frontimg/ram.png" class="w-36 opacity-90 hover:opacity-100 transition"
                        alt="RAM Clinics">
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                    <img src="https://qwaiting.com/frontimg/psb-ac.png" class="w-36 opacity-90 hover:opacity-100 transition"
                        alt="PSB">
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                    <img src="https://qwaiting.com/frontimg/nus-logo.png"
                        class="w-36 opacity-90 hover:opacity-100 transition" alt="NUS">
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                    <img src="https://qwaiting.com/frontimg/nirvana.png"
                        class="w-36 opacity-90 hover:opacity-100 transition" alt="Nirvana">
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                    <img src="https://qwaiting.com/frontimg/fair-price.png"
                        class="w-36 opacity-90 hover:opacity-100 transition" alt="FairPrice">
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                    <img src="https://qwaiting.com/frontimg/msq.png" class="w-36 opacity-90 hover:opacity-100 transition"
                        alt="Marina Square">
                </div>

                <div
                    class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                    <img src="https://qwaiting.com/frontimg/changi.png" class="w-36 opacity-90 hover:opacity-100 transition"
                        alt="Changi Airport">
                </div>

            </div>

            <!-- CTA Button -->
            <div class="text-center mt-16">
                <a href="/customer-stories"
                    class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-primary text-primary font-semibold text-lg hover:bg-primary hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                    All Customer Stories
                    <span class="text-xl">›</span>
                </a>
            </div>

        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-white mb-4">Client Testimonials</h2>
                <p class="text-lg text-white max-w-2xl mx-auto">
                    See What Our Customers Are Saying
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex text-accent-yellow mb-4">
                        ★★★★★
                    </div>
                    <p class="text-text-medium mb-6 italic">"I've used Qwaiting for my business and it's been a great
                        experience. It's helped me to save time and reduce my stress levels, while also improving the
                        customer experience. I would recommend it to anyone who wants to streamline their operations."</p>
                    <div class="flex items-center gap-4 justify-center">
                        <img src="https://qwaiting.com/images/mnd-singapore.png" alt="">
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex text-accent-yellow mb-4">
                        ★★★★★
                    </div>
                    <p class="text-text-medium mb-6 italic">"Qwaiting has made my life so much easier! It simplifies the
                        waiting process, saving time and reducing frustration. The overall experience is great and up to the
                        mark. Thanks to the team!"</p>
                    <div class="flex items-center gap-4 justify-center">
                        <img src="https://qwaiting.com/images/singtel.png" alt="">
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all">
                    <div class="flex text-accent-yellow mb-4">
                        ★★★★★
                    </div>
                    <p class="text-text-medium mb-6 italic">"Thanks to Rohit and his team for making this wonderful
                        software. Not only me but our customers also loved it. As they are able to join a virtual queue and
                        get updates on their wait time via text message."</p>
                    <div class="flex items-center gap-4 justify-center">
                        <img src="https://qwaiting.com/images/hdt.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const integrationCards = document.querySelectorAll('.integration-card');

            let activeIndustryFilter = 'all';
            let activeCategoryFilter = 'all';

            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const filterValue = this.getAttribute('data-filter');
                    const filterType = this.getAttribute('data-filter-type');

                    // Update active filter based on type
                    if (filterType === 'industry') {
                        activeIndustryFilter = filterValue;
                        // Update button states for industry filters
                        document.querySelectorAll('[data-filter-type="industry"]').forEach(btn => {
                            btn.classList.remove('bg-primary', 'text-white');
                            btn.classList.add('bg-gray-50', 'text-text-medium');
                        });
                    } else if (filterType === 'category') {
                        activeCategoryFilter = filterValue;
                        // Update button states for category filters
                        document.querySelectorAll('[data-filter-type="category"]').forEach(btn => {
                            btn.classList.remove('bg-primary', 'text-white');
                            btn.classList.add('bg-gray-50', 'text-text-medium');
                        });
                    }

                    // Highlight active button
                    this.classList.remove('bg-gray-50', 'text-text-medium');
                    this.classList.add('bg-primary', 'text-white');

                    // Filter cards
                    filterCards();
                });
            });

            function filterCards() {
                integrationCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    const cardIndustry = card.getAttribute('data-industry');

                    // Check if card matches both filters
                    const matchesCategory = activeCategoryFilter === 'all' || cardCategory === activeCategoryFilter;

                    // Support multiple industries (space-separated)
                    const cardIndustries = cardIndustry.split(' ');
                    const matchesIndustry = activeIndustryFilter === 'all' ||
                        cardIndustries.includes(activeIndustryFilter) ||
                        cardIndustries.includes('all');

                    if (matchesCategory && matchesIndustry) {
                        card.style.display = 'block';
                        // Add fade-in animation
                        card.style.opacity = '0';
                        setTimeout(() => {
                            card.style.transition = 'opacity 0.3s ease-in-out';
                            card.style.opacity = '1';
                        }, 10);
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        });
    </script>

@endsection