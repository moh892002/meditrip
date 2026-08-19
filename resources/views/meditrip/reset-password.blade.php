<x-auth-layout title="إعادة تعيين كلمة المرور">
    <!-- Main header -->
    <div class="body-content">
        <div class="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="content">
                            <div class="login-card">
                                <h1>إعادة تعيين كلمة المرور</h1>
                                <h6>أدخل كلمة المرور الجديدة الخاصة بك</h6>
                                <form action="{{ route('password.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="email" class="col-form-label">البريد الإلكتروني:</label>
                                                <div class="icon-input">
                                                    <input type="email" class="form-control custom-input" name="email"
                                                        id="email" value="{{ old('email', $email ?? '') }}" placeholder="أدخل البريد الإلكتروني">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="password" class="col-form-label">كلمة المرور الجديدة:</label>
                                                <div class="icon-input">
                                                    <input type="password" class="form-control custom-input" name="password"
                                                        id="password" placeholder="أدخل كلمة المرور الجديدة">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="col-form-label">تأكيد كلمة المرور:</label>
                                                <div class="icon-input">
                                                    <input type="password" class="form-control custom-input" name="password_confirmation"
                                                        id="password_confirmation" placeholder="أدخل كلمة المرور مرة أخرى">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-32">
                                            <button type="submit" class="mx-auto w-100 btn cs-btn v2">
                                                حفظ كلمة المرور
                                            </button>
                                        </div>
                                        <div class="col-lg-12 text-center mt-4">
                                            <span class="font400 font-14 black-color">تذكرت كلمة المرور؟</span>
                                            <a href="/login" class="forget_password">تسجيل الدخول</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-2">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>
