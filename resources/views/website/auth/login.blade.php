@extends('website.layout.website')

@section('title', 'Login - Q-Waiting')
@section('meta_description', 'Login to your Q-Waiting account. Access your queue management dashboard.')

@section('content')
    <div class="signup-form-container">

        <div class="form-wrapper">
            <div class="form-header" style="text-align: center;">
                <img src="https://qwaiting.com/images/qwaiting-logo.svg" alt="Q-Waiting"
                    style="height: 40px; margin-bottom: 20px;">
                <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Login for Qwaiting</h2>
            </div>

            <div class="form-body">
                <form action="#" method="POST">
                    <div class="form-grid">

                        <div class="form-group full-width">
                            <input type="text" name="login_id" required class="form-input" placeholder="Username or Email">
                        </div>

                        <div class="form-group full-width">
                            <input type="password" name="password" required class="form-input" placeholder="Your Password">
                        </div>

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

                        <div class="form-group full-width" style="text-align: center; margin-top: 10px;">
                            <a href="#" style="color: #6c5ce7; font-weight: bold; font-size: 15px;">Forgot Password?</a>
                        </div>

                        <div class="form-group full-width">
                            <button type="submit" class="submit-button" style="width: 100%;">
                                SIGN IN
                            </button>
                        </div>
                    </div>
                </form>

                <div class="form-footer" style="text-align: center; margin-top: 20px;">
                    <p>Not have an account? <a href="/signup" style="color: #6c5ce7; font-weight: bold;">SIGN UP</a></p>
                </div>
            </div>

            <!-- Helper toggle for Demo/Dev purposes if needed, can be removed -->
            <div
                style="position: fixed; bottom: 10px; right: 10px; background: #ffeaa7; padding: 5px; border-radius: 5px; font-size: 10px; display: none;">
                Login Page Created
            </div>
        </div>

        <!-- Trusted By Section -->
        <div class="trusted-section">
            <h2>Try Queue Management System for free</h2>
            <p>No credit card required. No strings attached.</p>

            <p style="margin-top: 30px; font-weight: bold; font-size: 1.2rem;">Trusted by 65K+ customers</p>

            <div class="trusted-logos">
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

            <div
                style="margin-top: 40px; font-size: 0.8rem; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;">
                Copyright © 2025 qwaiting.com | All Rights Reserved.
            </div>
        </div>
    </div>
@endsection