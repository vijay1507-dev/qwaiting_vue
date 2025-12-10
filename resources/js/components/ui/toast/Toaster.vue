<script setup lang="ts">
import { useToast } from '@/composables/useToast';
import Toast from './Toast.vue';

const { toasts, removeToast } = useToast();
</script>

<template>
    <Teleport to="body">
        <div
            class="fixed top-4 right-4 z-[9999] flex flex-col gap-3 pointer-events-none"
        >
            <TransitionGroup
                name="toast"
                tag="div"
                class="flex flex-col gap-3"
            >
                <div
                    v-for="toast in toasts"
                    :key="toast.id"
                    class="pointer-events-auto"
                >
                    <Toast
                        :toast="toast"
                        @close="removeToast"
                    />
                </div>
            </TransitionGroup>
        </div>
    </Teleport>
</template>

<style scoped>
.toast-enter-active,
.toast-leave-active {
    transition: all 0.3s ease;
}

.toast-enter-from {
    opacity: 0;
    transform: translateY(-10px) scale(0.95);
}

.toast-leave-to {
    opacity: 0;
    transform: translateX(100%) scale(0.95);
}

.toast-move {
    transition: transform 0.3s ease;
}
</style>

