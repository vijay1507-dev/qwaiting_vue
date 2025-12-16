@extends('website.layout.website')

@section('title', 'Privacy Policy | Qwaiting')
@section('meta_description', 'Read our Privacy Policy describing our policies on collection, use, and protection of your personal data.')

@section('content')
    <!-- Hero Section -->
    <section
        class="relative pt-32 pb-12 lg:pt-40 lg:pb-20 overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 -left-40 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight text-gray-900 mb-6 leading-tight">
                Privacy <span
                    class="bg-gradient-to-r from-primary via-blue-600 to-purple-600 bg-clip-text text-transparent">Policy</span>
            </h1>
            <p class="text-lg lg:text-xl text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed">
                Qwaiting collectively is dedicated to safeguarding your privacy. This privacy notice explains how Qwaiting
                uses and saves your personal data in its database.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 lg:py-24 bg-white relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none text-gray-600">

                <div class="mb-12">
                    <p class="leading-relaxed mb-6">
                        Qwaiting's terms and conditions determine what Personal Data is gathered and for what purposes we
                        use it. It also outlines your options for using, getting access to, and making changes to your
                        personal data.
                    </p>
                </div>

                <!-- Contact Section -->
                <div class="grid md:grid-cols-2 gap-8 mb-16">
                    <div
                        class="bg-gray-50 rounded-2xl p-8 border border-gray-100 hover:shadow-lg transition-all duration-300">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Contact Us For Any Queries</h3>
                        <p class="text-gray-600 leading-relaxed">
                            You can get in touch with <a href="mailto:info@qwaiting.com"
                                class="text-primary font-semibold hover:underline">info@qwaiting.com</a> if you have any
                            inquiries about the website's content, privacy policy, or any terms and conditions.
                        </p>
                    </div>

                    <div
                        class="bg-gray-50 rounded-2xl p-8 border border-gray-100 hover:shadow-lg transition-all duration-300">
                        <div
                            class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Personal Data That Qwaiting Collects</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Qwaiting understands the value of safeguarding the privacy of any information we gather from
                            you. This policy serves to inform you of how Qwaiting handles any personal data about you
                            obtained from our website, interaction with our content, or other sources. Our privacy policies
                            are in compliance with GDPR, and we promise to treat any personal information you submit to us
                            with the utmost care.
                        </p>
                    </div>
                </div>

                <!-- Cookies Section -->
                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-primary pl-4">Information Collected
                        With the Cookies</h2>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-4">
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>IP-address</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>Your browser and device type</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>The URL, if any, of the page you were on that directed you to the Qwaiting website, or
                                    the search terms, if any, you used to find our website</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>Analysis of data you send or receive online through a website feature</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>Web page response time</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>Duration of visits to specific pages</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>Download mistakes</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>Information about page interaction like clicks, scrolling, etc.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="bg-green-100 text-green-600 rounded-full p-1 mt-1 flex-shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span>Ways you used to abandon the web page</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-blue-500 pl-4">How Qwaiting Use Data
                        Collected Via Cookies?</h2>
                    <div class="bg-blue-50/50 rounded-2xl p-8 border border-blue-100">
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span class="text-blue-500 mt-1 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-700">Session cookies to track users' preferences.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-blue-500 mt-1 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-700">Enhancing and tailoring your website experience to your
                                    particular browser and device type.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-blue-500 mt-1 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-700">Analysis of the website's usage by its users to enhance user
                                    experience with customized data.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-blue-500 mt-1 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <span class="text-gray-700">Modifying the material to reflect the website users' search
                                    phrases and browsing behavior.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-purple-500 pl-4">Information
                        Collected From Online Forums, Newsletters, or Registration Forms</h2>
                    <div class="prose prose-lg text-gray-600 mb-6">
                        <p>You should be aware that any information you enter into any publicly accessible community forums
                            or blogs run by Qwaiting, as well as any forms you submit on our website, may be seen,
                            collected, and used by others. Additionally, we might gather:</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <span class="w-2 h-2 mt-2.5 rounded-full bg-purple-500 flex-shrink-0"></span>
                                <span>Company details such as its name, size, and industry.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-2 h-2 mt-2.5 rounded-full bg-purple-500 flex-shrink-0"></span>
                                <span>A brief biography of you that serves as proof that you are the post's author.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="w-2 h-2 mt-2.5 rounded-full bg-purple-500 flex-shrink-0"></span>
                                <span>Information that can be used to contact you, such as your name, phone number, address,
                                    or email. When you sign up for our emails, we may gather your email address so that we
                                    can send you our newsletters.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-orange-500 pl-4">Data We Collect on
                        the Website Via Events</h2>
                    <div class="bg-orange-50/50 rounded-2xl p-8 border border-orange-100">
                        <p class="mb-6">We may gather your contact information, including your name, email address, company
                            name, and position, whenever you participate in a Qwaiting event, including webinars or
                            seminars.</p>
                        <p class="mb-4 font-semibold text-gray-900">Under this Notice, Qwaiting will use such information,
                            including without restriction, to:</p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start gap-3">
                                <span class="text-orange-500 mt-1 flex-shrink-0">GET</span>
                                <span>Evaluate the needs of your company to regulate or recommend appropriate
                                    Services(s).</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-orange-500 mt-1 flex-shrink-0">GET</span>
                                <span>Send you marketing and promotional materials.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-orange-500 mt-1 flex-shrink-0">GET</span>
                                <span>Send you the details about the Service you requested.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-orange-500 mt-1 flex-shrink-0">GET</span>
                                <span>Answer your queries and address your worries.</span>
                            </li>
                        </ul>

                        <h3 class="text-xl font-bold text-gray-900 mb-4">Sharing of Your Personal Information</h3>
                        <p class="mb-4">Your personal information may also be shared in the following ways:</p>
                        <p class="mb-4">Qwaiting provides you with services through third-party integration. The
                            sub-processors are tasked with handling customer accounts and data as logically necessary to
                            provide the service(s). It will be addressed in their terms and conditions agreements in the
                            form of responsibilities.</p>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>For example, third-party payment processors who manage your credit card and other
                                    payment information for Qwaiting but who are not permitted to keep, use, or store that
                                    information.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Including websites, social media platforms, and third-party advertising
                                    networks.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>The right receivers incorporate these transfers in their service agreements, and we
                                    take the necessary precautions to ensure that your Data is protected under this Privacy
                                    Notice. On request, additional information will be provided.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-red-500 pl-4">Your General Rights
                    </h2>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
                        <p>You can "unsubscribe" receiving notifications and alerts for marketing communication from us
                            anytime you wish. If you want to entirely opt-out, please get in touch with us using the
                            information above.</p>
                        <p>Please get in touch at <a href="mailto:info@qwaiting.com"
                                class="text-primary font-semibold hover:underline">info@qwaiting.com</a> if you want us to
                            remove your information from our database. We will react in the shortest time possible.</p>
                        <p>Your comments, reviews, and testimonials may be published on our Qwaiting website and may include
                            your personal information. Before publishing any testimonials, we will get your permission.
                            Please email us at <a href="mailto:info@qwaiting.com"
                                class="text-primary font-semibold hover:underline">info@qwaiting.com</a> if you want to have
                            any queries or want your testimonial deleted.</p>
                    </div>
                </div>

                <div class="mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-gray-800 pl-4">Legal Notice</h2>
                    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                        <p class="mb-6">We manage the right to reveal any personal information contained in service data and
                            collected data following the law. It is a recognition of the rightful demands made by public
                            authorities, such as those related to addressing legal or security needs.</p>
                        <p class="mb-6">You should not send Qwaiting any private or proprietary information over our
                            website. Please be aware that Qwaiting will not consider any confidential information or
                            materials you send. You agree that Qwaiting is free to use any ideas, concepts, know-how, or
                            methods you offer us for any reason and grant Qwaiting an unrestricted, irrevocable license to
                            use, reproduce, display, perform, alter, transmit, and distribute any information or material
                            you send us.</p>
                        <p>The customer's account and service data may be one of the assets transferred if Qwaiting
                            undergoes corporate expansion, such as an acquisition, merger, or purchase by another company.
                            Any modifications will be disclosed in a more detailed notice on our website. <a
                                href="mailto:info@qwaiting.com"
                                class="text-primary font-semibold hover:underline">info@qwaiting.com</a> will send an email
                            with the notification.</p>
                    </div>
                </div>

                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8 border-l-4 border-primary pl-4">Amendments</h2>
                    <div class="bg-primary/5 rounded-2xl p-8 border border-primary/10">
                        <p class="leading-relaxed">
                            Any changes to this statement will be posted at this URL and will become effective there. If we
                            make any significant changes, we'll let you know by posting a comment on this website before the
                            change takes effect and, inform you via email if you're a Qwaiting customer. Given, if we alter
                            the notice to promptly perform inserts, deletions, or changes to the cookies to maintain the
                            record of cookies as current and legitimate, we won't notify you. It would be beneficial if you
                            frequently check this notice for updates. When we post any improvements, changes, or
                            modifications to this notice, you must continue using our service(s) or website, as usual, to
                            comply with the acceptance of this notice amendment.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection