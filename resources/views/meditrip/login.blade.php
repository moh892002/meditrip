<x-auth-layout title="تسجيل الدخول">
    <!-- Main header -->
    <div class="body-content">
        <div class="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content">
                            <div class="login-card">
                                <h1>تسجيل الدخول</h1>
                                <h6>أهلا وسهلا، مرحبا بك في منصة ميدي تريب</h6>
                                <form action="{{ route('login.attempt') }}" method="post">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session('status'))
                                        <div class="alert alert-success">{{ session('status') }}</div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="email" class="col-form-label">البريد الإلكتروني/رقم الجوال:</label>
                                                <div class="icon-input">
                                                    <span class="icon-i">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                            <g id="profile" transform="translate(-108 -252)">
                                                              <path id="Vector" d="M4.75,0a4.746,4.746,0,0,0-.12,9.49.807.807,0,0,1,.22,0h.07A4.746,4.746,0,0,0,4.75,0Z" transform="translate(115.25 254)" fill="#d3d3d8"/>
                                                              <path id="Vector-2" data-name="Vector" d="M12.12,1.395a9.929,9.929,0,0,0-10.15,0A3.947,3.947,0,0,0,0,4.625a3.914,3.914,0,0,0,1.96,3.21,9.239,9.239,0,0,0,5.08,1.41,9.239,9.239,0,0,0,5.08-1.41,3.945,3.945,0,0,0,1.96-3.23A3.937,3.937,0,0,0,12.12,1.395Z" transform="translate(112.96 264.755)" fill="#868692"/>
                                                              <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(108 252)" fill="none" opacity="0"/>
                                                            </g>
                                                          </svg>                                                          
                                                    </span>
                                                    <input type="text" class="form-control custom-input" name="email"
                                                        id="email" value="{{ old('email') }}" placeholder="أدخل البريد الإلكتروني/رقم الجوال">
        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="address" class="col-form-label">كلمة المرور:</label>
                                                <div class="icon-input">
                                                    <span class="icon-i">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                            <g id="vuesax_bulk_lock" data-name="vuesax/bulk/lock" transform="translate(-108 -316)">
                                                              <g id="lock">
                                                                <path id="Vector" d="M0,0H24V24H0Z" transform="translate(108 316)" fill="none" opacity="0"/>
                                                                <path id="Vector-2" data-name="Vector" d="M13.5,6.75v2.1a12.984,12.984,0,0,0-1.5-.1v-2C12,3.6,11.11,1.5,6.75,1.5S1.5,3.6,1.5,6.75v2a12.984,12.984,0,0,0-1.5.1V6.75C0,3.85.7,0,6.75,0S13.5,3.85,13.5,6.75Z" transform="translate(113.25 317.25)" fill="#868692"/>
                                                                <path id="Vector-3" data-name="Vector" d="M20,5V7c0,4-1,5-5,5H5c-4,0-5-1-5-5V5C0,1.66.7.41,3.25.1A12.984,12.984,0,0,1,4.75,0h10.5a12.984,12.984,0,0,1,1.5.1C19.3.41,20,1.66,20,5Z" transform="translate(110 326)" fill="#d3d3d8"/>
                                                                <g id="Group">
                                                                  <path id="Vector-4" data-name="Vector" d="M1,2a1,1,0,0,1-.38-.08,1.032,1.032,0,0,1-.33-.21A1.052,1.052,0,0,1,0,1,1,1,0,0,1,.08.619,1.155,1.155,0,0,1,.29.289,1.032,1.032,0,0,1,.62.079a1,1,0,0,1,1.09.21,1.155,1.155,0,0,1,.21.33A1,1,0,0,1,2,1a1.052,1.052,0,0,1-.29.71A1.052,1.052,0,0,1,1,2Z" transform="translate(115 331.001)" fill="#868692"/>
                                                                </g>
                                                                <g id="Group-2" data-name="Group">
                                                                  <path id="Vector-5" data-name="Vector" d="M1,1.988A1.033,1.033,0,0,1,.29,1.7a1.155,1.155,0,0,1-.21-.33A1,1,0,0,1,0,.988,1.033,1.033,0,0,1,.29.278a1.047,1.047,0,0,1,1.42,0A1.033,1.033,0,0,1,2,.988a1,1,0,0,1-.08.38,1.155,1.155,0,0,1-.21.33A1.052,1.052,0,0,1,1,1.988Z" transform="translate(119 331.013)" fill="#868692"/>
                                                                </g>
                                                                <g id="Group-3" data-name="Group">
                                                                  <path id="Vector-6" data-name="Vector" d="M1,1.988A1.052,1.052,0,0,1,.29,1.7,1.033,1.033,0,0,1,0,.988,1.033,1.033,0,0,1,.29.278a1.047,1.047,0,0,1,1.42,0c.04.05.08.1.12.16a.556.556,0,0,1,.09.17.636.636,0,0,1,.06.18,1.5,1.5,0,0,1,.02.2,1.052,1.052,0,0,1-.29.71A1.052,1.052,0,0,1,1,1.988Z" transform="translate(123 331.013)" fill="#868692"/>
                                                                </g>
                                                              </g>
                                                            </g>
                                                          </svg>                                                          
                                                    </span>
                                                    <input type="password" class="form-control custom-input" name="password"
                                                        placeholder="أدخل كلمة المرور">
                                                    <span class="icon-i-2 cursor-pointer">
                                                        <svg class="show-password" xmlns="http://www.w3.org/2000/svg" width="22.121" height="22.121"
                                                            viewBox="0 0 22.121 22.121">
                                                            <g id="vuesax_linear_eye-slash" data-name="vuesax/linear/eye-slash"
                                                                transform="translate(-172.939 -188.939)">
                                                                <g id="eye-slash">
                                                                    <path id="Vector"
                                                                        d="M6.11,1.05,1.05,6.11A3.578,3.578,0,1,1,6.11,1.05Z"
                                                                        transform="translate(180.42 196.42)" fill="none"
                                                                        stroke="#a3aeb8" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                                    <path id="Vector-2" data-name="Vector"
                                                                        d="M15.6,2.04A9.631,9.631,0,0,0,9.785,0C6.255,0,2.965,2.08.675,5.68a5.326,5.326,0,0,0,0,5.19,14.326,14.326,0,0,0,2.71,3.17"
                                                                        transform="translate(174.215 191.73)" fill="none"
                                                                        stroke="#a3aeb8" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                                    <path id="Vector-3" data-name="Vector"
                                                                        d="M0,11.6a9.215,9.215,0,0,0,3.58.74c3.53,0,6.82-2.08,9.11-5.68a5.326,5.326,0,0,0,0-5.19A16.222,16.222,0,0,0,11.63,0"
                                                                        transform="translate(180.42 195.93)" fill="none"
                                                                        stroke="#a3aeb8" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                                    <path id="Vector-4" data-name="Vector"
                                                                        d="M2.82,0A3.565,3.565,0,0,1,0,2.82"
                                                                        transform="translate(184.69 200.7)" fill="none"
                                                                        stroke="#a3aeb8" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                                    <path id="Vector-5" data-name="Vector" d="M7.47,0,0,7.47"
                                                                        transform="translate(174 202.53)" fill="none"
                                                                        stroke="#a3aeb8" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                                    <path id="Vector-6" data-name="Vector" d="M7.47,0,0,7.47"
                                                                        transform="translate(186.53 190)" fill="none"
                                                                        stroke="#a3aeb8" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1.5" />
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        
                                                        <svg class="show-password" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                            <g id="frame" transform="translate(-108 -188)">
                                                              <path id="Vector" d="M19.25,5.72C16.94,2.09,13.56,0,10,0A9.682,9.682,0,0,0,4.91,1.49,13.354,13.354,0,0,0,.75,5.72a5.771,5.771,0,0,0,0,5.69c2.31,3.64,5.69,5.72,9.25,5.72a9.682,9.682,0,0,0,5.09-1.49,13.354,13.354,0,0,0,4.16-4.23A5.771,5.771,0,0,0,19.25,5.72ZM10,12.61a4.04,4.04,0,1,1,4.04-4.04A4.035,4.035,0,0,1,10,12.61Z" transform="translate(110 191.43)" fill="#d3d3d8"/>
                                                              <path id="Vector-2" data-name="Vector" d="M2.85,0A2.855,2.855,0,1,0,5.71,2.86,2.857,2.857,0,0,0,2.85,0Z" transform="translate(117.15 197.14)" fill="#868692"/>
                                                              <path id="Vector-3" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(108 188)" fill="none" opacity="0"/>
                                                            </g>
                                                          </svg>
                                                          
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-flex justify-content-between">
                                            <label class="cs-checkbox-1">تذكرني
                                                <input type="checkbox" >
                                                <span class="checkmark"></span>
                                            </label>
                                            <a href="/forgetpassword" class="forget_password">هل نسيت كلمة المرور؟</a>
                                        </div>
                                        <div class="col-lg-12 mt-32">
                                            <button type="submit" class="mx-auto w-100 btn cs-btn v2">
                                                تسجيل الدخول
                                            </button>
                                        </div>
                                        <div class="col-lg-12 text-center mt-4">
                                            <span class="font400 font-14 black-color">ليس لديك حساب؟</span>
                                            <a href="/register" class="forget_password">إنشاء حساب</a>
                                        </div>
                                    </div>
        
        
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5  offset-2">
                        <div class="content d-lg-block d-none">
                            <div class="owl-carousel login-slider owl-slider">
                                <div class="login-card-slider">
                                    <figure>
                                        <img src="build/assets/images/login-img-slider.svg" alt="" srcset="">
                                    </figure>
                                    <h2>أفضل المستشفيات</h2>
                                    <p> نحرص على اختيار أفضل المستشفيات في تركيا، الحاصلة على شهادات
                                        .الجودة بالمعايير العالية للخدمات الطبية</p>
                                </div>
                                <div class="login-card-slider">
                                    <figure>
                                        <img src="build/assets/images/login-img-slider.svg" alt="" srcset="">
                                    </figure>
                                    <h2>أفضل المستشفيات</h2>
                                    <p> نحرص على اختيار أفضل المستشفيات في تركيا، الحاصلة على شهادات
                                        .الجودة بالمعايير العالية للخدمات الطبية</p>
                                </div>
                                <div class="login-card-slider">
                                    <figure>
                                        <img src="build/assets/images/login-img-slider.svg" alt="" srcset="">
                                    </figure>
                                    <h2>أفضل المستشفيات</h2>
                                    <p> نحرص على اختيار أفضل المستشفيات في تركيا، الحاصلة على شهادات
                                        .الجودة بالمعايير العالية للخدمات الطبية</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>
