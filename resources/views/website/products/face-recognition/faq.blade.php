<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            FAQs - Face Recognition System
        </h2>
        <p class="mt-4 text-xl text-gray-500">
            Explore the most common queries about Qwaiting's face recognition software to better understand its
            benefits, safety, and use cases
        </p>
        <div class="mt-8">
            <a href="/signup"
                class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-semibold rounded-2xl text-white bg-primary hover:bg-primary/90 shadow-lg hover:shadow-xl transition-all duration-300">
                Book a Free Demo
            </a>
        </div>
    </div>

    <div class="space-y-6" x-data="{ active: null }">
        <!-- Question 1 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 1 ? null : 1"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">What is a Face Recognition System (FRS)?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 1 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 1" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                        A Face Recognition System (FRS) is AI-powered software that verifies people by scanning their facial features. Qwaiting's system creates a secure “faceprint” using unique markers like eyes, nose, and mouth, then matches it with stored records. This enables instant, contactless identity verification for payments, onboarding, account access, or check-ins — saving time while enhancing security.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 2 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 2 ? null : 2"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">How does Qwaiting's Face Recognition System Work?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 2 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 2" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>Working of the Qwaiting’s Face Recognition System:</p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold mr-3 mt-0.5">1</span>
                            <span><strong class="text-gray-900">Capture & Detect the Face:</strong> A camera scans the
                                person’s face, iris or their unique facial expressions.</span>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold mr-3 mt-0.5">2</span>
                            <span><strong class="text-gray-900">Map & Create Faceprint:</strong> Key points on the face
                                such as the eyes, nose, and mouth are measured and converted into a unique digital
                                pattern, called a "faceprint”.</span>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold mr-3 mt-0.5">3</span>
                            <span><strong class="text-gray-900">Match with Database:</strong> The faceprint is compared
                                with securely stored records.</span>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold mr-3 mt-0.5">4</span>
                            <span><strong class="text-gray-900">Verify & Grant Access:</strong> If matched, the system
                                confirms identity and allows entry, transaction, or other actions.</span>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold mr-3 mt-0.5">5</span>
                            <span><strong class="text-gray-900">Handle Multiple Faces:</strong> If multiple faces are
                                detected, it prioritizes the main one.</span>
                        </li>
                        <li class="flex items-start">
                            <span
                                class="flex-shrink-0 h-6 w-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold mr-3 mt-0.5">6</span>
                            <span><strong class="text-gray-900">Security & Accuracy:</strong> All data is encrypted to
                                protect user privacy, and the system keeps learning to improve over time.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Question 3 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 3 ? null : 3"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">What are the main use cases of Qwaiting's Face Recognition
                    Software?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 3 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 3" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <ul class="grid md:grid-cols-2 gap-4">
                        <li class="flex items-start gap-3 bg-gray-50 p-3 rounded-xl">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-gray-900">KYC Automation:</strong> Fast, fraud-free
                                compliance.</span>
                        </li>
                        <li class="flex items-start gap-3 bg-gray-50 p-3 rounded-xl">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-gray-900">Customer Onboarding:</strong> Seamless signups and
                                account openings.</span>
                        </li>
                        <li class="flex items-start gap-3 bg-gray-50 p-3 rounded-xl">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-gray-900">Data Entry Automation:</strong> Accurate, error-free
                                digitization.</span>
                        </li>
                        <li class="flex items-start gap-3 bg-gray-50 p-3 rounded-xl">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-gray-900">Fraud Prevention:</strong> Stops impersonation and
                                identity theft.</span>
                        </li>
                        <li class="flex items-start gap-3 bg-gray-50 p-3 rounded-xl">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-gray-900">Check-In Automation:</strong> Faster, touchless entry at
                                events, airports, and hospitals.</span>
                        </li>
                        <li class="flex items-start gap-3 bg-gray-50 p-3 rounded-xl">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-gray-900">Age Verification:</strong> Automated checks for
                                restricted services and products.</span>
                        </li>
                        <li class="flex items-start gap-3 bg-gray-50 p-3 rounded-xl">
                            <svg class="w-5 h-5 text-green-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span><strong class="text-gray-900">Remote Document Validation:</strong> Secure verification
                                from anywhere.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Question 4 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 4 ? null : 4"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">Is Qwaiting's Face Recognition System Safe to Use?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 4 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 4" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                        Yes. Qwaiting prioritizes privacy and data protection. All face data is encrypted, stored securely, and used only for identity verification. The system complies with global data protection standards, ensuring sensitive information remains private and tamper-proof
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 5 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 5 ? null : 5"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">How accurate is Qwaiting's face recognition system?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 5 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 5" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                       Qwaiting's Facial Recognition software is very accurate. It can recognize you quickly—even in a crowd, with a new hairstyle, or while wearing glasses. If a match isn't confirmed, it asks for manual verification. Overall, it delivers a fast, and secure experience that makes queue management easier
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 6 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 6 ? null : 6"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">What happens if the system cannot recognize my face for some reason?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 6 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 6" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                       If the system cannot recognize your face, it will try to scan again. Sometimes, lighting or wearing a mask can interfere with recognition. If it still can’t identify you, a staff member will check your ID or help you register again so you can keep moving through the queue.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 7 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 7 ? null : 7"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">Can the Qwaiting face recognition system manage very large queues, like at airports or big events?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 7 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 7" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                       Yes, Qwaiting's face recognition system can quickly manages large queues at airports and events, ensuring only authorized individuals pass through. It keeps lines moving smoothly, making the waiting experience faster and easier
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 8 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 8 ? null : 8"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">Is the face recognition system easy for first-time users to understand?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 8 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 8" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                       Yes, the face recognition system is easy for first-time users. You just need to stand in front of the camera, and the system will scan your face and quickly match it. It's designed to be easy and clear for all customers, even if you are trying it for the first time.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 9 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 9 ? null : 9"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">How does the face recognition system ensure that my face data is kept secure and private?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 9 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 9" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                       The face recognition system keeps your face data safe and private. It doesn't share your information with anyone else. The system uses strong protections to stop unauthorized users from getting your information. You can trust the system to keep your information safe and protected.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 10 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 10 ? null : 10"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">What will the system do if someone tries to cheat or break the rules?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 10 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 10" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                       If someone tries to cheat, the system instantly detects it—whether it's using a fake photo or video. It blocks access, alerts staff if needed, and asks for manual verification. Persistent attempts are stopped completely, ensuring the process stays fair and safe for everyone. It ensures that only the right people can enter.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 11 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 11 ? null : 11"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">Does face recognition work in low light or crowded environments?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 11 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 11" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                       Yes, modern facial recognition software can be installed at any place where you experience low traffic or high customer flow. It is best suited for industries like Healthcare, Aviation, and banking, which speed up the check-in process and ensure safety.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 12 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 12 ? null : 12"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">Can the system detect duplicate or fake identities?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 12 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 12" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                      Yes, the face recognition system is designed to detect fraudulent attempts, duplicate entries, and fake IDs, preventing unauthorized access effectively.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 13 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 13 ? null : 13"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">Can face recognition be used for attendance management?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 13 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 13" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                      Yes, it can automate attendance in workplaces, events, schools, and universities reducing manual errors and improving efficiency. Many offices use facial check-in softwares already. This works by either scanning the employee's ID card or scanning the iris to record timings and allow entry access.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 14 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 14 ? null : 14"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">Can it detect multiple faces at once?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 14 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 14" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                      Yes. Qwaiting's face identification software supports multi-face detection. This is especially useful in crowd management, group check-ins, or busy environments like banks, airports, and events. By recognizing multiple faces simultaneously, the system speeds up verification, reduces waiting times, and ensures a smooth flow for everyone involved.
                    </p>
                </div>
            </div>
        </div>

        <!-- Question 15 -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <button @click="active = active === 15 ? null : 15"
                class="w-full px-8 py-6 text-left flex items-center justify-between focus:outline-none">
                <span class="text-lg font-bold text-gray-900">How does it handle changes in appearance over time?</span>
                <span class="ml-6 flex-shrink-0">
                    <svg class="h-6 w-6 text-primary transform transition-transform duration-200"
                        :class="{ 'rotate-180': active === 15 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </button>
            <div x-show="active === 15" x-collapse>
                <div class="px-8 pb-8 text-gray-600 leading-relaxed border-t border-gray-50 pt-6">
                    <p>
                      The AI is designed to adapt to natural changes in your appearance, such as aging, new hairstyles, facial hair, or even accessories like glasses. Instead of relying on just one static image, the system continuously learns and updates its recognition patterns over time. This ensures accurate identification, even if you look different from your original photo.
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
</div>