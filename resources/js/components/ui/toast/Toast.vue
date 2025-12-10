<script setup lang="ts">
import { computed } from 'vue';
import { X, CheckCircle2, AlertCircle, Info, AlertTriangle } from 'lucide-vue-next';
import type { Toast } from '@/composables/useToast';

interface Props {
    toast: Toast;
}

const props = defineProps<Props>();

const emit = defineEmits<{
    close: [id: string];
}>();

const icon = computed(() => {
    switch (props.toast.type) {
        case 'success':
            return CheckCircle2;
        case 'error':
            return AlertCircle;
        case 'warning':
            return AlertTriangle;
        case 'info':
            return Info;
        default:
            return Info;
    }
});

const colorClasses = computed(() => {
    switch (props.toast.type) {
        case 'success':
            return {
                border: 'bg-green-500',
                iconBg: 'bg-green-500',
                iconText: 'text-white',
                message: 'text-foreground',
            };
        case 'error':
            return {
                border: 'bg-red-500',
                iconBg: 'bg-red-500',
                iconText: 'text-white',
                message: 'text-foreground',
            };
        case 'warning':
            return {
                border: 'bg-yellow-500',
                iconBg: 'bg-yellow-500',
                iconText: 'text-white',
                message: 'text-foreground',
            };
        case 'info':
            return {
                border: 'bg-blue-500',
                iconBg: 'bg-blue-500',
                iconText: 'text-white',
                message: 'text-foreground',
            };
        default:
            return {
                border: 'bg-blue-500',
                iconBg: 'bg-blue-500',
                iconText: 'text-white',
                message: 'text-foreground',
            };
    }
});

const handleClose = () => {
    emit('close', props.toast.id);
};
</script>

<template>
    <div
        class="relative flex items-start gap-3 rounded-lg bg-white dark:bg-gray-900 shadow-lg p-4 min-w-[320px] max-w-[420px] animate-in slide-in-from-top-5 fade-in-0"
    >
        <!-- Left Border Accent -->
        <div class="absolute left-0 top-0 bottom-0 w-1 rounded-l-lg" :class="colorClasses.border"></div>
        
        <!-- Icon -->
        <div class="flex-shrink-0">
            <div class="flex items-center justify-center rounded-full p-1.5" :class="colorClasses.iconBg">
                <component :is="icon" class="size-4" :class="colorClasses.iconText" />
            </div>
        </div>
        
        <!-- Content -->
        <div class="flex-1 min-w-0">
            <p class="text-sm" :class="colorClasses.message">
                {{ toast.message }}
            </p>
        </div>
        
        <!-- Close Button -->
        <button
            @click="handleClose"
            type="button"
            class="flex-shrink-0 rounded-full p-1 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors cursor-pointer"
            aria-label="Close notification"
        >
            <X class="size-4 text-muted-foreground" />
        </button>
    </div>
</template>

