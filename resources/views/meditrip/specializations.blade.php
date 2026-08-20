<x-site-layout title="التخصصات الطبية">

    <div class="body-content specializations-page">
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
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121" viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0" transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>
                    </span>
                    <li class="breadcrumb-item active" aria-current="page">التخصصات الطبية</li>
                </ol>
            </nav>
            <div class="main-title">
                <h2>جميع التخصصات الطبية</h2>
            </div>
            <div class="row mt-5">
                @forelse ($specializations as $specialization)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="specialization-card">
                            <figure>
                                @if ($specialization->image)
                                    <img src="{{ asset($specialization->image) }}" alt="{{ $specialization->name }}">
                                @else
                                    <img src="build/assets/images/specialist.png" alt="{{ $specialization->name }}">
                                @endif
                            </figure>
                            <div class="specialization-card-body">
                                <h4>{{ $specialization->name }}</h4>
                                <p>{{ $specialization->hospitals_count }} مستشفى</p>
                            <a href="{{ route('specializations.details', $specialization->id) }}" class="btn cs-btn">عرض التفاصيل</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">لا توجد تخصصات مضافة بعد.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="contact-us-btn">
        <a href="{{ url('/contact-us') }}">
            <figure>
                <img src="build/assets/images/contact-us-icon.svg" alt="" srcset="">
            </figure>
        </a>
        <p>طلب مساعدة</p>
    </div>
</x-site-layout>
