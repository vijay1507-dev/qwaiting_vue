<form action="#" method="POST" class="w-full">
    @csrf
    
    <div class="grid md:grid-cols-2 gap-6 mb-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
            <input type="text" name="name" required
                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition-all"
                placeholder="John Doe">
        </div>
        
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Company Email *</label>
            <input type="email" name="email" required
                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition-all"
                placeholder="john@company.com">
        </div>
        
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
            <input type="tel" name="phone" required
                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition-all"
                placeholder="+1 (555) 000-0000">
        </div>
        
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Company Name *</label>
            <input type="text" name="company" required
                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition-all"
                placeholder="Company Ltd">
        </div>
    </div>

    <div class="mb-8">
        <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
        <textarea name="message" rows="4"
            class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-primary focus:outline-none transition-all"
            placeholder="Tell us about your requirements..."></textarea>
    </div>

    <button type="submit"
        class="w-full py-4 bg-primary text-white rounded-xl font-bold text-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
        <span>Request Demo</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
        </svg>
    </button>
</form>
