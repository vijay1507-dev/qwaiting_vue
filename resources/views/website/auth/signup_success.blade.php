@extends('website.layout.website')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-3xl shadow-xl text-center">
        <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-6">
            <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
            {{ $headerMessage ?? 'Payment Successful!' }}
        </h2>

        <p class="mt-2 text-sm text-gray-600">
            {{ $bodyMessage ?? 'Thank you for signing up. Your account has been activated successfully.' }}
        </p>

        <p class="mt-4 text-xs text-gray-500">
            Redirecting to your dashboard in <span id="countdown">5</span> seconds...
        </p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const redirectUrl = "{{ $redirectUrl ?? route('website-login') }}";
        let seconds = 5;
        const countdownElement = document.getElementById('countdown');

        const interval = setInterval(function() {
            seconds--;
            if (countdownElement) {
                countdownElement.textContent = seconds;
            }

            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = redirectUrl;
            }
        }, 1000);
    });
</script>
@endsection