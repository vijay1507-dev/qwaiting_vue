@extends('website.layout.website')

@section('content')
    <div class="font-sans antialiased text-gray-900 bg-white selection:bg-indigo-100 selection:text-indigo-700">

        <!-- Hero Section -->
        <section class="relative pt-32 pb-12 overflow-hidden bg-gradient-to-b from-white to-gray-50 lg:pt-40 lg:pb-16">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
                <div
                    class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]">
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

                <!-- Title Section -->
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 rounded-full mb-6">
                        <span class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"></span>
                        <span class="text-sm font-semibold text-indigo-600">Public Sector Success Story</span>
                    </div>
                    <h1 class="mx-auto max-w-4xl text-2xl font-bold tracking-tight text-black sm:text-5xl mb-6">
                        Qwaiting offers intense and improved staff handling features to the <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">People's
                            Association</span>
                    </h1>
                </div>

                <!-- Featured Image -->
                <div class="max-w-5xl mx-auto mb-12">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <div class="aspect-[16/9] bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <img src="https://qwaiting.com/images/Wisma-Geylang-Serai.jpg" alt="People's Association"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/20 to-transparent"></div>
                    </div>
                </div>

                <!-- Introduction Text -->
                <div class="max-w-4xl mx-auto text-left space-y-6">
                    <p class="text-xl leading-8 text-gray-700">
                        <strong>People association launched on 1st July 1960.</strong>
                    </p>
                    <p class="text-xl leading-8 text-gray-700">
                        Singapore faced a tough time during the 1950s and early 60s due to the riots in distinct races and
                        political conflict. These circumstances gave rise to PA in 1960 to promote racial harmony. PA
                        initiated many programs and successfully aligned the majority of people with them. There are many
                        volunteers and full-time employees associated with them to contribute to social services. The PA has
                        just marked the completion of 60 years in the year 2022. Above all, PA offers scholarships to the
                        student who meets the eligibility criteria and works on providing education. Additionally, there are
                        many courses run by PA such as Piano classes, tennis classes, taekwondo, and many others to develop
                        skills in everybody irrespective of age or gender.
                    </p>
                </div>
            </div>

            <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                <div
                    class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]">
                </div>
            </div>
        </section>

        <!-- Client Overview Card -->
        <section class="py-20 bg-white">
            <div class="max-w-6xl mx-auto px-6 lg:p-8 shadow-xl rounded-3xl bg-gray-50">

                <!-- Overview Heading -->
                <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">Overview</h2>

                <!-- Paragraph -->
                <div class="mx-auto mb-16">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        People's Association is one of Singapore's oldest groups of people who are working in favor of the
                        citizens. They are promoting harmony and unity in the people of all races for 60 years. Many
                        volunteers are associated with PA to contribute to this social service.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <!-- Challenges -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Challenges
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Managing the people's flow and query</li>
                            <li>• Difficulty in the internal communication</li>
                            <li>• Track the ongoing activity of the staff</li>
                        </ul>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                            Solutions
                        </h3>

                        <ul class="space-y-3 text-gray-700 text-lg">
                            <li>• Queue management solution</li>
                            <li>• Integrated servers</li>
                            <li>• Automated notification and reminders</li>
                            <li>• Dashboard with real-time reports</li>
                            <li>• API support</li>
                        </ul>
                    </div>

                </div>

                <!-- Results -->
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        Results
                    </h3>

                    <ul class="space-y-3 text-gray-700 text-lg">
                        <li>• Improved internal communication</li>
                        <li>• Easy managing the queries and everyday task</li>
                        <li>• Secure sign in</li>
                        <li>• Generate the real-time reports</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Problems Faced Section -->
        <section class="py-24 sm:py-32 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Areas where People Association
                        lacked</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        People Association is a large group of people who are working to promote harmony and unity among
                        people of all races. These volunteers are working among differently located GRO (Grassroot
                        organization) and Community clubs. So it becomes tough for the working people and management to
                        coordinate effectively. Some of the problems faced by them are:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $problems = [
                            [
                                'title' => 'No communication system',
                                'desc' => 'No way of communicating confidential or work-related information',
                                'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'
                            ],
                            [
                                'title' => 'Staff login tracking',
                                'desc' => 'Difficulty in keeping the check on staff login',
                                'icon' => 'M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1'
                            ],
                            [
                                'title' => 'No reporting system',
                                'desc' => 'Unable to create the reports',
                                'icon' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'
                            ],
                            [
                                'title' => 'No unified dashboard',
                                'desc' => 'Required a single interface to monitor daily activities',
                                'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
                            ],
                            [
                                'title' => 'Issue management',
                                'desc' => 'Raise issues related to inventory or query within the association',
                                'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'
                            ]
                        ];
                    @endphp

                    @foreach($problems as $problem)
                        <div
                            class="group relative bg-white p-8 rounded-3xl shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center mb-6 text-red-600 group-hover:bg-red-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $problem['icon'] }}" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $problem['title'] }}</h3>
                            <p class="text-gray-600 group-hover:text-gray-900 transition-colors">{{ $problem['desc'] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                        So these were the few issues that the People' Association faced and were struggling to manage the
                        group on a large scale.
                    </p>
                </div>
            </div>
        </section>

        <!-- Qwaiting to the Rescue Section -->
        <section class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-20">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-50 rounded-full mb-4">
                        <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm font-semibold text-green-600">Solutions Implemented</span>
                    </div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">Qwaiting redefined the
                        management of the People's Association</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Indeed, Qwaiting appeared as a survivor of the People Association to manage their duties well and
                        more gracefully. Qwaiting analyzed all the issues and implemented Qwaiting with amazing features to
                        simplify the operations and work more on social services.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <!-- Solution 1 - Integrated Server -->
                    <div class="p-8 rounded-3xl bg-white shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
                                        </svg>
                                    </div>
                                    <span class="text-indigo-600 font-bold text-lg">Solution 01</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Qwaiting Integrated Server</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    The PA is facilitated by a Qwaiting integrated server that simplified the process of
                                    managing the staff. Well, the Qwaiting is a cloud-based software with API. It helps the
                                    team communicate easily and maintain confidentiality.
                                </p>
                    </div>

                    <!-- Solution 2 - Ticket System -->
                    <div class="p-8 rounded-3xl bg-white shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div>
                                <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                    </div>
                                    <span class="text-blue-600 font-bold text-lg">Solution 02</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Real-time Ticket Raising System</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    The Staff had an issue discussing the problems they faced in real-time with people. So,
                                    with the help of Qwaiting, they can easily raise the tickets to the higher in the
                                    hierarchy to receive the solution.
                                </p>
                            </div>
                    </div>

                    <!-- Solution 3 - SSO Login -->
                    <div class="p-8 rounded-3xl bg-white shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                    <span class="text-purple-600 font-bold text-lg">Solution 03</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">SSO for Easy Sign-in</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    Moreover, the staff is equipped with SSO for easy sign-in as the PA operates from many
                                    different locations. The advanced feature of API helps them to keep the login process
                                    secure as it verifies the authorized person and then grants permission to access it.
                                </p>
                    </div>

                    <!-- Solution 4 - Dashboard -->
                    <div class="p-8 rounded-3xl bg-white shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                                <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <span class="text-green-600 font-bold text-lg">Solution 04</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Simple Structured Dashboard</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    To handle all the duties easily the PA has access to a simple structured dashboard. It
                                    helps the staff to monitor every ongoing activity on a daily basis.
                                </p>
                            </div>

                    <!-- Solution 5 - Secure Database -->
                    <div class="p-8 rounded-3xl bg-white shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-orange-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                        </svg>
                                    </div>
                                    <span class="text-orange-600 font-bold text-lg">Solution 05</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Secure Database Storage</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    However, there are a lot of people who join the PA in order to get enrolled in a program
                                    or in a course. So the Software saves every detail of the individual in a secure
                                    database. The visitor information stored in the internal storage can be accessed by the
                                    staff easily and at any time.
                                </p>
                    </div>

                    <!-- Solution 6 - Real-time Reports -->
                    <div class="p-8 rounded-3xl bg-white shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                                <div class="flex items-center gap-3 mb-6">
                                    <div
                                        class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-pink-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <span class="text-pink-600 font-bold text-lg">Solution 06</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">Real-time Reports</h3>
                                <p class="text-lg text-gray-700 mb-4">
                                    At last, the supervisor or the concerned person looks over everything and is offered a
                                    feature of real-time reports. These reports contain all the information regarding
                                    serving time, services availed and other details to check how well the association is
                                    performing.
                                </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Results Section -->
        <section class="py-24 sm:py-20 bg-gray-50 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">After changes in People
                        Associations' working</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Definitely, the working of the PA is improved as Qwaiting reduced the workload. The staff can now
                        focus more on people's engagement and productivity, leaving the work to be done by the software.
                        Qwaiting takes care of every operation and updates the employees.
                    </p>
                </div>
            </div>
        </section>

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

    </div>
@endsection