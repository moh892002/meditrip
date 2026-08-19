<x-auth-layout title="نسيت كلمة المرور">
    <!-- Main header -->
    <div class="body-content">
        <div class="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content">
                            <div class="login-card">
                                <h1>هل نسيت كلمة المرور؟</h1>
                                <h6>أدخل رقم الجوال أو البريد الإلكتروني ليصلك رابط إعادة تعيين كلمة المرور</h6>
                                <form action="{{ route('forgetpassword.send') }}" method="post">
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
                                                    <input type="email" class="form-control custom-input" name="email"
                                                        id="email" placeholder="أدخل البريد الإلكتروني/رقم الجوال">
        
                                                </div>
                                            </div>
                                        </div>
                                     
                                    
                                        <div class="col-lg-12 mt-32">
                                            <button type="submit" class="mx-auto w-100 btn cs-btn v2">
                                                إعادة تعيين كلمة المرور
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
                        <div class="content content-left d-lg-block d-none">
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