@extends('website.layout.website')

@section('title', 'Request a Demo - Q-Waiting')
@section('meta_description', 'Request a personalized demo of Q-Waiting queue management system. See how we can help you improve customer experience.')

@section('content')
    <div class="demo-request-container">
        

        <div class="form-wrapper">
            <div class="form-header">
                <h1>Request a Demo now</h1>
                <p>Join us today and revolutionize your queue management</p>
            </div>

            <div class="form-body">
                @if(isset($successMessage))
                    <div class="success-message">
                        <div class="success-icon">✓</div>
                        <div>{{ $successMessage }}</div>
                    </div>
                @endif

                <form wire:submit.prevent="submit">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                Full Name <span class="required">*</span>
                            </label>
                            <input type="text" wire:model.blur="full_name"
                                class="form-input @error('full_name') error @enderror" placeholder="Enter your full name">
                            @error('full_name')
                                <span class="error-message">⚠ {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Phone Number <span class="required">*</span>
                            </label>
                            <input type="tel" wire:model.blur="phone_number"
                                class="form-input @error('phone_number') error @enderror" placeholder="Enter phone number">
                            @error('phone_number')
                                <span class="error-message">⚠ {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Company Name <span class="required">*</span>
                            </label>
                            <input type="text" wire:model.blur="company_name"
                                class="form-input @error('company_name') error @enderror" placeholder="Enter company name">
                            @error('company_name')
                                <span class="error-message">⚠ {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Company Email <span class="required">*</span>
                            </label>
                            <input type="email" wire:model.blur="company_email"
                                class="form-input @error('company_email') error @enderror" placeholder="name@company.com">
                            @error('company_email')
                                <span class="error-message">⚠ {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">
                                Message
                            </label>
                            <textarea wire:model.blur="message" class="form-textarea @error('message') error @enderror"
                                placeholder="Tell us about your requirements..."></textarea>
                            @error('message')
                                <span class="error-message">⚠ {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <div class="checkbox-group">
                                <input type="checkbox" wire:model="agree_to_terms" id="agree" class="checkbox-input">
                                <label for="agree" class="checkbox-label">
                                    I agree to the <a href="#" class="text-purple-600 hover:underline">Terms and
                                        Conditions</a> and <a href="#" class="text-purple-600 hover:underline">Privacy
                                        Policy</a>.
                                </label>
                            </div>
                            @error('agree_to_terms')
                                <span class="error-message">⚠ {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group full-width">
                            <button type="submit" class="submit-button" :disabled="$wire.isSubmitting"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove>Request Demo</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="contact-info-section">
            <div class="contact-card">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3>Global Offices</h3>

                <div class="office-group">
                    <h4><img src="{{ asset('website/asset/images/usa-flag.jpg') }}" alt=""> USA</h4>
                    <p>305, 3110 Main St building 2 Santa Monica, California 90405</p>
                    <a href="tel:+18584086017" class="phone-link">+1 858 408 6017</a>
                </div>

                <div class="office-group">
                    <h4><img src="{{ asset('website/asset/images/singapore.jpg') }}" alt=""> Singapore</h4>
                    <p>3 Raffles Place #08-01B, Bharat Building Singapore 048617</p>
                    <a href="tel:+6569099163" class="phone-link">+65 6909 9163</a>
                </div>
            </div>

            <div class="contact-card">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3>Regional Offices</h3>

                <div class="office-group">
                    <h4><img src="{{ asset('website/asset/images/saudi-arabia.png') }}" alt=""> Saudi Arabia</h4>
                    <p>Al Urubah Rd, As Sullmanlyah, Riyadh 11564</p>
                    <a href="tel:+966551160974" class="phone-link">+966 55 116 0974</a>
                </div>

                <div class="office-group">
                    <h4><img src="{{ asset('website/asset/images/indian-flag.svg') }}" alt=""> India</h4>
                    <p>Plot No. D-151, Phase 8, Industrial Area, Mohali Punjab</p>
                    <a href="tel:+919417035046" class="phone-link">+91 941 703 5046</a>
                </div>

                <div class="office-group">
                    <h4><img src="{{ asset('website/asset/images/united-arab-emirates.png') }}" alt=""> Dubai</h4>
                    <p>Level 32/3202. Marina Plaza, Dubai Marina</p>
                    <a href="tel:+97143408962" class="phone-link">+971 4 340 8962</a>
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div class="contact-info-section">
            <div class="contact-card">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3>Email Us</h3>
                <p class="email-text">For general inquiries and support</p>
                <a href="mailto:info@qwaiting.com" class="email-link">info@qwaiting.com</a>
            </div>
        </div>



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

    </div>
@endsection
