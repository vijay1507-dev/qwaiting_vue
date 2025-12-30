<script setup lang="ts">
import { ref } from 'vue';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthLoginSplitLayout from '@/layouts/auth/AuthLoginSplitLayout.vue';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import { Form, Head } from '@inertiajs/vue3';
import { Eye, EyeOff } from 'lucide-vue-next';

defineProps<{
    status?: string;
    canResetPassword: boolean;
    canRegister: boolean;
}>();

const showPassword = ref(false);

const togglePasswordVisibility = () => {
    showPassword.value = !showPassword.value;
};
</script>

<template>
    <Head title="Log in" />

    <AuthLoginSplitLayout
        title="Login to Dashboard"
        description="Fill the below form to login."
        :show-logo="true"
    >
        <div
            v-if="status"
            class="mb-4 text-center text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <Form
            :action="store()"
            :reset-on-success="['password']"
            v-slot="{ errors, processing }"
            class="flex flex-col gap-6"
        >
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="email">Email</Label>
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

                <div class="grid gap-2">
                    <Label for="password">Password</Label>
                    <div class="relative">
                        <Input
                            id="password"
                            :type="showPassword ? 'text' : 'password'"
                            name="password"
                            required
                            :tabindex="2"
                            autocomplete="current-password"
                            placeholder="Enter Password"
                            class="w-full pr-10"
                        />
                        <button
                            type="button"
                            @click="togglePasswordVisibility"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
                        >
                            <Eye v-if="!showPassword" class="h-5 w-5" />
                            <EyeOff v-else class="h-5 w-5" />
                        </button>
                    </div>
                    <InputError :message="errors.password" />
                </div>

                <div class="flex items-center justify-end">
                    <TextLink
                        v-if="canResetPassword"
                        :href="request()"
                        class="text-sm text-purple-600 hover:text-purple-700"
                        :tabindex="5"
                    >
                        Forget Password?
                    </TextLink>
                </div>

                <button
                    type="submit"
                    :disabled="processing"
                    :tabindex="4"
                    data-test="login-button"
                    class="w-full rounded-lg bg-gradient-to-r from-purple-600 to-purple-700 px-4 py-3 text-sm font-semibold text-white transition-all hover:from-purple-700 hover:to-purple-800 disabled:opacity-50"
                >
                    <span v-if="!processing" class="flex items-center justify-center">
                        Login
                    </span>
                    <span v-else class="flex items-center justify-center gap-2">
                        <Spinner />
                        Logging in...
                    </span>
                </button>
            </div>
        </Form>
    </AuthLoginSplitLayout>
</template>
