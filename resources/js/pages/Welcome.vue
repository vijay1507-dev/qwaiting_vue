<script setup lang="ts">
import { dashboard, login } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';
import logo from '@/assets/images/download.png';
</script>

<template>
    <Head title="Welcome to Qwaiting" />
    <div
        class="flex min-h-screen flex-col items-center justify-center bg-background p-6 dark:bg-background"
    >
        <header
            class="absolute top-0 right-0 p-6 w-full flex justify-end"
        >
            <nav class="flex items-center gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="dashboard()"
                    class="inline-block rounded-sm border border-border px-5 py-1.5 text-sm leading-normal hover:bg-accent"
                >
                    Dashboard
                </Link>
                    <Link
                    v-else
                        :href="login()"
                    class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal hover:border-border"
                    >
                        Log in
                    </Link>
            </nav>
        </header>
        
        <div class="flex flex-col items-center gap-6">
            <img 
                :src="logo" 
                alt="Qwaiting CRM Logo" 
                class="size-24 object-contain" 
            />
            <h1 class="text-4xl font-bold text-foreground">
                Welcome to Qwaiting CRM
            </h1>
        </div>
    </div>
</template>
