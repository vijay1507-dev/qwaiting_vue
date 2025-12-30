<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthLoginSplitLayout from '@/layouts/auth/AuthLoginSplitLayout.vue';
import { login } from '@/routes';
import { email } from '@/routes/password';
import { Form, Head } from '@inertiajs/vue3';
import { Mail, Shield, Clock, CheckCircle } from 'lucide-vue-next';
import logo from '@/assets/images/download.png';

defineProps<{
    status?: string;
}>();
</script>

<template>
    <Head title="Forgot password" />

    <AuthLoginSplitLayout
        title="Forgot password"
        description="Enter your email to receive a password reset link"
        :show-logo="false"
    >
        <div
            v-if="status"
            class="mb-4 text-center text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <Form
            :action="email()"
            v-slot="{ errors, processing }"
            class="flex flex-col gap-6"
        >
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="email">Email address</Label>
                    <Input
                        id="email"
                        type="email"
                        name="email"
                        required
                        autofocus
                        :tabindex="1"
                        autocomplete="email"
                        placeholder="Enter email address"
                        class="w-full"
                    />
                    <InputError :message="errors.email" />
                </div>

                <button
                    type="submit"
                    :disabled="processing"
                    :tabindex="2"
                    data-test="email-password-reset-link-button"
                    class="w-full rounded-lg bg-gradient-to-r from-purple-600 to-purple-700 px-4 py-3 text-sm font-semibold text-white transition-all hover:from-purple-700 hover:to-purple-800 disabled:opacity-50"
                >
                    <span v-if="!processing" class="flex items-center justify-center">
                        Email password reset link
                    </span>
                    <span v-else class="flex items-center justify-center gap-2">
                        <Spinner />
                        Sending...
                    </span>
                </button>
            </div>
        </Form>

        <div class="mt-4 text-center text-sm text-gray-600">
            <span>Or, return to </span>
            <TextLink
                :href="login()"
                class="text-purple-600 hover:text-purple-700"
                :tabindex="3"
            >
                log in
            </TextLink>
        </div>

        <template #right-side>
            <div class="rounded-2xl bg-white shadow-2xl overflow-hidden">
                <div class="p-8">
                    <!-- Logo -->
                    <div class="mb-8 flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-600">
                            <img :src="logo" alt="Logo" />
                        </div>
                        <span class="text-xl font-semibold text-gray-900">Qwaiting CRM</span>
                    </div>

                  

                    <!-- Steps -->
                    <div class="mb-8 space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-purple-100">
                                <Mail class="h-5 w-5 text-purple-600" />
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-sm font-semibold text-gray-900">Enter Your Email</h4>
                                <p class="text-sm text-gray-600">Provide the email address associated with your account.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-purple-100">
                                <Shield class="h-5 w-5 text-purple-600" />
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-sm font-semibold text-gray-900">Check Your Inbox</h4>
                                <p class="text-sm text-gray-600">We'll send you a secure password reset link via email.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-purple-100">
                                <Clock class="h-5 w-5 text-purple-600" />
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-sm font-semibold text-gray-900">Reset Your Password</h4>
                                <p class="text-sm text-gray-600">Click the link in the email to create a new password.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Security Tips -->
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-6">
                        <div class="mb-4 flex items-center gap-2">
                            <CheckCircle class="h-5 w-5 text-purple-600" />
                            <h4 class="text-sm font-semibold text-gray-900">Security Tips</h4>
                        </div>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-start gap-2">
                                <span class="mt-1 text-purple-600">•</span>
                                <span>The reset link expires in 60 minutes for security.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1 text-purple-600">•</span>
                                <span>If you don't receive an email, check your spam folder.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </template>
    </AuthLoginSplitLayout>
</template>
