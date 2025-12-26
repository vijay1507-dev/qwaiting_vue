<script setup lang="ts">
import { ref, onMounted } from 'vue';

const showBanner = ref(false);
const isProcessing = ref(false);

const getCookieValue = (name: string): string | null => {
    if (typeof document === 'undefined') {
        return null;
    }
    
    const nameEQ = name + '=';
    const cookies = document.cookie.split(';');
    
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nameEQ) === 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    
    return null;
};

const getStoredConsent = (): string | null => {
    // Use localStorage as primary storage (more reliable)
    if (typeof localStorage !== 'undefined') {
        const stored = localStorage.getItem('cookie_consent');
        if (stored) {
            return stored;
        }
    }
    
    // Fallback to cookie if localStorage doesn't have it
    const cookieConsent = getCookieValue('cookie_consent');
    if (cookieConsent) {
        // Sync to localStorage if found in cookie but not in localStorage
        if (typeof localStorage !== 'undefined') {
            localStorage.setItem('cookie_consent', cookieConsent);
        }
        return cookieConsent;
    }
    
    return null;
};

const checkCookieConsent = () => {
    const consent = getStoredConsent();
    
    // Only show banner if consent doesn't exist or is empty
    if (!consent || consent.trim() === '') {
        showBanner.value = true;
    } else {
        // Consent exists, don't show banner
        showBanner.value = false;
    }
};

const setCookie = (name: string, value: string, days: number) => {
    // Store in localStorage first (primary storage)
    if (typeof localStorage !== 'undefined') {
        localStorage.setItem(name, value);
    }
    
    // Also set cookie for server-side access
    if (typeof document !== 'undefined') {
        const maxAge = days * 24 * 60 * 60; // Convert days to seconds (86400 seconds = 1 day)
        // Set cookie with explicit path and sameSite attributes
        document.cookie = `${name}=${value};path=/;max-age=${maxAge};SameSite=Lax`;
    }
};

const submitConsent = async (accepted: boolean) => {
    isProcessing.value = true;
    
    try {
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const value = accepted ? 'accepted' : 'declined';
        
        // Set cookie client-side immediately with 1 day expiration
        setCookie('cookie_consent', value, 1);
        
        // Hide banner immediately after setting cookie
        showBanner.value = false;
        
        // Also send to server for persistence (fire and forget)
        fetch('/cookie-consent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token || '',
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
            body: JSON.stringify({
                accepted: accepted,
            }),
        }).catch((error) => {
            console.error('Error sending cookie consent to server:', error);
            // Don't show banner again if server fails - cookie is already set client-side
        });
    } catch (error) {
        console.error('Error submitting cookie consent:', error);
    } finally {
        isProcessing.value = false;
    }
};

const acceptCookies = () => {
    submitConsent(true);
};

const declineCookies = () => {
    submitConsent(false);
};

onMounted(() => {
    checkCookieConsent();
});
</script>

<template>
    <Transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="translate-y-full opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition duration-300 ease-in"
        leave-from-class="translate-y-0 opacity-100"
        leave-to-class="translate-y-full opacity-0"
    >
        <div
            v-if="showBanner"
            class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-gray-200 shadow-2xl p-4 md:p-6"
        >
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div class="flex-1">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 mt-1">
                            <svg
                                class="w-6 h-6 text-primary"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                                />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                We use cookies
                            </h3>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. 
                                By clicking "Accept All", you consent to our use of cookies. 
                                <a
                                    href="/privacy-policy"
                                    class="text-primary hover:underline font-medium"
                                >
                                    Learn more
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <button
                        @click="declineCookies"
                        :disabled="isProcessing"
                        class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Decline
                    </button>
                    <button
                        @click="acceptCookies"
                        :disabled="isProcessing"
                        class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white rounded-lg hover:opacity-90 transition-all duration-300 shadow-lg hover:shadow-xl whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed"
                        style="background: linear-gradient(to right, #5c4ae4, #7c3aed);"
                    >
                        <span v-if="!isProcessing">Accept All</span>
                        <span v-else class="flex items-center gap-2">
                            <svg
                                class="animate-spin h-4 w-4 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                />
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                />
                            </svg>
                            Processing...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </Transition>
</template>

