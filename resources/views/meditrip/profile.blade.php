<x-site-layout title="ملفي الشخصي">
    <div class="body-content profile-page">
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
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.811" height="12.121"
                            viewBox="0 0 6.811 12.121">
                            <path id="Arrow_-_Right" data-name="Arrow - Right" d="M10,0,5,5,0,0"
                                transform="translate(5.75 1.061) rotate(90)" fill="none" stroke="#727a83"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" />
                        </svg>

                    </span>
                    <li class="breadcrumb-item active" aria-current="page">ملفي الشخصي</li>
                </ol>
            </nav>
        </div>
        <!--  ./breadcrumb -->
        @if (session('success'))
            <div class="container mt-3">
                <div class="alert alert-success mb-0">{{ session('success') }}</div>
            </div>
        @endif
        <div class="container">
            <div class="content">
                <div class="row">

                    <div class="col-xl-3 col-lg-4">
                        <div class="profile-sidebar">
                            <div class="user-info">
                                <figure class="mb-0">
                                    <img src="{{ asset('build/assets/images/avatar.png') }}" alt="" srcset="">
                                </figure>
                                <div>
                                    <h6>{{ $user->name }}</h6>
                                    <h4>{{ $user->phone ?? $user->email }}</h4>
                                </div>
                            </div>
                            <ul>
                                <li class="active">
                                    <a href="{{ route('profile') }}">
                                        <span><i class="fas fa-file-alt"></i></span>
                                        الطلبات
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('user-info') }}">
                                        <span><i class="fas fa-user"></i></span>
                                        البيانات الشخصية
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">
                                        <span><i class="fas fa-headset"></i></span>
                                        مركز المساعدة
                                    </a>
                                </li>
                                <li class="logout">
                                    <form action="{{ route('logout') }}" method="post" class="d-flex align-items-center w-100">
                                        @csrf
                                        <button type="submit" class="btn btn-link d-flex align-items-center gap-2 text-danger p-0">
                                            <span><i class="fas fa-sign-out-alt"></i></span>
                                            تسجيل الخروج
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="requests-section">
                            <h4>طلبات عرض السعر</h4>
                            @forelse ($orders as $order)
                                <div class="table-responsive cs-table">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td style="width: 30%;">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <figure class="mb-0">
                                                            <img src="{{ asset($order->hospital->logo ?? 'build/assets/images/logo-hospital-1.png') }}" alt="" srcset="">
                                                        </figure>
                                                        {{ $order->hospital->name }}
                                                    </div>
                                                </td>
                                                <td>{{ $order->created_at->format('d F، Y') }}</td>
                                                <td>#{{ $order->id }}</td>
                                                <td>{{ $order->specialization->name ?? '—' }}</td>
                                                <td>
                                                    @php
                                                        $statusMap = [
                                                            'pending' => ['قيد الانتظار', 'bg-warning'],
                                                            'under_review' => ['قيد التقييم', 'bg-warning'],
                                                            'completed' => ['تم الانتهاء', 'bg-success'],
                                                            'cancelled' => ['ملغي', 'bg-danger'],
                                                        ];
                                                        [$statusLabel, $statusClass] = $statusMap[$order->status] ?? [$order->status, 'bg-secondary'];
                                                    @endphp
                                                    <div class="status {{ $statusClass }}">
                                                        {{ $statusLabel }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <div class="cs-action">
                                                            <a href="{{ route('request-details', $order) }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <p>عرض</p>
                                                        </div>
                                                        <div class="cs-action">
                                                            <form action="{{ route('order.destroy', $order) }}" method="post" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link p-0 text-danger">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                            <p>حذف</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <p>لا توجد طلبات عرض سعر بعد.</p>
                                    <a href="{{ route('hospitals') }}" class="btn cs-btn v2">تصفح المستشفيات</a>
                                </div>
                            @endforelse
                        </div>
                        <div class="requests-section mt-4">
                            <h4 class="mb-5">مقالات مهمة</h4>
                            <div class="row">
                                @foreach ($articles as $article)
                                    <div class="col-xl-6">
                                        <a href="{{ route('blog-details', $article) }}">
                                            <div class="recently-article-card d-flex align-items-center">
                                                <figure class="mb-0">
                                                    <img src="{{ asset($article->image) }}" class="img-fluid" alt="...">
                                                </figure>
                                                <div class="flex-grow-1 ms-3">
                                                    <h4>{{ $article->published_at->format('d F، Y') }} - {{ $article->category }}</h4>
                                                    <h2>{{ Str::limit($article->name, 60) }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
