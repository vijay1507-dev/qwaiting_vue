<header id="main-header"
    class="fixed w-full z-50 duration-300 bg-white/90 backdrop-blur-md border-b border-gray-100 top-0">
    <div class="max-w-8xl mx-auto px-4">
        <div class="flex justify-between items-center h-20 gap-2">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center gap-2">
                    <img src="https://qwaiting.com/images/qwaiting-logo.svg" alt="" class="w-32">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex gap-5 items-center h-full">
                <!-- Products Button -->
                <button data-dropdown="products"
                    class="dropdown-trigger text-text-dark hover:text-primary font-bold flex items-center gap-1 h-full transition-colors text-sm">
                    Products
                    <svg class="w-4 h-4 transition-transform duration-200 dropdown-arrow" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Solutions Button -->
                <button data-dropdown="solutions"
                    class="dropdown-trigger text-text-dark hover:text-primary font-bold flex items-center gap-1 h-full transition-colors text-sm">
                    Solutions
                    <svg class="w-4 h-4 transition-transform duration-200 dropdown-arrow" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <a href="/integrations"
                    class="text-text-dark hover:text-primary font-bold transition-colors text-sm">Integrations</a>

                <!-- Partners Button -->
                <button data-dropdown="partners"
                    class="dropdown-trigger text-text-dark hover:text-primary font-bold flex items-center gap-1 h-full transition-colors text-sm">
                    Partners
                    <svg class="w-4 h-4 transition-transform duration-200 dropdown-arrow" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Resources Button -->
                <button data-dropdown="resources"
                    class="dropdown-trigger text-text-dark hover:text-primary font-bold flex items-center gap-1 h-full transition-colors text-sm">
                    Resources
                    <svg class="w-4 h-4 transition-transform duration-200 dropdown-arrow" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <a href="/customer-stories"
                    class="text-text-dark hover:text-primary font-bold transition-colors text-sm">Customer Stories</a>
                <a href="/pricing" class="text-text-dark hover:text-primary font-bold transition-colors text-sm">Pricing</a>
            </nav>

            <!-- CTA Buttons -->
            <div class="hidden lg:flex items-center space-x-4">
                <a href="/signup"
                    class="bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-lg font-medium transition-all shadow-lg shadow-primary/25 hover:shadow-primary/40 hover:-translate-y-0.5 text-sm">Sign
                    Up/Sign In</a>
                <a href="/request-demo"
                    class="bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-lg font-medium transition-all shadow-lg shadow-primary/25 hover:shadow-primary/40 hover:-translate-y-0.5 text-sm">
                    Request Demo
                </a>

                <!-- Language Selector -->
                <div class="relative">
                    <button data-dropdown="language"
                        class="dropdown-trigger text-text-dark hover:text-primary font-bold flex items-center gap-1 px-3 py-2 rounded-lg border border-gray-200 hover:border-primary transition-all text-sm">
                        ENG
                        <svg class="w-4 h-4 transition-transform duration-200 dropdown-arrow" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-text-dark hover:text-primary p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Products Dropdown (Full Width) -->
    <div id="products-dropdown"
        class="dropdown-menu hidden absolute left-0 right-0 top-20 bg-white shadow-xl border-t border-gray-100 overflow-y-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-2 gap-8">
                <div class="flex flex-col gap-2">
                    <a href="/products/cloud-based-software"
                        class="flex flex-col items-start gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <img src="https://qwaiting.com/images/cloud-based-img.png" alt="">
                            </div>
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Cloud-based
                                Software</h3>
                        </div>
                        <p class="text-sm text-text-medium">Deliver fast, reliable service with a cloud system that
                            updates in real-time and scales with your business.</p>
                    </a>
                    <a href="/products/on-premises"
                        class="flex flex-col items-start gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <img src="https://qwaiting.com/images/on-premise.png" alt="">
                            </div>
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">On-Premises
                            </h3>
                        </div>
                        <p class="text-sm text-text-medium">Control your data and infrastructure with a secure,
                            offline-ready solution tailored for complex environments.</p>
                    </a>
                    <a href="/products/self-service-kiosks"
                        class="flex flex-col items-start gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <img src="https://qwaiting.com/images/self-service.png" alt="">
                            </div>
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Self-service
                                Kiosks</h3>
                        </div>
                        <p class="text-sm text-text-medium">Empower customers to check in, book, or update their
                            appointments without staff assistance.</p>
                    </a>
                    <a href="/products/face-recognition-system"
                        class="flex flex-col items-start gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <img src="https://qwaiting.com/images/face-icon.png" alt="">
                            </div>
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Face
                                Recognition System</h3>
                        </div>
                        <p class="text-sm text-text-medium">Deliver fast, secure access for repeat visitors using
                            AI-powered facial recognition.</p>
                    </a>
                </div>
                <div>
                    <a href="/products/people-counting"
                        class="flex flex-col items-start gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <img src="https://qwaiting.com/images/people-icon.png" alt="">
                            </div>
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">People
                                Counting</h3>
                        </div>
                        <p class="text-sm text-text-medium">Track how many people enter, exit, or wait so you can
                            allocate resources smarter.</p>
                    </a>
                    <a href="/products/digital-signage"
                        class="flex flex-col items-start gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <img src="https://qwaiting.com/images/digital-signage-img.png" alt="">
                            </div>
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Digital
                                Signage</h3>
                        </div>
                        <p class="text-sm text-text-medium">Keep customers informed with real-time queue status and
                            announcements on dynamic display screens.</p>
                    </a>
                    <a href="/enterprise"
                        class="flex flex-col items-start gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <img src="https://qwaiting.com/images/enterprise.png" alt="">
                            </div>
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Enterprise
                            </h3>
                        </div>
                        <p class="text-sm text-text-medium">Enterprise solution for large teams and multi-branch
                            operations.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Solutions Dropdown (Full Width) -->
    <div id="solutions-dropdown"
        class="dropdown-menu hidden absolute left-0 right-0 top-20 bg-white shadow-xl border-t border-gray-100 max-h-[90vh] overflow-y-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-12 gap-8">
                <div class="col-span-5 border-r border-gray-100 pr-8">
                    <h3
                        class="text-xs font-bold text-text-medium uppercase tracking-wider mb-6 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                        Industries
                    </h3>
                    <div class="space-y-2">
                        <a href="/industries/banking-queue-system"
                            class="flex flex-col gap-1 p-3 rounded-lg hover:bg-gray-50 transition-colors group/item">
                            <div class="flex items-center gap-2">
                                <img src="https://qwaiting.com/images/industry-bank.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/item:text-primary">Banking</span>
                            </div>
                            <p class="text-sm text-text-medium">Streamline customer flow and reduce wait times in banks and financial institutions.
                            </p>
                        </a>
                        <a href="/industries/healthcare"
                            class="flex flex-col gap-1 p-3 rounded-lg hover:bg-gray-50 transition-colors group/item">
                            <div class="flex items-center gap-2">
                                <img src="https://qwaiting.com/images/hospital-icon.png" alt="" class="w-8 h-8">
                                <span
                                    class="font-semibold text-text-dark group-hover/item:text-primary">Healthcare</span>
                            </div>
                            <p class="text-sm text-text-medium">Refine patient check-ins and improve healthcare service.
                            </p>
                        </a>
                        <a href="/industries/public-sector-queue-system"
                            class="flex flex-col gap-1 p-3 rounded-lg hover:bg-gray-50 transition-colors group/item">
                            <div class="flex items-center gap-2">
                                <img src="https://qwaiting.com/images/industry-icon8.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/item:text-primary">Public
                                    Sector</span>
                            </div>
                            <p class="text-sm text-text-medium">Manage citizen services smoothly in government offices and public institutions.
                            </p>
                        </a>
                        <a href="/industries/retail"
                            class="flex flex-col gap-1 p-3 rounded-lg hover:bg-gray-50 transition-colors group/item">
                            <div class="flex items-center gap-2">
                                <img src="https://qwaiting.com/images/retail-icon.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/item:text-primary">Retail</span>
                            </div>
                            <p class="text-sm text-text-medium">Improve shopping experiences by minimizing checkout lines and wait times.</p>
                        </a>
                        <a href="/industries/DMV"
                            class="flex flex-col gap-1 p-3 rounded-lg hover:bg-gray-50 transition-colors group/item">
                            <div class="flex items-center gap-2">
                                <img src="https://qwaiting.com/images/motor.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/item:text-primary">DMV</span>
                            </div>
                            <p class="text-sm text-text-medium">Organize customer service queues in automotive showrooms and service centers.
                            </p>
                        </a>
                        <a href="/industries/airport-queue-system"
                            class="flex flex-col gap-1 p-3 rounded-lg hover:bg-gray-50 transition-colors group/item">
                            <div class="flex items-center gap-2">
                                <img src="https://qwaiting.com/images/airport.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/item:text-primary">Airport</span>
                            </div>
                            <p class="text-sm text-text-medium">Speed up passenger processing with efficient queue management at terminals.</p>
                        </a>
                        <a href="/industries/"
                            class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group/item">
                            <span class="font-semibold text-text-dark group-hover/item:text-primary">All Industries
                                →</span>
                        </a>
                    </div>
                </div>
                <div class="col-span-7 pl-4">
                    <h3
                        class="text-xs font-bold text-text-medium uppercase tracking-wider mb-6 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                            </path>
                        </svg>
                        Use Cases
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="/solutions/queue-management-solution"
                            class="group/card block p-3 rounded-xl hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="https://qwaiting.com/images/queue-icon.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/card:text-primary">Queue
                                    Management</span>
                            </div>
                            <p class="text-sm text-text-medium">Organize and manage customer queues efficiently to reduce wait times and improve service delivery.</p>
                        </a>
                        <a href="/solutions/appointments"
                            class="group/card block p-3 rounded-xl hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="https://qwaiting.com/images/appointment-icon.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/card:text-primary">Appointment
                                    Booking</span>
                            </div>
                            <p class="text-sm text-text-medium">Offer flexible scheduling that helps customers plan their visit and avoid peak-time congestion.</p>
                        </a>
                        <a href="/solutions/biometric-queue-system"
                            class="group/card block p-3 rounded-xl hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="https://qwaiting.com/images/biometric-icon.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/card:text-primary">Biometric
                                    System</span>
                            </div>
                            <p class="text-sm text-text-medium">Speed up identity verification and check-ins using facial or fingerprint recognition.</p>
                        </a>
                        <a href="/solutions/automation"
                            class="group/card block p-3 rounded-xl hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="https://qwaiting.com/images/automation.png" alt="" class="w-8 h-8">
                                <span
                                    class="font-semibold text-text-dark group-hover/card:text-primary">Automation</span>
                            </div>
                            <p class="text-sm text-text-medium">Automate workflows and reduce manual tasks with smart queue solutions.</p>
                        </a>
                        <a href="/solutions/virtual-queuing"
                            class="group/card block p-3 rounded-xl hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="https://qwaiting.com/images/qr-code-icon.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/card:text-primary">Virtual
                                    Queuing</span>
                            </div>
                            <p class="text-sm text-text-medium">Let customers wait from anywhere home, car, or cafe with mobile-based virtual queues.</p>
                        </a>
                        <a href="/solutions/visitor-management"
                            class="group/card block p-3 rounded-xl hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="https://qwaiting.com/images/visitor-system-icon.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/card:text-primary">Visitor
                                    Management</span>
                            </div>
                            <p class="text-sm text-text-medium">Track and manage visitor entry, exit, and ID verification from a single dashboard.</p>
                        </a>
                        <a href="/solutions/video-queue-system"
                            class="group/card block p-3 rounded-xl hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="https://qwaiting.com/images/video_queue.png" alt="" class="w-8 h-8">
                                <span class="font-semibold text-text-dark group-hover/card:text-primary">Video
                                    Queue</span>
                            </div>
                            <p class="text-sm text-text-medium">Allow people to join video calls instantly with one link—no apps, Accessible on any browser.</p>
                        </a>
                        <a href="/solutions/tele-consultation"
                            class="group/card block p-3 rounded-xl hover:shadow-md transition-all">
                            <div class="flex items-center gap-3 mb-2">
                                <img src="https://qwaiting.com/images/tele_consultation.png" alt="" class="w-8 h-8">
                                <span
                                    class="font-semibold text-text-dark group-hover/card:text-primary">Tele-Consultation</span>
                            </div>
                            <p class="text-sm text-text-medium">Offer seamless virtual consultations with real-time communication tool.</p>
                        </a>
                        <a href="/solutions/"
                            class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors group/item">
                            <span class="font-semibold text-text-dark group-hover/item:text-primary">All Solutions
                                →</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partners Dropdown -->
    <div id="partners-dropdown"
        class="dropdown-menu hidden absolute left-0 right-0 top-20 bg-white shadow-xl border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-2 gap-8 max-w-2xl">
                <a href="/partners"
                    class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                    <div class="flex items-center gap-3">
                        <img src="https://qwaiting.com/images/partner-icon.png" alt="" class="w-10 h-10">
                        <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Become a Partner
                        </h3>
                    </div>
                    <p class="text-sm text-text-medium">Start your Qwaiting partner journey.</p>
                </a>
                <a href="/reseller-partner-program"
                    class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                    <div class="flex items-center gap-3">
                        <img src="https://qwaiting.com/images/partner-program.png" alt="" class="w-10 h-10">
                        <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Reseller Partner
                            Program</h3>
                    </div>
                    <p class="text-sm text-text-medium">Unlock new revenue by reselling Qwaiting solutions.</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Resources Dropdown -->
    <div id="resources-dropdown"
        class="dropdown-menu hidden absolute left-0 right-0 top-20 bg-white shadow-xl border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <a href="/videos"
                        class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <img src="https://qwaiting.com/images/video-icon.png" alt="" class="w-10 h-10">
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Explainer
                                Videos</h3>
                        </div>
                        <p class="text-sm text-text-medium">Watch quick product demos and tutorials to understand how Qwaiting works for your business.</p>
                    </a>
                    <a href="https://blog.qwaiting.com/"
                        class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <img src="https://qwaiting.com/images/blog-icon.png" alt="" class="w-10 h-10">
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Blog</h3>
                        </div>
                        <p class="text-sm text-text-medium">Read expert insights, tips, and industry trends to enhance customer experience.</p>
                    </a>
                    <a href="/ebooks"
                        class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <img src="https://qwaiting.com/images/ebook-icon.png" alt="" class="w-10 h-10">
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Ebooks</h3>
                        </div>
                        <p class="text-sm text-text-medium">Download in-depth guides and resources to explore queue management best practices.</p>
                    </a>
                    <a href="/self-guided-demo"
                        class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <img src="https://qwaiting.com/images/self-guided-demo-icon.png" alt="" class="w-10 h-10">
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Self Guided
                                Demo</h3>
                        </div>
                        <p class="text-sm text-text-medium">Explore Qwaiting in a quick interactive demo, no signup needed.</p>
                    </a>
                </div>
                <div>
                    <a href="https://blog.qwaiting.com/category/product-updates"
                        class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <img src="https://qwaiting.com/images/customer-story-icon.png" alt="" class="w-10 h-10">
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Product
                                Update</h3>
                        </div>
                        <p class="text-sm text-text-medium">Stay informed about the latest releases, improvements, and new features in Qwaiting.</p>
                    </a>
                    <a href="https://help.qwaiting.com/en/"
                        class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <img src="https://qwaiting.com/images/creative-idea-icon.png" alt="" class="w-10 h-10">
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">Help Center
                            </h3>
                        </div>
                        <p class="text-sm text-text-medium">Find answers to common questions and step-by-step guides to make the most of Qwaiting.</p>
                    </a>
                    <a href="/roi-calculator-for-queue-system"
                        class="flex flex-col gap-2 p-4 rounded-xl hover:bg-gray-50 transition-colors group/item">
                        <div class="flex items-center gap-3">
                            <img src="https://qwaiting.com/images/roi-icon.png" alt="" class="w-10 h-10">
                            <h3 class="font-semibold text-lg text-text-dark group-hover/item:text-primary">ROI
                                Calculator</h3>
                        </div>
                        <p class="text-sm text-text-medium">Calculate your ROI in seconds — see how much time and money you'll save.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Language Dropdown -->
    <div id="language-dropdown"
        class="dropdown-menu hidden absolute right-0 top-20 bg-white shadow-xl border border-gray-100 rounded-lg w-48">
        <div class="py-2">
            <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 transition-colors">
                <span class="text-sm font-medium text-text-dark">English</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 transition-colors">
                <span class="text-sm font-medium text-text-dark">Arabic</span>
            </a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="hidden lg:hidden bg-white border-t border-gray-100 absolute w-full left-0 top-20 shadow-xl max-h-[calc(100vh-5rem)] overflow-y-auto">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <!-- Mobile Products -->
            <div class="mobile-dropdown-container">
                <button
                    class="mobile-dropdown-trigger w-full flex items-center justify-between px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">
                    <span>Products</span>
                    <svg class="w-5 h-5 transition-transform mobile-arrow" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="mobile-dropdown-content hidden pl-4 space-y-1">
                    <a href="/products/cloud-based-software"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Cloud-based
                        Software</a>
                    <a href="/products/on-premises"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">On-Premises</a>
                    <a href="/products/self-service-kiosks"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Self-service
                        Kiosks</a>
                    <a href="/products/face-recognition-system"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Face
                        Recognition</a>
                    <a href="/products/people-counting"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">People Counting</a>
                    <a href="/products/digital-signage"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Digital Signage</a>
                    <a href="/products/enterprise"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Enterprise</a>
                </div>
            </div>

            <!-- Mobile Solutions -->
            <div class="mobile-dropdown-container">
                <button
                    class="mobile-dropdown-trigger w-full flex items-center justify-between px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">
                    <span>Solutions</span>
                    <svg class="w-5 h-5 transition-transform mobile-arrow" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="mobile-dropdown-content hidden pl-4 space-y-1">
                    <a href="/solutions/queue-management-solution"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Queue
                        Management</a>
                    <a href="/solutions/appointments"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Appointment
                        Booking</a>
                    <a href="/solutions/virtual-queuing"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Virtual Queuing</a>
                    <a href="/solutions/visitor-management"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Visitor
                        Management</a>
                    <a href="/industries/" class="block px-3 py-2 text-sm text-primary hover:bg-gray-50 rounded-md">View
                        All →</a>
                </div>
            </div>

            <a href="/integrations"
                class="block px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">Integrations</a>

            <!-- Mobile Partners -->
            <div class="mobile-dropdown-container">
                <button
                    class="mobile-dropdown-trigger w-full flex items-center justify-between px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">
                    <span>Partners</span>
                    <svg class="w-5 h-5 transition-transform mobile-arrow" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="mobile-dropdown-content hidden pl-4 space-y-1">
                    <a href="/partners"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Become a
                        Partner</a>
                    <a href="/reseller-partner-program"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Reseller
                        Program</a>
                </div>
            </div>

            <!-- Mobile Resources -->
            <div class="mobile-dropdown-container">
                <button
                    class="mobile-dropdown-trigger w-full flex items-center justify-between px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">
                    <span>Resources</span>
                    <svg class="w-5 h-5 transition-transform mobile-arrow" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="mobile-dropdown-content hidden pl-4 space-y-1">
                    <a href="/videos"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Videos</a>
                    <a href="https://blog.qwaiting.com/"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Blog</a>
                    <a href="/ebooks"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Ebooks</a>
                    <a href="/self-guided-demo"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Self Guided
                        Demo</a>
                    <a href="https://help.qwaiting.com/en/"
                        class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Help Center</a>
                </div>
            </div>

            <a href="/customer-stories"
                class="block px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">Customer
                Stories</a>
            <a href="/pricing"
                class="block px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">Pricing</a>

            <!-- Mobile Language Selector -->
            <div class="mobile-dropdown-container">
                <button
                    class="mobile-dropdown-trigger w-full flex items-center justify-between px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">
                    <span>Language (ENG)</span>
                    <svg class="w-5 h-5 transition-transform mobile-arrow" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="mobile-dropdown-content hidden pl-4 space-y-1">
                    <a href="#" class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">English</a>
                    <a href="#" class="block px-3 py-2 text-sm text-text-medium hover:bg-gray-50 rounded-md">Arabic</a>
                </div>
            </div>

            <div class="border-t border-gray-100 my-2"></div>
            <a href="/signup"
                class="block px-3 py-3 text-base font-medium text-text-dark hover:bg-gray-50 rounded-md">Sign Up/Sign
                In</a>
            <a href="/request-demo"
                class="block px-3 py-3 text-base font-medium text-white bg-primary hover:bg-primary-dark rounded-md text-center">Request
                Demo</a>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Desktop dropdown functionality
        const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
        const dropdownMenus = document.querySelectorAll('.dropdown-menu');

        dropdownTriggers.forEach(trigger => {
            trigger.addEventListener('click', function (e) {
                e.stopPropagation();
                const dropdownId = this.getAttribute('data-dropdown') + '-dropdown';
                const dropdown = document.getElementById(dropdownId);
                const arrow = this.querySelector('.dropdown-arrow');

                // Close all other dropdowns
                dropdownMenus.forEach(menu => {
                    if (menu.id !== dropdownId) {
                        menu.classList.add('hidden');
                    }
                });

                // Reset all arrows
                document.querySelectorAll('.dropdown-arrow').forEach(arr => {
                    if (arr !== arrow) {
                        arr.classList.remove('rotate-180');
                    }
                });

                // Toggle current dropdown
                dropdown.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.dropdown-trigger') && !e.target.closest('.dropdown-menu')) {
                dropdownMenus.forEach(menu => menu.classList.add('hidden'));
                document.querySelectorAll('.dropdown-arrow').forEach(arrow => {
                    arrow.classList.remove('rotate-180');
                });
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile dropdown functionality
        const mobileDropdownTriggers = document.querySelectorAll('.mobile-dropdown-trigger');

        mobileDropdownTriggers.forEach(trigger => {
            trigger.addEventListener('click', function () {
                const container = this.closest('.mobile-dropdown-container');
                const content = container.querySelector('.mobile-dropdown-content');
                const arrow = this.querySelector('.mobile-arrow');

                content.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });
        });
    });
</script>

<style>
    .dropdown-menu {
        animation: slideDown 0.2s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>