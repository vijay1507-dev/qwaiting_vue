import { ref } from 'vue';

export interface Toast {
    id: string;
    type: 'success' | 'error' | 'warning' | 'info';
    message: string;
    duration?: number;
}

const toasts = ref<Toast[]>([]);

export const useToast = () => {
    const addToast = (toast: Omit<Toast, 'id'>) => {
        const id = Date.now().toString() + Math.random().toString(36).substr(2, 9);
        const newToast: Toast = {
            ...toast,
            id,
            duration: toast.duration || 5000,
        };
        
        toasts.value.push(newToast);
        
        // Auto remove after duration
        if (newToast.duration > 0) {
            setTimeout(() => {
                removeToast(id);
            }, newToast.duration);
        }
        
        return id;
    };
    
    const removeToast = (id: string) => {
        const index = toasts.value.findIndex(t => t.id === id);
        if (index > -1) {
            toasts.value.splice(index, 1);
        }
    };
    
    const success = (message: string, duration?: number) => {
        return addToast({ type: 'success', message, duration });
    };
    
    const error = (message: string, duration?: number) => {
        return addToast({ type: 'error', message, duration });
    };
    
    const warning = (message: string, duration?: number) => {
        return addToast({ type: 'warning', message, duration });
    };
    
    const info = (message: string, duration?: number) => {
        return addToast({ type: 'info', message, duration });
    };
    
    return {
        toasts,
        addToast,
        removeToast,
        success,
        error,
        warning,
        info,
    };
};

