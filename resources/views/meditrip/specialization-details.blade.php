<x-site-layout title="{{ $specialization->name }}">

    <div class="body-content specialization-details-page">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            <span class="px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.02" height="19.998" viewBox="0 0 20.02 19.998">
                                    <g id="vuesax_bulk_home-2" data-name="vuesax/bulk/home-2" transform="translate(-621.99 -190.002)">
                                        <g id="home-2">
                                            <path id="Vector" d="M18.05,4.818,12.29.788A4.853,4.853,0,0,0,6.8.918L1.79,4.828A5.153,5.153,0,0,0,0,8.468v6.9A4.631,4.631,0,0,0,4.62,20H15.4a4.622,4.622,0,0,0,4.62-4.62V8.6A5.1,5.1,0,0,0,18.05,4.818Z" transform="translate(621.99 190.002)" fill="#e2e2e2" />
                                            <path id="Vector-2" data-name="Vector" d="M.75,4.5A.755.755,0,0,1,0,3.75v-3A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v3A.755.755,0,0,1,.75,4.5Z" transform="translate(631.25 202.25)" fill="#05060f" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span>الرئيسية</span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('specializations') }}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0" transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </svg>
                            </span>
                            <span>التخصصات</span>
                        </a>
                    </li>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0" transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>
                    </span>
                    <li class="breadcrumb-item active" aria-current="page">{{ $specialization->name }}</li>
                </ol>
            </nav>
            <div class="main-title">
                <h2>{{ $specialization->name }}</h2>
            </div>

            <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="specialization-header">
                        <figure class="mb-3">
                            @if ($specialization->image)
                                <img src="{{ asset($specialization->image) }}" alt="{{ $specialization->name }}" class="img-fluid rounded">
                            @endif
                        </figure>
                        <h4 class="mb-3">المستشفيات المتخصصة في {{ $specialization->name }}</h4>
                    </div>

                    @forelse ($specialization->hospitals as $hospital)
                        <div class="hospital-card-horizontal mb-4 p-3 border rounded">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <figure class="mb-0">
                                        <img src="{{ $hospital->image ? asset($hospital->image) : 'build/assets/images/hospital-img-1.png' }}" alt="{{ $hospital->name }}" class="img-fluid rounded">
                                    </figure>
                                </div>
                                <div class="col-md-8">
                                    <h4>{{ $hospital->name }}</h4>
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <div class="rate">
                                            <span>{{ number_format($hospital->rates_avg_rating ?? $hospital->averageRate(), 1) }}</span>
                                        </div>
                                        <span>{{ $hospital->city }}, {{ $hospital->country }}</span>
                                    </div>
                                    <p>{{ Str::limit($hospital->about, 150) }}</p>
                                    <a href="{{ route('hospital-details', $hospital->id) }}" class="btn cs-btn">عرض التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">لا توجد مستشفيات في هذا التخصص حالياً.</p>
                    @endforelse
                </div>

                <div class="col-lg-4">
                    <div class="specialists-sidebar">
                        <h4 class="mb-3">الأخصائيون</h4>
                        @forelse ($specialization->specialists as $specialist)
                            <div class="specialist-mini-card d-flex align-items-center mb-3 p-2 border-bottom">
                                <figure class="mb-0 me-3">
                                    <img src="{{ $specialist->image ? asset($specialist->image) : 'build/assets/images/specialist.png' }}" alt="{{ $specialist->name }}" width="60" height="60" class="rounded-circle">
                                </figure>
                                <div>
                                    <h5 class="mb-1">{{ $specialist->name }}</h5>
                                    <small class="text-muted">تقييم: {{ $specialist->rate ?? '--' }}</small>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">لا يوجد أخصائيون بعد.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-btn">
        <a href="{{ url('/contact-us') }}">
            <figure>
                <img src="build/assets/images/contact-us-icon.svg" alt="">
            </figure>
        </a>
        <p>طلب مساعدة</p>
    </div>
</x-site-layout>
