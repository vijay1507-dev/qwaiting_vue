@extends('website.layout.website')

@section('content')
    <section class="py-32 px-4 sm:px-6 lg:px-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Complete
                        Your</span>
                    <span class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Order</span>
                </h1>
                <p class="text-xl text-gray-600">Please fill in your details to process the order.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                {{-- Checkout Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100">
                        <form id="orderForm" class="space-y-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Contact Information</h2>
                            {{-- Personal Details --}}
                            <div class="grid md:grid-cols-2 gap-6">

                                <div>
                                    <input type="text" id="firstName" name="firstName"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                        placeholder="First Name*">
                                    <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="firstName"></div>
                                </div>
                                <div>
                                    <input type="text" id="lastName" name="lastName"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                        placeholder="Last Name*">
                                    <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="lastName"></div>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <input type="email" id="email" name="email"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                        placeholder="Email*">
                                    <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="email"></div>
                                </div>
                                <div>
                                    <input type="tel" id="phone" name="phone"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                        placeholder="Phone Number*">
                                    <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="phone"></div>
                                </div>
                            </div>

                            <div>
                                <input type="text" id="address" name="address"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                    placeholder="Address*">
                                <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="address"></div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <select id="country" name="country"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none bg-white text-gray-500">
                                        <option value="" disabled selected>Country/Region*</option>
                                        <option value="US">United States</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="CA">Canada</option>
                                        <option value="AU">Australia</option>
                                        <option value="SG">Singapore</option>
                                        <option value="AE">United Arab Emirates</option>
                                    </select>
                                    <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="country"></div>
                                </div>
                                <div>
                                    <input type="text" id="zip" name="zip"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                        placeholder="Postal Code*">
                                    <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="zip"></div>
                                </div>
                            </div>

                            {{-- Credit Card Section --}}
                            <div class="pt-6">
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">Credit Card</h2>
                                <div class="space-y-6">
                                    <div>
                                        <input type="text" id="cardNumber" name="cardNumber"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                            placeholder="Card Number*">
                                        <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="cardNumber"></div>
                                    </div>

                                    <div>
                                        <input type="text" id="cardName" name="cardName"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                            placeholder="Card Holder Name*">
                                        <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="cardName"></div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-6">
                                        <div>
                                            <input type="text" id="expMonth" name="expMonth"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                                placeholder="Expiration Month*">
                                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="expMonth"></div>
                                        </div>
                                        <div>
                                            <input type="text" id="expYear" name="expYear"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                                placeholder="Expiration Year*">
                                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="expYear"></div>
                                        </div>
                                        <div>
                                            <input type="text" id="cvc" name="cvc"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                                                placeholder="Security Code*">
                                            <div class="hidden text-red-500 text-xs font-medium mt-2" data-error="cvc"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-8">
                                <button type="submit" 
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    Place Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 sticky top-24">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Summary</h2>

                        <div id="orderItems" class="space-y-4 mb-6 max-h-96 overflow-y-auto pr-2">
                            {{-- Cart items will be populated here --}}
                            <div class="text-center py-8 text-gray-500">Loading cart...</div>
                        </div>

                        <div class="border-t border-gray-200 pt-6 space-y-4">
                            <div class="flex justify-between items-center text-gray-600">
                                <span>Subtotal</span>
                                <span id="summarySubtotal" class="font-semibold">$0.00</span>
                            </div>
                            <div class="flex justify-between items-center text-gray-600">
                                <span>Tax (Estimated)</span>
                                <span class="font-semibold">$0.00</span>
                            </div>
                            <div
                                class="border-t border-gray-200 pt-4 flex justify-between items-center text-xl font-bold text-gray-900">
                                <span>Total</span>
                                <span id="summaryTotal">$0.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
        <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Frequently
                            Asked</span>
                        <span
                            class="bg-gradient-to-r from-primary to-purple-600 bg-clip-text text-transparent">Questions</span>
                    </h2>
                </div>

                <div class="space-y-6">
                    {{-- FAQ 1 --}}
                    <div
                        class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <button onclick="toggleFaq('faq1')" class="w-full flex items-start justify-between gap-4 text-left">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">Can I plug & play the device? </h3>
                                <div id="faq1" class="text-gray-600 leading-relaxed">
                                    Yes, you can order either offline / online solution .Once you order you will get the
                                    devices within 7 to 8 working days .You can easily plug and play it.
                                </div>
                            </div>
                            <div class="flex-shrink-0 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                    </div>

                    {{-- FAQ 2 --}}
                    <div
                        class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <button onclick="toggleFaq('faq2')" class="w-full flex items-start justify-between gap-4 text-left">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">How Can i Order the solution ?</h3>
                                <div id="faq2" class="text-gray-600 leading-relaxed">
                                    It's very easy to do so. You can customize the selection of the products you want and
                                    then proceed next for the payment . Once you make the payment you will get payment
                                    confirmation and invoice details.
                                </div>
                            </div>
                            <div class="flex-shrink-0 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                    </div>

                    {{-- FAQ 3 --}}
                    <div
                        class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <button onclick="toggleFaq('faq3')" class="w-full flex items-start justify-between gap-4 text-left">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">How soon will I get the delivery?</h3>
                                <div id="faq3" class="text-gray-600 leading-relaxed">
                                    You will get your complete system delivered within 7 to 8 working days from the date of
                                    the payment
                                </div>
                            </div>
                            <div class="flex-shrink-0 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trusted By Section -->
        <div class="trusted-section">
            <h2>Trusted by 65K+ Businesses Worldwide</h2>
            <p>Join the industry leaders who trust Q-Waiting for their queue management</p>

            <div class="trusted-logos">
                <!-- Placeholder for logos using text/icons for now -->
                <div class="logo-item"> <img src="{{ asset('website/asset/images/daleel_alzowar.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/hospital_at_maayo.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/ministry_of_hajj_and_umrah.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/tatapwer_ddl.jpg') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/PSB.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/jtc.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/stuffd.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/a1-business.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/nus-logo.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/dhl-logo.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="{{ asset('website/asset/images/wgs.png') }}" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/HDT_taxi_logo.jpg" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore_Polytechnic_logo.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/skechers-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/healthway-medical.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Loreal.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Nirvana.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NTUC_FairPrice.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry_of_Education.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/msq-logo.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MND-singapore.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/current-corporate-signature.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/MOH.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cropped-BL.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/logo-dark.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/andy-cr-icon.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/cortinawatch.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/subway.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/TianPo.jpg" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/grab.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Inland-Revenue-Authority.png"
                        alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Ministry-of-Manpower.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/NLB.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/ntuc-learning-hub.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Raffles-Medical-Group.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/service-SG.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/SIM-SOC.png" alt=""> </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/Singapore-Medical.png" alt="">
                </div>
                <div class="logo-item"> <img src="https://qwaiting.com/frontimg/clients/apollo_hospoitals.jpg" alt="">
                </div>
            </div>
        </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Detect page refresh and clear cart
            const navigationType = performance.getEntriesByType('navigation')[0]?.type;
            const isRefresh = navigationType === 'reload' || 
                              (typeof performance.navigation !== 'undefined' && performance.navigation.type === 1);
            
            if (isRefresh) {
                // Clear cart on refresh
                localStorage.removeItem('qwaiting_cart');
            }
            
            // Load cart from localStorage
            const cartData = localStorage.getItem('qwaiting_cart');
            const cart = cartData ? JSON.parse(cartData) : [];
            const orderItemsContainer = document.getElementById('orderItems');
            const summarySubtotal = document.getElementById('summarySubtotal');
            const summaryTotal = document.getElementById('summaryTotal');

            // Clear errors when user starts typing
            const form = document.getElementById('orderForm');
            form.querySelectorAll('input, select').forEach(input => {
                input.addEventListener('input', function() {
                    const fieldName = this.name || this.id;
                    const errorDiv = form.querySelector(`[data-error="${fieldName}"]`);
                    if (errorDiv) {
                        errorDiv.textContent = '';
                        errorDiv.classList.add('hidden');
                    }
                    this.classList.remove('border-red-500');
                });
            });

            if (cart.length === 0) {
                orderItemsContainer.innerHTML = '<div class="text-center py-8 text-gray-500">Your cart is empty. <a href="/products" class="text-primary font-semibold hover:underline">Go back to products</a></div>';
                return;
            }

            let subtotal = 0;

            orderItemsContainer.innerHTML = cart.map(item => {
                const total = item.price * item.quantity;
                subtotal += total;

                return `
                        <div class="flex gap-4 items-start">
                            <div class="w-16 h-16 bg-gray-50 rounded-lg flex items-center justify-center flex-shrink-0 border border-gray-100">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-900">${item.name}</h4>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-sm text-gray-500">Qty: ${item.quantity}</span>
                                    <span class="font-semibold text-gray-900">$${total}</span>
                                </div>
                            </div>
                        </div>
                    `;
            }).join('');

            summarySubtotal.textContent = `$${subtotal}`;
            summaryTotal.textContent = `$${subtotal}`; // Add tax calculation if needed

            // Handle form submission
            document.getElementById('orderForm').addEventListener('submit', function (e) {
                e.preventDefault();
                
                const form = e.target;
                const errors = {};
                let hasErrors = false;

                // Clear all previous errors
                form.querySelectorAll('[data-error]').forEach(errorDiv => {
                    errorDiv.textContent = '';
                    errorDiv.classList.add('hidden');
                });

                // Remove error border classes from all inputs
                form.querySelectorAll('input, select').forEach(input => {
                    input.classList.remove('border-red-500');
                });

                // Validate First Name
                const firstName = form.querySelector('#firstName').value.trim();
                if (!firstName) {
                    errors.firstName = 'Please fill in this field.';
                    hasErrors = true;
                }

                // Validate Last Name
                const lastName = form.querySelector('#lastName').value.trim();
                if (!lastName) {
                    errors.lastName = 'Please fill in this field.';
                    hasErrors = true;
                }

                // Validate Email
                const email = form.querySelector('#email').value.trim();
                if (!email) {
                    errors.email = 'Please fill in this field.';
                    hasErrors = true;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    errors.email = 'Please enter a valid email address.';
                    hasErrors = true;
                }

                // Validate Phone
                const phone = form.querySelector('#phone').value.trim();
                if (!phone) {
                    errors.phone = 'Please fill in this field.';
                    hasErrors = true;
                }

                // Validate Address
                const address = form.querySelector('#address').value.trim();
                if (!address) {
                    errors.address = 'Please fill in this field.';
                    hasErrors = true;
                }

                // Validate Country
                const country = form.querySelector('#country').value;
                if (!country) {
                    errors.country = 'Please select a country.';
                    hasErrors = true;
                }

                // Validate Zip Code
                const zip = form.querySelector('#zip').value.trim();
                if (!zip) {
                    errors.zip = 'Please fill in this field.';
                    hasErrors = true;
                }

                // Validate Card Number
                const cardNumber = form.querySelector('#cardNumber').value.trim();
                if (!cardNumber) {
                    errors.cardNumber = 'Please fill in this field.';
                    hasErrors = true;
                } else if (!/^\d{13,19}$/.test(cardNumber.replace(/\s/g, ''))) {
                    errors.cardNumber = 'Please enter a valid card number.';
                    hasErrors = true;
                }

                // Validate Card Holder Name
                const cardName = form.querySelector('#cardName').value.trim();
                if (!cardName) {
                    errors.cardName = 'Please fill in this field.';
                    hasErrors = true;
                }

                // Validate Expiration Month
                const expMonth = form.querySelector('#expMonth').value.trim();
                if (!expMonth) {
                    errors.expMonth = 'Please fill in this field.';
                    hasErrors = true;
                } else if (!/^(0[1-9]|1[0-2])$/.test(expMonth)) {
                    errors.expMonth = 'Please enter a valid month (01-12).';
                    hasErrors = true;
                }

                // Validate Expiration Year
                const expYear = form.querySelector('#expYear').value.trim();
                if (!expYear) {
                    errors.expYear = 'Please fill in this field.';
                    hasErrors = true;
                } else if (!/^\d{4}$/.test(expYear) || parseInt(expYear) < new Date().getFullYear()) {
                    errors.expYear = 'Please enter a valid year.';
                    hasErrors = true;
                }

                // Validate CVC
                const cvc = form.querySelector('#cvc').value.trim();
                if (!cvc) {
                    errors.cvc = 'Please fill in this field.';
                    hasErrors = true;
                } else if (!/^\d{3,4}$/.test(cvc)) {
                    errors.cvc = 'Please enter a valid security code.';
                    hasErrors = true;
                }

                // Display errors
                if (hasErrors) {
                    Object.keys(errors).forEach(fieldName => {
                        const errorDiv = form.querySelector(`[data-error="${fieldName}"]`);
                        const input = form.querySelector(`#${fieldName}`);
                        
                        if (errorDiv) {
                            errorDiv.textContent = errors[fieldName];
                            errorDiv.classList.remove('hidden');
                        }
                        
                        if (input) {
                            input.classList.add('border-red-500');
                        }
                    });
                    return;
                }

                // If no errors, proceed with submission
                alert('Thank you for your order! This is a demo integration.');
                localStorage.removeItem('qwaiting_cart');
                window.location.href = '/products';
            });
        });

        // FAQ Toggle Function
        function toggleFaq(faqId) {
            const faqElement = document.getElementById(faqId);
            if (faqElement.style.display === 'none' || faqElement.style.display === '') {
                faqElement.style.display = 'block';
            } else {
                faqElement.style.display = 'none';
            }
        }
    </script>
@endsection