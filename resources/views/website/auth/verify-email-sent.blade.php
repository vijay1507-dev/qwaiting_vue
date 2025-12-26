<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email - Qwaiting</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-slate-100">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-lg w-full">

            <!-- Main Card -->
            <div class="bg-white rounded-3xl shadow-2xl shadow-slate-200/50 p-10 text-center border border-slate-100">
                <!-- Animated Email Icon -->
                <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-2xl bg-gradient-to-br from-[#7C69EF] to-[#9B8AF5] mb-8 shadow-lg shadow-[#7C69EF]/20">
                    <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-slate-900 mb-3 tracking-tight">Check Your Email</h1>
                
                <!-- Message -->
                <p class="text-slate-600 mb-2 text-lg">
                    We've sent a verification link to
                </p>
                <p class="text-[#7C69EF] font-semibold text-lg mb-8 break-all">
                    {{ $email ?? 'your email address' }}
                </p>
                
                <!-- Info Box -->
                <div class="bg-gradient-to-r from-[#7C69EF]/5 to-[#9B8AF5]/5 border border-[#7C69EF]/10 rounded-2xl p-5 mb-8">
                    <p class="text-slate-700 text-sm leading-relaxed">
                        Click the verification link in your email to continue with your signup. 
                        <span class="font-semibold text-slate-900">The link expires in 60 minutes.</span>
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <button id="resend-email-btn" class="w-full px-6 py-4 bg-gradient-to-r from-[#7C69EF] to-[#9B8AF5] hover:from-[#6B5BDF] hover:to-[#8B7AE5] text-white font-semibold rounded-xl transition-all duration-200 shadow-lg shadow-[#7C69EF]/25 hover:shadow-xl hover:shadow-[#7C69EF]/30 transform hover:-translate-y-0.5">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Resend Verification Email
                        </span>
                    </button>
                </div>

                <!-- Status Message -->
                <div id="status-message" class="hidden mt-6 p-4 rounded-xl text-sm font-medium"></div>
            </div>

            <!-- Footer Help Text -->
            <div class="mt-8 text-center">
                <p class="text-sm text-slate-500">
                    Need help? 
                    <a href="mailto:support@qwaiting.com" class="text-[#7C69EF] hover:text-[#6B5BDF] font-medium transition-colors">Contact Support</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#resend-email-btn').on('click', function() {
                const $btn = $(this);
                const $statusMsg = $('#status-message');
                
                $btn.prop('disabled', true).text('Sending...');
                $statusMsg.addClass('hidden');

                $.ajax({
                    url: '/signup/resend-verification',
                    method: 'POST',
                    data: {
                        email: '{{ $email ?? '' }}',
                        lead_id: '{{ $leadId ?? '' }}'
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    },
                    success: function(data) {
                        if (data.success) {
                            $statusMsg.removeClass('hidden bg-red-50 border-red-200 text-red-700')
                                .addClass('bg-green-50 border border-green-200 text-green-700')
                                .html('<div class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Verification email sent successfully! Please check your inbox.</span></div>');
                        } else {
                            $statusMsg.removeClass('hidden bg-green-50 border-green-200 text-green-700')
                                .addClass('bg-red-50 border border-red-200 text-red-700')
                                .html('<div class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg><span>' + (data.message || 'Failed to send verification email. Please try again.') + '</span></div>');
                        }
                    },
                    error: function(xhr) {
                        const errorData = xhr.responseJSON || {};
                        $statusMsg.removeClass('hidden bg-green-50 border-green-200 text-green-700')
                            .addClass('bg-red-50 border border-red-200 text-red-700')
                            .html('<div class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg><span>' + (errorData.message || 'Failed to send verification email. Please try again.') + '</span></div>');
                    },
                    complete: function() {
                        $btn.prop('disabled', false).text('Resend Verification Email');
                    }
                });
            });

            // Note: Cross-tab communication removed - only the tab where verification link is clicked will redirect
        });
    </script>
</body>
</html>

