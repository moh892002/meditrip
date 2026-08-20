<x-dashboard-layout title="لوحة التحكم">
    <div class="container-fluid px-4">
        <!-- Page Header -->
        <h1 class="mt-4">لوحة التحكم</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">لوحة التحكم</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card stat-navy h-100">
                    <i class="fas fa-hospital stat-icon"></i>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stat-value">{{ $stats['hospitals_count'] }}</div>
                            <div class="stat-label">المستشفيات</div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.hospitals.index') }}" class="text-decoration-none">عرض التفاصيل</a>
                        <i class="fas fa-arrow-left small"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card stat-green h-100">
                    <i class="fas fa-stethoscope stat-icon"></i>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stat-value">{{ $stats['specializations_count'] }}</div>
                            <div class="stat-label">التخصصات</div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.specializations.index') }}" class="text-decoration-none">عرض التفاصيل</a>
                        <i class="fas fa-arrow-left small"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card stat-slate h-100">
                    <i class="fas fa-user-md stat-icon"></i>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stat-value">{{ $stats['specialists_count'] }}</div>
                            <div class="stat-label">الأخصائيين</div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.specialists.index') }}" class="text-decoration-none">عرض التفاصيل</a>
                        <i class="fas fa-arrow-left small"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card stat-orange h-100">
                    <i class="fas fa-tags stat-icon"></i>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stat-value">{{ $stats['offers_count'] }}</div>
                            <div class="stat-label">العروض</div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.offers.index') }}" class="text-decoration-none">عرض التفاصيل</a>
                        <i class="fas fa-arrow-left small"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row Stats -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card stat-teal h-100">
                    <i class="fas fa-file-medical stat-icon"></i>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stat-value">{{ $stats['orders_count'] }}</div>
                            <div class="stat-label">الطلبات</div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.orders.index') }}" class="text-decoration-none">عرض التفاصيل</a>
                        <i class="fas fa-arrow-left small"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card stat-plum h-100">
                    <i class="fas fa-users stat-icon"></i>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stat-value">{{ $stats['users_count'] }}</div>
                            <div class="stat-label">المستخدمين</div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.users.index') }}" class="text-decoration-none">عرض التفاصيل</a>
                        <i class="fas fa-arrow-left small"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card stat-rose h-100">
                    <i class="fas fa-newspaper stat-icon"></i>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stat-value">{{ $stats['articles_count'] }}</div>
                            <div class="stat-label">المقالات</div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.articles.index') }}" class="text-decoration-none">عرض التفاصيل</a>
                        <i class="fas fa-arrow-left small"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card stat-card stat-navy-2 h-100">
                    <i class="fas fa-star stat-icon"></i>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="stat-value">{{ $stats['rates_count'] }}</div>
                            <div class="stat-label">التقييمات</div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="{{ route('dashboard.rates.index') }}" class="text-decoration-none">عرض التفاصيل</a>
                        <i class="fas fa-arrow-left small"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts & Top Rated -->
        <div class="row g-4 mb-4">
            <!-- Hospitals by City Chart -->
            <div class="col-xl-6">
                <div class="card h-100">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        توزيع المستشفيات حسب المدينة
                    </div>
                    <div class="card-body">
                        <canvas id="hospitalsByCityChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>

            <!-- Top Rated Hospitals -->
            <div class="col-xl-6">
                <div class="card h-100">
                    <div class="card-header">
                        <i class="fas fa-trophy me-1 text-warning"></i>
                        أفضل المستشفيات تقييماً
                    </div>
                    <div class="card-body">
                        @if ($topRatedHospitals->isEmpty())
                            <p class="text-muted text-center py-4">لا توجد تقييمات بعد.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>المستشفى</th>
                                            <th>المدينة</th>
                                            <th>التقييم</th>
                                            <th>عدد التقييمات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topRatedHospitals as $hospital)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        @if ($hospital->image)
                                                            <img src="{{ asset($hospital->image) }}" alt="" class="rounded me-2" style="width: 32px; height: 32px; object-fit: cover;">
                                                        @endif
                                                        <a href="{{ route('dashboard.hospitals.show', $hospital->id) }}" class="text-decoration-none">{{ $hospital->name }}</a>
                                                    </div>
                                                </td>
                                                <td class="align-middle">{{ $hospital->city }}</td>
                                                <td class="align-middle">
                                                    <span class="badge bg-warning text-dark">
                                                        <i class="fas fa-star text-warning-emphasis"></i>
                                                        {{ number_format($hospital->rates_avg_rating, 1) }}
                                                    </span>
                                                </td>
                                                <td class="align-middle">{{ $hospital->rates_count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="row g-4 mb-4">
            <!-- Recent Hospitals -->
            <div class="col-xl-6">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-hospital me-1"></i> أحدث المستشفيات</span>
                        <a href="{{ route('dashboard.hospitals.index') }}" class="btn btn-sm btn-primary">عرض الكل</a>
                    </div>
                    <div class="card-body">
                        @if ($recentHospitals->isEmpty())
                            <p class="text-muted text-center py-4">لا توجد مستشفيات مضافة بعد.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>المدينة</th>
                                            <th>البلد</th>
                                            <th>تاريخ الإضافة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentHospitals as $hospital)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('dashboard.hospitals.show', $hospital->id) }}" class="text-decoration-none fw-medium">{{ $hospital->name }}</a>
                                                </td>
                                                <td>{{ $hospital->city }}</td>
                                                <td>{{ $hospital->country }}</td>
                                                <td class="text-muted small">{{ $hospital->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recent Specializations -->
            <div class="col-xl-6">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-stethoscope me-1"></i> أحدث التخصصات</span>
                        <a href="{{ route('dashboard.specializations.index') }}" class="btn btn-sm btn-success">عرض الكل</a>
                    </div>
                    <div class="card-body">
                        @if ($recentSpecializations->isEmpty())
                            <p class="text-muted text-center py-4">لا توجد تخصصات مضافة بعد.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>عدد المستشفيات</th>
                                            <th>تاريخ الإضافة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentSpecializations as $spec)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('dashboard.specializations.show', $spec->id) }}" class="text-decoration-none fw-medium">{{ $spec->name }}</a>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">{{ $spec->hospitals_count }}</span>
                                                </td>
                                                <td class="text-muted small">{{ $spec->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders & Users -->
        <div class="row g-4 mb-4">
            <!-- Recent Orders -->
            <div class="col-xl-6">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-file-medical me-1"></i> أحدث الطلبات</span>
                        <a href="{{ route('dashboard.orders.index') }}" class="btn btn-sm btn-primary">عرض الكل</a>
                    </div>
                    <div class="card-body">
                        @if ($recentOrders->isEmpty())
                            <p class="text-muted text-center py-4">لا توجد طلبات بعد.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>المريض</th>
                                            <th>المستشفى</th>
                                            <th>التخصص</th>
                                            <th>الحالة</th>
                                            <th>التاريخ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentOrders as $order)
                                            <tr>
                                                <td class="fw-medium">{{ $order->patient_name ?? '—' }}</td>
                                                <td>{{ $order->hospital->name ?? '—' }}</td>
                                                <td>{{ $order->specialization->name ?? '—' }}</td>
                                                <td>
                                                    @php
                                                        $statusColors = [
                                                            'pending' => 'warning',
                                                            'approved' => 'success',
                                                            'completed' => 'info',
                                                            'cancelled' => 'danger',
                                                        ];
                                                        $statusLabels = [
                                                            'pending' => 'قيد الانتظار',
                                                            'approved' => 'مقبول',
                                                            'completed' => 'مكتمل',
                                                            'cancelled' => 'ملغي',
                                                        ];
                                                        $color = $statusColors[$order->status] ?? 'secondary';
                                                        $label = $statusLabels[$order->status] ?? $order->status;
                                                    @endphp
                                                    <span class="badge bg-{{ $color }}">{{ $label }}</span>
                                                </td>
                                                <td class="text-muted small">{{ $order->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recent Users -->
            <div class="col-xl-6">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-users me-1"></i> أحدث المستخدمين</span>
                        <a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-primary">عرض الكل</a>
                    </div>
                    <div class="card-body">
                        @if ($recentUsers->isEmpty())
                            <p class="text-muted text-center py-4">لا يوجد مستخدمين بعد.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>الاسم</th>
                                            <th>البريد الإلكتروني</th>
                                            <th>تاريخ التسجيل</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentUsers as $user)
                                            <tr>
                                                <td class="fw-medium">
                                                    <i class="fas fa-user-circle me-1 text-muted"></i>
                                                    {{ $user->name }}
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-muted small">{{ $user->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer text-center py-2">
                        <small class="text-muted">إجمالي المستخدمين: {{ $stats['users_count'] }}</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-4 mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-bolt me-1"></i>
                        إجراءات سريعة
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('dashboard.hospitals.create') }}" class="btn btn-outline-primary w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fas fa-plus-circle"></i>
                                    إضافة مستشفى
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('dashboard.specializations.create') }}" class="btn btn-outline-success w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fas fa-plus-circle"></i>
                                    إضافة تخصص
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('dashboard.hospitals.index') }}" class="btn btn-outline-info w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fas fa-list"></i>
                                    إدارة المستشفيات
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('dashboard.specializations.index') }}" class="btn btn-outline-warning w-100 py-3 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fas fa-list"></i>
                                    إدارة التخصصات
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Hospitals by City Chart
            const cityLabels = @json(array_keys($hospitalsByCity->toArray()));
            const cityData = @json(array_values($hospitalsByCity->toArray()));

            if (cityLabels.length > 0 && document.getElementById('hospitalsByCityChart')) {
                const ctx = document.getElementById('hospitalsByCityChart').getContext('2d');
                // Brand palette (matches the site theme)
                const brandColors = ['#1A6B52', '#F4A261', '#E76F51', '#17a2b8', '#7c5cbf', '#e53939', '#33415c'];
                const colors = cityLabels.map((_, i) => brandColors[i % brandColors.length]);

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: cityLabels,
                        datasets: [{
                            label: 'عدد المستشفيات',
                            data: cityData,
                            backgroundColor: colors,
                            borderColor: colors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        }
                    }
                });
            } else if (document.getElementById('hospitalsByCityChart')) {
                document.getElementById('hospitalsByCityChart').parentElement.innerHTML =
                    '<p class="text-muted text-center py-4">لا توجد بيانات كافية لرسم المخطط.</p>';
            }
        </script>
    @endpush
</x-dashboard-layout>
