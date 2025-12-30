<script setup lang="ts">
import logo from '@/assets/images/download.png';

defineProps<{
    title?: string;
    description?: string;
    showLogo?: boolean;
}>();
</script>

<template>
    <div class="grid h-screen w-full grid-cols-1 lg:grid-cols-2">
        <!-- Left Side: Login Form -->
        <div class="flex items-center justify-center bg-white p-8 lg:p-12">
            <div class="w-full max-w-md">
                <!-- Logo -->
                <div v-if="showLogo === true" class="mb-8 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-600">
                        <img :src="logo" alt="Logo" />
                    </div>
                    <span class="text-xl font-semibold text-gray-900">Qwaiting CRM</span>
                </div>

                <!-- Title -->
                <h1 class="mb-2 text-3xl font-bold text-gray-900">{{ title || 'Login to Dashboard' }}</h1>
                <p class="mb-8 text-sm text-gray-600">{{ description || 'Fill the below form to login.' }}</p>

                <!-- Slot for form content -->
                <slot />
            </div>
        </div>

        <!-- Right Side: Custom Content or Default Dashboard Preview -->
        <div class="hidden lg:flex items-center justify-center bg-gradient-to-br from-purple-50 to-purple-100 p-8">
            <div class="w-full max-w-4xl">
                <slot name="right-side">
                    <!-- Default Dashboard Preview -->
                    <div class="rounded-2xl bg-white shadow-2xl overflow-hidden">
                        <!-- Dashboard Content -->
                        <div class="flex">
                            <!-- Sidebar -->
                            <div class="w-64 border-r border-gray-200 bg-gray-50 p-4">
                                <!-- Logo -->
                                <div class="mb-8 flex items-center gap-2">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-purple-600">
                                        <img :src="logo" alt="Logo" />
                                    </div>
                                    <span class="text-md font-semibold text-gray-900">Qwaiting CRM</span>
                                </div>

                                <nav class="space-y-1">
                                    <a href="#" class="flex items-center gap-3 rounded-lg bg-purple-100 px-3 py-2 text-sm font-medium text-purple-700">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Dashboard
                                    </a>
                                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        Clients
                                    </a>
                                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Marketing
                                    </a>
                                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        E-Commerce
                                    </a>
                                    <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Reports Management
                                    </a>
                                </nav>
                            </div>

                            <!-- Main Content -->
                            <div class="flex-1 p-6">
                                <div class="mb-6">
                                    <h3 class="mb-1 text-xl font-semibold text-gray-900">Welcome to Dashboard</h3>
                                    <p class="text-sm text-gray-600">Please define your project structures before start creating Pour sessions.</p>
                                </div>

                                <!-- Summary Cards -->
                                <div class="mb-6 grid grid-cols-2 gap-4">
                                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
                                        <p class="mb-1 text-sm text-gray-600">Total Revenue</p>
                                        <p class="text-2xl font-bold text-gray-900">$2,547</p>
                                    </div>
                                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">
                                        <p class="mb-1 text-sm text-gray-600">Conversion Rate</p>
                                        <p class="text-2xl font-bold text-gray-900">24.8%</p>
                                    </div>
                                </div>

                                <!-- Calendar Preview -->
                                <div class="rounded-lg border border-gray-200 bg-white p-4">
                                    <div class="mb-4 flex items-center justify-between">
                                        <h4 class="font-semibold text-gray-900">Recent Activities</h4>
                                    </div>
                                    <div class="mt-2 space-y-2">
                                        <div class="flex items-start gap-3 rounded-lg border border-border bg-muted/30 p-3"><div class="text-blue-600 mt-0.5 flex size-8 shrink-0 items-center justify-center rounded-lg bg-background"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon size-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div><div class="flex-1 min-w-0"><p class="text-sm font-medium text-foreground">New lead: Billy James</p><p class="mt-0.5 text-xs text-muted-foreground">SentinelSecure - $10,000</p><p class="mt-1 text-xs text-muted-foreground">2 minutes ago</p></div></div>

                                        <div class="flex items-start gap-3 rounded-lg border border-border bg-muted/30 p-3"><div class="text-orange-600 mt-0.5 flex size-8 shrink-0 items-center justify-center rounded-lg bg-background"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-icon size-4"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg></div><div class="flex-1 min-w-0"><p class="text-sm font-medium text-foreground">Meeting scheduled</p><p class="mt-0.5 text-xs text-muted-foreground">Demo call with ShieldGuard Security</p><p class="mt-1 text-xs text-muted-foreground">2 hours ago</p></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </slot>
            </div>
        </div>
    </div>
</template>

