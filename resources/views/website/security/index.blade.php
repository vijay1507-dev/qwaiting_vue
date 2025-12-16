@extends('website.layout.website')

@section('content')
    <div class="min-h-screen bg-white selection:bg-primary selection:text-white">

        {{-- Hero Section --}}
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-b from-gray-50 to-white">
            {{-- Abstract Background Shapes --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-0 right-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
                <div class="absolute top-1/2 left-0 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-5xl mx-auto relative z-10 text-center">
                <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-8 tracking-tight text-gray-900">
                    Security And <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-purple-600">Data
                        Protection</span>
                </h1>
            </div>
        </section>

        {{-- Overview Section --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-10 text-center">
                    <span class="text-primary">Overview</span>
                </h2>
                <div class="max-w-4xl mx-auto text-center">
                    <p class="text-xl text-gray-600 leading-relaxed mb-6">
                        Welcome to Qwaiting Trust Center- Your security and privacy are our top priorities, and we
                        continuously try to provide you with a safe and reliable experience.
                    </p>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Our Security, Governance, Risk, and Compliance (GRC) and Privacy programs are designed to protect
                        our clients' data's confidentiality and availability.
                    </p>
                </div>
            </div>
        </section>

        {{-- Compliance Badges Section --}}
        <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-12 text-center">Compliance</h3>
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-8">
                        <div
                            class="bg-gradient-to-br from-primary/10 to-purple-100/50 rounded-2xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                            <div class="text-xl font-bold text-gray-900">GDPR</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-primary/10 to-purple-100/50 rounded-2xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                            <div class="text-xl font-bold text-gray-900">AICPA</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-primary/10 to-purple-100/50 rounded-2xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                            <div class="text-xl font-bold text-gray-900">HIPAA</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-primary/10 to-purple-100/50 rounded-2xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                            <div class="text-xl font-bold text-gray-900">ISO/IEC 27001:2022</div>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-12 text-center">Documents</h3>
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                        <div
                            class="bg-gradient-to-br from-primary/10 to-purple-100/50 rounded-2xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                            <div class="text-xl font-bold text-gray-900">HIPA</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-primary/10 to-purple-100/50 rounded-2xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                            <div class="text-xl font-bold text-gray-900">GDPR</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-primary/10 to-purple-100/50 rounded-2xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                            <div class="text-lg font-bold text-gray-900">ISO/IEC 27001:2022</div>
                        </div>
                        <div
                            class="bg-gradient-to-br from-primary/10 to-purple-100/50 rounded-2xl p-6 hover:shadow-xl transition-all hover:-translate-y-1">
                            <div class="text-xl font-bold text-gray-900">SOC2 Type 2</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- Security Categories Grid --}}
        <section class="py-24 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-16 text-center">
                    Security <span class="text-primary">Categories</span>
                </h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Product Security --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Product Security</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Audit Logs</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Data Security and Privacy</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Data Masking</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('product-security')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>

                    {{-- Data Security --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Data Security</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Access Monitoring</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Erasure of Data</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Enabled Backups</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('data-security')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>

                    {{-- Application Security --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Application Security</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Code Analysis</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Credential Management</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Secure Development Training</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('application-security')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>

                    {{-- Legal --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Legal</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Subprocessors</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Privacy Policy</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Terms and Condition</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('legal')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>

                    {{-- Access Control --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Access Control</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Data Access</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Logging</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Password Security</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('access-control')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>

                    {{-- Infrastructure --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Infrastructure</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <a href="https://qwaiting.statuspage.io/" class="text-primary hover:text-purple-600">Status
                                    Monitoring</a>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Amazon Web Services</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Anti-DDoS Protection</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('infrastructure')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>

                    {{-- Endpoint Security --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Endpoint Security</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Disk Encryption</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Endpoint Detection & Response</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">No Access to Removable Storage Media</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('endpoint-security')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>

                    {{-- Network Security --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Network Security</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Firewall</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">IDS/IPS</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Traffic Filtering</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('network-security')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>

                    {{-- Corporate Security --}}
                    <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Corporate Security</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Employee Training</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Email Protection</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-sm font-bold">✓</span>
                                <span class="text-gray-700">Human Resource Security</span>
                            </li>
                        </ul>
                        <button onclick="toggleSection('corporate-security')"
                            class="mt-6 text-primary font-semibold hover:text-purple-600 transition-colors">
                            View more →
                        </button>
                    </div>
                </div>
            </div>
        </section>

        {{-- Sidebar Overlay and Container --}}
        <div id="security-sidebar-overlay"
            class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-40 hidden transition-opacity duration-300 opacity-0"
            onclick="closeSidebar()"></div>

        <div id="security-sidebar"
            class="fixed top-0 right-0 h-full w-full md:w-[600px] bg-white z-50 transform translate-x-full transition-transform duration-300 shadow-2xl flex flex-col">
            {{-- Sidebar Header --}}
            <div class="flex items-center justify-between p-6 border-b border-gray-100 bg-white sticky top-0 z-10">
                <h4 id="sidebar-title" class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                    {{-- Title and Icon will be injected here --}}
                </h4>
                <button onclick="closeSidebar()"
                    class="text-gray-400 hover:text-gray-600 transition-colors p-2 rounded-full hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            {{-- Sidebar Body --}}
            <div id="sidebar-content" class="flex-1 overflow-y-auto p-6 space-y-6">
                {{-- Content will be injected here --}}
            </div>
        </div>

        {{-- Hidden Content Templates (User Provided Content) --}}
        <div style="display: none;">

            {{-- Product Security Content --}}
            <div id="content-product-security">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/product-security.png" alt="product-security" width="32"
                            height="32"></span> Product Security
                </div>
                <div class="template-body">
                    <p class="mb-6 text-gray-600">We ensure that our product as a whole is secure and generally will not
                        work on any embedded systems.</p>
                    <ul class="security-modal-content space-y-6">
                        <li data-number="1" id="sec-1" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Audit Logs</div>
                            <p class="text-gray-600">Our product logs provide information about who has accessed the
                                software and what activities he or she has performed.</p>
                        </li>
                        <li data-number="2" id="sec-2" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Data Security and
                                Privacy</div>
                            <p class="text-gray-600 mb-2">Qwaiting implements the following data security standards:</p>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Secure Sockets Layer (SSL) encryption.</li>
                                <li>Hashing algorithms for password protection.</li>
                                <li>Secure File Transfer Protocol (SFTP) for data exchange.</li>
                                <li>Regular security audits and monitoring.</li>
                                <li>Data backups also undergo encryption when stored.</li>
                            </ul>
                        </li>
                        <li data-number="3" id="sec-3" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Data Masking</div>
                            <p class="text-gray-600">We use advanced security measures, like using a Data Masking feature.
                                This method adds an extra layer of protection and confidentiality to your data, effectively
                                preventing unauthorized access.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Two-Step
                                Verification</div>
                            <p class="text-gray-600">Our product offers strong support for two-step verification, allowing
                                users to boost the security of their accounts. One available option is OTP-based MFA, which
                                lets users safeguard their accounts with an extra layer of security beyond the usual login
                                credentials.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Role-Based Access
                                Control</div>
                            <p class="text-gray-600">Our system grants administrators the flexibility to manage user
                                permissions based on their roles and the needs of the business.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Integration Power
                            </div>
                            <p class="text-gray-600 mb-2">Qwaiting easily integrates with a range of widely-used business
                                software, including:</p>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Office365</li>
                                <li>Whatsapp</li>
                                <li>Gmail</li>
                                <li>Slack</li>
                                <li>Jumpcloud</li>
                            </ul>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Single Sign-On
                                (SSO) Support</div>
                            <p class="text-gray-600">Our product supports SSO for easy business deployments, allowing users
                                to use one set of credentials to log in to multiple applications. You can integrate Qwaiting
                                with your business software using SAML SSO.</p>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Data Security Content --}}
            <div id="content-data-security">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/data-security.png" alt="Data Security" width="32"
                            height="32"></span> Data Security
                </div>
                <div class="template-body">
                    <p class="mb-6 text-gray-600">We safeguard your digital information against unauthorized access,
                        corruption, or theft, ensuring a secure and protected experience.</p>
                    <ul class="security-modal-content space-y-6">
                        <li data-number="4" id="sec-4" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Access Monitoring
                            </div>
                            <p class="text-gray-600">We record and monitor all access attempts to Qwaiting resources. So you
                                can easily identify and respond to any unauthorized activities related to your data.</p>
                        </li>
                        <li data-number="5" id="sec-5" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Erasure of Data
                            </div>
                            <p class="text-gray-600">We have a well-defined process in place, supported by established
                                guidelines, to address data deletion and de-identification requests.</p>
                        </li>
                        <li data-number="6" id="sec-6" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Enabled Backups
                            </div>
                            <p class="text-gray-600">Qwaiting uses various methods such as continuous configuration, and
                                complete and incremental backups. They also perform regular checks to ensure the
                                effectiveness of the restoration process. To keep data safe, Qwaiting encrypts its backups
                                using built-in encryption.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">At-Rest Encryption
                            </div>
                            <p class="text-gray-600">We secure data at rest by employing AWS-provided Elastic Block Store
                                encryption, utilizing the widely accepted AES 256-bit encryption standard.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">In-Transit
                                Encryption</div>
                            <p class="text-gray-600">For communication in transit, we exclusively use secure and encrypted
                                channels, implementing Transport Layer Security.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Physical Security
                            </div>
                            <p class="text-gray-600">Qwaiting products are hosted on Amazon Web Services (AWS), where the
                                physical and environmental security policies of the hosting environments are overseen by
                                AWS.</p>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Application Security Content --}}
            <div id="content-application-security">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/app-security.png" alt="Application Security" width="32"
                            height="32"></span> Application Security
                </div>
                <div class="template-body">
                    <p class="mb-6 text-gray-600">We ensure that our application is equipped with advanced security features
                        to safeguard against potential risks and cyber threats.</p>
                    <ul class="security-modal-content space-y-6">
                        <li data-number="7" id="sec-7" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Code Analysis</div>
                            <p class="text-gray-600">We perform static code analysis using automated tools to detect and
                                address vulnerabilities in the code. Identified vulnerabilities are diligently monitored
                                until resolved.</p>
                        </li>
                        <li data-number="8" id="sec-8" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Credential
                                Management</div>
                            <p class="text-gray-600">Credential secrets are handled through the AWS Key Management Service,
                                with regular key rotations to enhance security.</p>
                        </li>
                        <li data-number="9" id="sec-9" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Secure Development
                                Training</div>
                            <p class="text-gray-600">Our developers receive regular training on secure coding practices.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Software
                                Development Lifecycle</div>
                            <p class="text-gray-600">Qwaiting follows a well-documented secure SDLC process. This includes
                                implementing access controls and conducting peer code reviews to prevent the introduction of
                                vulnerabilities. Automated tools are employed for code scanning.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Firewall for Web
                                Applications</div>
                            <p class="text-gray-600">Qwaiting uses Amazon Web Services (AWS) Web Application Firewall to
                                protect our web applications from common attacks.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Vulnerability
                                Management</div>
                            <p class="text-gray-600">Regular infrastructure and application-level vulnerability assessments
                                are carried out, and the identified vulnerabilities are tracked until the closure.</p>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Legal Content --}}
            <div id="content-legal">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/legal.png" alt="Legal" width="32" height="32"></span>
                    Legal
                </div>
                <div class="template-body">
                    <ul class="security-modal-content space-y-6">
                        <li data-number="10" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Subprocessors</div>
                        </li>
                        <li data-number="11" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Privacy Policy
                            </div>
                            <p class="text-gray-600"><a href="https://qwaiting.com/privacy-policy" target="_blank"
                                    class="text-primary hover:text-purple-600">https://qwaiting.com/privacy-policy</a></p>
                        </li>
                        <li data-number="12" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Terms and Condition
                            </div>
                            <p class="text-gray-600"><a href="https://qwaiting.com/terms-and-condition" target="_blank"
                                    class="text-primary hover:text-purple-600">https://qwaiting.com/terms-and-condition</a>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Access Control Content --}}
            <div id="content-access-control">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/access-control.png" alt="Access Control" width="32"
                            height="32"></span> Access Control
                </div>
                <div class="template-body">
                    <p class="mb-6 text-gray-600">You can rely on us to protect your environment with advanced access
                        control systems, giving you peace of mind and the highest level of security.</p>
                    <ul class="security-modal-content space-y-6">
                        <li data-number="13" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Data Access</div>
                            <p class="text-gray-600">Qwaiting ensures data access is restricted to individuals with a
                                genuine need, specifically for providing customer services. Access privileges are limited to
                                the minimum necessary as per the job responsibilities. To enhance security, Qwaiting
                                mandates two-factor authentication and VPN for secure access.</p>
                        </li>
                        <li data-number="14" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Logging</div>
                            <p class="text-gray-600">Qwaiting maintains different types of logs for access and user
                                activity, such as application logs, OS logs, database logs, firewall logs, and IDS/IPS logs.
                                These logs are used to monitor unusual activity, inappropriate resource usage, and the
                                overall operational status and health of the platform. We utilize security information and
                                event management (SIEM) tools for analysis and alerting.</p>
                        </li>
                        <li data-number="15" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Password Security
                            </div>
                            <p class="text-gray-600">Stringent password security policies and Multi-Factor Authentication
                                (MFA) are mandated for all Qwaiting employees via a central active directory.</p>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Infrastructure Content --}}
            <div id="content-infrastructure">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/infrastructure.png" alt="infrastructure" width="32"
                            height="32"></span> Infrastructure
                </div>
                <div class="template-body">
                    <p class="mb-6 text-gray-600">We safeguard the physical and digital assets of a business's information
                        technology (IT) infrastructure.</p>
                    <ul class="security-modal-content space-y-6">
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Status Monitoring
                            </div>
                            <p class="text-gray-600"></p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Amazon Web Services
                            </div>
                            <p class="text-gray-600">Qwaiting product is hosted on AWS.</p>
                            <p class="text-gray-600">The Amazon Web Service data centers are located as follows:</p>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1 mt-2">
                                <li>North Virginia</li>
                                <li>Singapore</li>
                            </ul>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Availability</div>
                            <p class="text-gray-600">Qwaiting systems operate across multiple AWS Availability Zones,
                                ensuring resilience. They support on-demand scaling of stateless server farms, and the
                                hosting infrastructure is designed to handle both hardware failures and availability zone
                                issues.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Anti-DDoS
                                Protection</div>
                            <p class="text-gray-600">Qwaiting relies on AWS Shield, an advanced DDoS protection service
                                provided by Amazon Web Services. This managed solution helps to secure Qwaiting applications
                                by autonomously identifying and mitigating complex network-level DDoS events. It ensures
                                uninterrupted service availability, safeguarding the overall performance of the application.
                            </p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Infrastructure
                                Security</div>
                            <p class="text-gray-600">Qwaiting follows Center for Internet Security (CIS) benchmarks to
                                protect its infrastructure. API Throttling has been activated for added security, and all
                                cloud systems are equipped with antivirus protection.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Network Time
                                Protocol (NTP)</div>
                            <p class="text-gray-600">We utilize Amazon Web Services NTP servers to synchronize time across
                                our systems.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Business Continuity
                                & Disaster Recovery Plan</div>
                            <p class="text-gray-600">Qwaiting has a Business Continuity Plan in place, with procedures for
                                implementation in the event of a disturbance. Regular testing and validation are carried out
                                to ensure the ongoing effectiveness of the Business Continuity Plan.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Separate Production
                                Environment</div>
                            <p class="text-gray-600">Qwaiting maintains separate production, testing, and development
                                environments for its products. Each of these environments is carefully segregated to
                                guarantee proper isolation.</p>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Endpoint Security Content --}}
            <div id="content-endpoint-security">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/endpoint-security.png" alt="Endpoint Security" width="32"
                            height="32"></span> Endpoint Security
                </div>
                <div class="template-body">
                    <p class="mb-6 text-gray-600">We specialize in comprehensive Endpoint Security, ensuring advanced
                        protection for your digital assets.</p>
                    <ul class="security-modal-content space-y-6">
                        <li data-number="16" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Disk Encryption
                            </div>
                            <p class="text-gray-600">To secure data on our corporate laptops, we employ FileVault and
                                VeraCrypt for advanced disk encryption.</p>
                        </li>
                        <li data-number="17" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Endpoint Detection
                                & Response</div>
                            <p class="text-gray-600">Microsoft Defender is utilized for endpoint protection, with Endpoint
                                Detection and Response (EDR) activated on all endpoints. This ensures the detection and
                                response to any malicious activities as soon as possible.</p>
                        </li>
                        <li data-number="18" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">No Access to
                                Removable Storage Media</div>
                            <p class="text-gray-600">As a default measure, removable storage media access is blocked on all
                                endpoints.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Mobile Device
                                Management</div>
                            <p class="text-gray-600">Qwaiting centrally manages all mobile devices, implementing controls
                                such as automatic screen lock, strong passwords and patterns, and regular operating system
                                (OS) updates. Mobile devices are both password-protected and encrypted to enhance security.
                            </p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Threat Detection
                            </div>
                            <p class="text-gray-600">Our comprehensive threat detection strategy includes IDS/IPS at the
                                network gateway level, ATP for the email gateway, and Defender for endpoint security.</p>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Network Security Content --}}
            <div id="content-network-security">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/network-security.png" alt="Network Security" width="32"
                            height="32"></span> Network Security
                </div>
                <div class="template-body">
                    <p class="mb-6 text-gray-600">We will take care of network security, ensuring the highest level of
                        protection for your digital infrastructure.</p>
                    <ul class="security-modal-content space-y-6">
                        <li data-number="19" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Firewall</div>
                            <p class="text-gray-600">We use a firewall to safeguard networked company resources.</p>
                        </li>
                        <li data-number="20" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">IDS/IPS</div>
                            <p class="text-gray-600">Identification of malicious inbound and outbound traffic is carried out
                                using an IDS. Also, we utilize an IPS to provide real-time protection for critical
                                infrastructure, data, and vulnerable applications, safeguarding against known, and unknown
                                vulnerabilities without compromising network performance.</p>
                        </li>
                        <li data-number="21" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Traffic Filtering
                            </div>
                            <p class="text-gray-600">Our network traffic is filtered for known malicious domains at both the
                                network and host levels.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Wireless Security
                            </div>
                            <p class="text-gray-600">We utilize WPA2-Enterprise for wireless authentication on our internal
                                network. Also, we have a distinct, isolated wireless network for guest devices.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Virtual Private
                                Cloud</div>
                            <p class="text-gray-600">We implement a virtual private cloud to maintain a secured segregated
                                environment, separate from other public cloud tenants.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Security
                                Information and Event Management</div>
                            <p class="text-gray-600">We use security information and event management (SIEM) tools to
                                observe security events within our infrastructure.</p>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Corporate Security Content --}}
            <div id="content-corporate-security">
                <div class="template-header">
                    <span><img src="https://qwaiting.com/frontimg/corporate-security.png" alt="Corporate Security"
                            width="32" height="32"></span> Corporate Security
                </div>
                <div class="template-body">
                    <p class="mb-6 text-gray-600">We follow a broad range of practices and policies for corporate security,
                        ensuring the safety and continuity of business operations.</p>
                    <ul class="security-modal-content space-y-6">
                        <li data-number="22" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Employee Training
                            </div>
                            <p class="text-gray-600">All employees must attend security and privacy training at the time of
                                hire and annually thereafter. These sessions involve assessments, and a passing score is
                                required to complete the training.</p>
                        </li>
                        <li data-number="23" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Email Protection
                            </div>
                            <p class="text-gray-600">Qwaiting makes sure that emails are secure by using a secure email
                                gateway with strong protections. It filters out suspicious emails to keep users safe. The
                                system also identifies emails from external users and has extra measures to prevent data
                                loss.</p>
                        </li>
                        <li data-number="24" class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Human Resource
                                Security</div>
                            <p class="text-gray-600 mb-2">Our HR security protocols are as follows: </p>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Employee Screening</li>
                                <li>Security Training for Employees</li>
                                <li>Disciplinary Process</li>
                                <li>Termination or Change of Employment</li>
                                <li>Terms & Conditions of Employment</li>
                            </ul>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Internal
                                Assessments</div>
                            <p class="text-gray-600">On an annual basis, internal audits and assessments are conducted
                                according to industry standards such as SOC2, ISO 27001, ISO 27701, and PCI-DSS.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Internal SSO</div>
                            <p class="text-gray-600">To enhance security, Qwaiting has implemented Single Sign-On (SSO)
                                using Azure AD, making it mandatory for employees to use SSO to access company resources.
                            </p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Security Incident
                                Reporting</div>
                            <p class="text-gray-600">Incident response procedures address any unauthorized access,
                                disclosure, use, or deletion of information that could compromise confidentiality and
                                availability.</p>
                        </li>
                        <li class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                            <div class="ts text-lg font-bold text-gray-900 mb-2 flex items-center gap-2">Penetration Testing
                            </div>
                            <p class="text-gray-600">Regular vulnerability assessments and penetration tests are carried out
                                on IT and Cloud Infrastructure. Application Security Testing follows guidelines such as
                                OWASP Top 10, CWE/SANS Top 25, PCI DSS Penetration Testing Guidelines, and other industry
                                best practices as applicable.</p>
                        </li>
                    </ul>
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

    </div>

    <style>
        .ts::before {
            content: '✓';
            background-color: #4f46e5;
            color: white;
            border-radius: 50%;
            width: 1.5rem;
            height: 1.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            margin-right: 0.5rem;
            flex-shrink: 0;
        }
    </style>

    <script>
        function toggleSection(sectionId) {
            const overlay = document.getElementById('security-sidebar-overlay');
            const sidebar = document.getElementById('security-sidebar');
            const sidebarTitle = document.getElementById('sidebar-title');
            const sidebarContent = document.getElementById('sidebar-content');

            // Map the simple kebab-case ID to the content-div ID
            const contentId = 'content-' + sectionId;
            const contentSource = document.getElementById(contentId);

            if (contentSource) {
                // Populate Sidebar
                const headerContent = contentSource.querySelector('.template-header').innerHTML;
                const bodyContent = contentSource.querySelector('.template-body').innerHTML;

                sidebarTitle.innerHTML = headerContent;
                sidebarContent.innerHTML = bodyContent;

                // Show Sidebar
                overlay.classList.remove('hidden');
                // Small delay to allow display:block to apply before opacity transition
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                    sidebar.classList.remove('translate-x-full');
                }, 10);

                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            }
        }

        function closeSidebar() {
            const overlay = document.getElementById('security-sidebar-overlay');
            const sidebar = document.getElementById('security-sidebar');

            overlay.classList.add('opacity-0');
            sidebar.classList.add('translate-x-full');

            setTimeout(() => {
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }
    </script>
@endsection