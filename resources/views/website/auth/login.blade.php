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

                <!-- Social Login Section -->
                <div style="margin: 20px 0; text-align: center;">
                    <div style="display: flex; align-items: center; margin: 20px 0;">
                        <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                        <span style="padding: 0 15px; color: #64748b; font-size: 14px;">Or continue with</span>
                        <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                    </div>
                    
                    <div style="display: flex; gap: 12px; margin-bottom: 20px;">
                        <a href="{{ route('auth.google') }}" 
                           style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 10px; padding: 12px 20px; border: 2px solid #e2e8f0; border-radius: 8px; background: white; color: #1e293b; font-weight: 600; font-size: 14px; text-decoration: none; transition: all 0.2s; hover:border-[#7C69EF] hover:bg-[#7C69EF]/5"
                           onmouseover="this.style.borderColor='#7C69EF'; this.style.backgroundColor='#f5f3ff';"
                           onmouseout="this.style.borderColor='#e2e8f0'; this.style.backgroundColor='white';">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span>Google</span>
                        </a>
                        
                        <a href="{{ route('auth.microsoft') }}" 
                           style="flex: 1; display: flex; align-items: center; justify-content: center; gap: 10px; padding: 12px 20px; border: 2px solid #e2e8f0; border-radius: 8px; background: white; color: #1e293b; font-weight: 600; font-size: 14px; text-decoration: none; transition: all 0.2s;"
                           onmouseover="this.style.borderColor='#7C69EF'; this.style.backgroundColor='#f5f3ff';"
                           onmouseout="this.style.borderColor='#e2e8f0'; this.style.backgroundColor='white';">
                            <svg width="20" height="20" viewBox="0 0 23 23" fill="none">
                                <path fill="#F25022" d="M0 0h11v11H0z"/>
                                <path fill="#00A4EF" d="M12 0h11v11H12z"/>
                                <path fill="#7FBA00" d="M0 12h11v11H0z"/>
                                <path fill="#FFB900" d="M12 12h11v11H12z"/>
                            </svg>
                            <span>Microsoft</span>
                        </a>
                    </div>
                </div>

                @if(session('error'))
                    <div style="margin: 15px 0; padding: 12px; background: #fee2e2; border: 1px solid #fecaca; border-radius: 8px; color: #991b1b; font-size: 14px; text-align: center;">
                        {{ session('error') }}
                    </div>
                @endif

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