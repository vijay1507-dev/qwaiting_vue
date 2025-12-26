import { createApp } from 'vue';
import CookieBanner from './components/CookieBanner.vue';

document.addEventListener('DOMContentLoaded', () => {
    const cookieBannerContainer = document.getElementById('cookie-banner-container');
    
    if (cookieBannerContainer) {
        createApp(CookieBanner).mount(cookieBannerContainer);
    }
});

