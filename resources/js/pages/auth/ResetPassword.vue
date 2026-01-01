<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthLoginSplitLayout from '@/layouts/auth/AuthLoginSplitLayout.vue';
import { login } from '@/routes';
import { update } from '@/routes/password';
import { Form, Head } from '@inertiajs/vue3';
import { KeyRound, Shield, CheckCircle, Lock } from 'lucide-vue-next';
import { ref } from 'vue';
import logo from '@/assets/images/download.png';

const props = defineProps<{
    token: string;
    email: string;
}>();

const inputEmail = ref(props.email);
</script>

<template>
    <Head title="Reset password" />

    <AuthLoginSplitLayout
        title="Reset password"
        description="Please enter your new password below"
        :show-logo="false"
    >
        <Form
            :action="update()"
            :transform="(data) => ({ ...data, token, email })"
            :reset-on-success="['password', 'password_confirmation']"
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
                        autocomplete="email"
                        v-model="inputEmail"
                        class="w-full"
                        readonly
                    />
                    <InputError :message="errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="password">Password</Label>
                    <Input
                        id="password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        class="w-full"
                        autofocus
                        placeholder="Enter new password"
                        :tabindex="1"
                    />
                    <InputError :message="errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">Confirm Password</Label>
                    <Input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                        class="w-full"
                        placeholder="Confirm your new password"
                        :tabindex="2"
                    />
                    <InputError :message="errors.password_confirmation" />
                </div>

                <button
                    type="submit"
                    :disabled="processing"
                    :tabindex="3"
                    data-test="reset-password-button"
                    class="w-full rounded-lg bg-gradient-to-r from-purple-600 to-purple-700 px-4 py-3 text-sm font-semibold text-white transition-all hover:from-purple-700 hover:to-purple-800 disabled:opacity-50"
                >
                    <span v-if="!processing" class="flex items-center justify-center">
                        Reset password
                    </span>
                    <span v-else class="flex items-center justify-center gap-2">
                        <Spinner />
                        Resetting...
                    </span>
                </button>
            </div>
        </Form>

        <div class="mt-4 text-center text-sm text-gray-600">
            <span>Or, return to </span>
            <TextLink
                :href="login()"
                class="text-purple-600 hover:text-purple-700"
                :tabindex="4"
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
                                <KeyRound class="h-5 w-5 text-purple-600" />
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-sm font-semibold text-gray-900">Enter New Password</h4>
                                <p class="text-sm text-gray-600">Create a strong password for your account.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-purple-100">
                                <Shield class="h-5 w-5 text-purple-600" />
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-sm font-semibold text-gray-900">Confirm Password</h4>
                                <p class="text-sm text-gray-600">Re-enter your password to ensure it's correct.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-purple-100">
                                <Lock class="h-5 w-5 text-purple-600" />
                            </div>
                            <div class="flex-1">
                                <h4 class="mb-1 text-sm font-semibold text-gray-900">Secure Your Account</h4>
                                <p class="text-sm text-gray-600">Your new password will be activated immediately.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Security Tips -->
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-6">
                        <div class="mb-4 flex items-center gap-2">
                            <CheckCircle class="h-5 w-5 text-purple-600" />
                            <h4 class="text-sm font-semibold text-gray-900">Password Tips</h4>
                        </div>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li class="flex items-start gap-2">
                                <span class="mt-1 text-purple-600">•</span>
                                <span>Use at least 8 characters with a mix of letters, numbers, and symbols.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-1 text-purple-600">•</span>
                                <span>Avoid using personal information or common words.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </template>
    </AuthLoginSplitLayout>
</template>
