@extends('website.layout.website')

@section('title', 'Sign Up - Q-Waiting')
@section('meta_description', 'Sign up for Q-Waiting and revolutionize your queue management system. Join thousands of businesses already using our platform.')

@section('content')
    <div class="signup-form-container">


        <div class="form-wrapper">
            <div class="form-header">
                <h1>Create 14 days free Account</h1>
                <p>Create Account In 30 Seconds.</p>
            </div>

            <div class="form-body">
                <form action="#" method="POST">
                    <div class="form-grid">
                        <!-- Row 1 -->
                        <div class="form-group">
                            <input type="text" name="full_name" required class="form-input" placeholder="Full Name">
                        </div>

                        <div class="form-group">
                            <input type="text" name="company_name" required class="form-input" placeholder="Company Name">
                        </div>

                        <!-- Row 2 -->
                        <div class="form-group">
                            <input type="email" name="email" required class="form-input"
                                placeholder="Enter your company email">
                        </div>

                        <div class="form-group">
                            <div class="phone-wrapper" style="display: flex; gap: 10px;">
                                <!-- Simple static representation of country selector -->
                                <select class="form-input" style="width: 80px;">
                                    <option>IN</option>
                                    <option>US</option>
                                    <option>UK</option>
                                </select>
                                <input type="tel" name="phone" required class="form-input" placeholder="Phone Number">
                            </div>
                        </div>

                        <!-- Row 3: Domain Name -->
                        <div class="form-group full-width">
                            <div class="domain-wrapper" style="position: relative; display: flex; align-items: center;">
                                <input type="text" name="domain_name" required class="form-input" placeholder="Domain Name"
                                    style="padding-right: 120px;">
                                <span style="position: absolute; right: 15px; color: #666;">.qwaiting.com</span>
                            </div>
                        </div>

                        <!-- Row 4: Recaptcha -->
                        <div class="form-group full-width">
                            <div class="g-recaptcha-placeholder"
                                style="border: 1px solid #d3d3d3; background: #f9f9f9; padding: 15px; width: fit-content; border-radius: 4px; display: flex; align-items: center; gap: 10px;">
                                <input type="checkbox" id="robot-check" style="width: 24px; height: 24px;">
                                <label for="robot-check" style="margin: 0; font-size: 14px; color: #000;">I'm not a
                                    robot</label>
                                <div style="margin-left: 20px; display: flex; flex-direction: column; align-items: center;">
                                    <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA"
                                        style="width: 32px;">
                                    <span style="font-size: 10px; color: #555;">reCAPTCHA</span>
                                    <span style="font-size: 8px; color: #555;">Privacy - Terms</span>
                                </div>
                            </div>
                        </div>

                        <!-- Row 5: Button -->
                        <div class="form-group full-width">
                            <button type="submit" class="submit-button">
                                START FREE TRIAL
                            </button>
                        </div>
                    </div>
                </form>

                <div class="form-footer" style="text-align: center; margin-top: 20px;">
                    <p>Already have account? <a href="/website-login" style="color: #6c5ce7; font-weight: bold;">SIGN IN</a></p>
                </div>
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

@stack('scripts')