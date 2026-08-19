<x-site-layout title="{{ $article->name }}">

    <div class="body-content blog-details-page">
        <!--  breadcrumb -->
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            <span class="px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.02" height="19.998"
                                    viewBox="0 0 20.02 19.998">
                                    <g id="vuesax_bulk_home-2" data-name="vuesax/bulk/home-2"
                                        transform="translate(-621.99 -190.002)">
                                        <g id="home-2">
                                            <path id="Vector"
                                                d="M18.05,4.818,12.29.788A4.853,4.853,0,0,0,6.8.918L1.79,4.828A5.153,5.153,0,0,0,0,8.468v6.9A4.631,4.631,0,0,0,4.62,20H15.4a4.622,4.622,0,0,0,4.62-4.62V8.6A5.1,5.1,0,0,0,18.05,4.818Z"
                                                transform="translate(621.99 190.002)" fill="#e2e2e2" />
                                            <path id="Vector-2" data-name="Vector"
                                                d="M.75,4.5A.755.755,0,0,1,0,3.75v-3A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v3A.755.755,0,0,1,.75,4.5Z"
                                                transform="translate(631.25 202.25)" fill="#05060f" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span>الرئيسية</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                                    viewBox="0 0 6.811 12.121">
                                    <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                        transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">المدونة</li>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                            viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>
                    </span>
                    <li class="breadcrumb-item active" aria-current="page">تفاصيل المقال</li>
                </ol>
            </nav>
        </div>
        <!--  ./breadcrumb -->
        <div class="container mt-lg-50 mt-4">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8">
                        <h6>{{ $article->published_at->format('d F، Y') }} - {{ $article->category }}</h6>
                        <h1>{{ $article->name }}</h1>
                        <figure>
                            <img src="{{ asset($article->image) }}" class="img-fluid" alt="{{ $article->name }}">
                        </figure>
                        <div class="description">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                        <div class="tags">
                            <div class="tag">{{ $article->category }}</div>
                        </div>
                        <div class="share-with">
                            <h4>مشاركة المقال</h4>
                            <div class="f-social">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="when-hover" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($article->name) }} {{ url()->current() }}" class="when-hover" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($article->name) }}" class="when-hover" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://t.me/share/url?url={{ url()->current() }}&text={{ urlencode($article->name) }}" class="when-hover" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-telegram-plane"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-lg-0 mt-4">
                        <div class="search-input">
                            <h4 class="subtitle">ابحث عن مقال</h4>
                            <form action="{{ route('blog') }}" method="get">
                                <div class="icon-input">
                                    <span class="icon-i">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20.003" height="20" viewBox="0 0 20.003 20">
                                            <g id="search-normal" transform="translate(-430 -190)">
                                              <path id="Vector" d="M19,9.5A9.5,9.5,0,1,1,9.5,0,9.5,9.5,0,0,1,19,9.5Z" transform="translate(430 190)" fill="#d3d3d8"/>
                                              <path id="Vector-2" data-name="Vector" d="M2.552,3.252a.7.7,0,0,1-.49-.2L.2,1.192A.706.706,0,0,1,.2.2a.706.706,0,0,1,.99,0l1.86,1.86a.706.706,0,0,1,0,.99A.738.738,0,0,1,2.552,3.252Z" transform="translate(446.747 206.747)" fill="#868692"/>
                                            </g>
                                          </svg>
                                    </span>
                                    <input type="text" name="category" class="form-control cs-input" id="recipient-name" placeholder="ابحث عن مقال">
                                </div>
                            </form>
                        </div>
                        <div class="categories mt-lg-50 mt-4">
                            <h4 class="subtitle mb-3">التصنيفات</h4>
                            <a href="{{ route('blog') }}" class="{{ request('category') ? '' : 'active' }}">كل التصنيفات</a>
                            @foreach ($categories as $category)
                                <a href="{{ route('blog', ['category' => $category]) }}">{{ $category }}</a>
                            @endforeach
                        </div>
                        <div class="mt-5">
                            <h4 class="subtitle mb-3">أحدث المقالات</h4>
                            @foreach ($recent as $recentArticle)
                                <a href="{{ route('blog-details', $recentArticle) }}">
                                    <div class="recently-article-card d-flex align-items-center">
                                        <figure class="mb-0">
                                            <img src="{{ asset($recentArticle->image) }}" class="img-fluid" alt="...">
                                        </figure>
                                        <div class="flex-grow-1 ms-3">
                                            <h4>{{ $recentArticle->published_at->format('d F، Y') }} - {{ $recentArticle->category }}</h4>
                                            <h2>{{ Str::limit($recentArticle->name, 60) }}</h2>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service-request-section -->
        <section class="callaction-section service-request-section">
            <div class="container">
                <div class="content">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <figure>
                                <img src="{{ asset('build/assets/images/medical-health-services.png') }}" class="wow zoomIn" data-wow-duration="1s" data-wow-delay="0.1s" alt="" srcset="">
                            </figure>
                        </div>
                        <div class="col-lg-7">
                            <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">طلب خدمة</h4>
                            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                تحتاج للمساعدة، ونحن هنا لمساعدتك فريق عملنا متواجد دائما على مدار الساعة
                                .طوال أيام الأسبوع لخدمتك والإجابة على جميع أسئلتك واستفساراتك
                            </p>
                        </div>
                        <div class="col-lg-3 mx-auto">
                            <a href="{{ route('contact') }}" class="btn cs-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">ارسل طلب الأن</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./service-request-section -->

        <!-- blog-section -->
        <section class="blog-section">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>مقالات ذات صلة</h2>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($related as $relatedArticle)
                            <div class="col-lg-4 col-md-6">
                                <a href="{{ route('blog-details', $relatedArticle) }}">
                                    <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        <figure>
                                            <img src="{{ asset($relatedArticle->image) }}" alt="" srcset="">
                                        </figure>
                                        <div class="article-card-body">
                                            <h6>{{ $relatedArticle->published_at->format('d F، Y') }} - {{ $relatedArticle->category }}</h6>
                                            <h4>{{ Str::limit($relatedArticle->name, 80) }}</h4>
                                            <p>{{ Str::limit(strip_tags($relatedArticle->content), 150) }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ./blog-section -->

        <!-- blog-section -->
        <section class="blog-section mt-lg-5 mt-4">
            <div class="container">
                <div class="main-title d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                    <h2>إقرأ أيضا</h2>
                </div>
                <div class="content">
                    <div class="row">
                        @foreach ($recent as $recentArticle)
                            <div class="col-lg-4 col-md-6">
                                <a href="{{ route('blog-details', $recentArticle) }}">
                                    <div class="article-card wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                                        <figure>
                                            <img src="{{ asset($recentArticle->image) }}" alt="" srcset="">
                                        </figure>
                                        <div class="article-card-body">
                                            <h6>{{ $recentArticle->published_at->format('d F، Y') }} - {{ $recentArticle->category }}</h6>
                                            <h4>{{ Str::limit($recentArticle->name, 80) }}</h4>
                                            <p>{{ Str::limit(strip_tags($recentArticle->content), 150) }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ./blog-section -->

    </div>
    <!-- contact-us-btn -->
    <div class="contact-us-btn">
        <a href="{{ route('contact') }}">
            <figure>
                <img src="{{ asset('build/assets/images/contact-us-icon.svg') }}" alt="" srcset="">
            </figure>
        </a>
        <p>طلب مساعدة</p>
    </div>
    <!-- ./contact-us-btn -->

</x-site-layout>
