<x-dashboard-layout title="عرض مستشفى">
    <div class="container-fluid px-4">
        <h1 class="mt-4">عرض المستشفى: {{ $hospital->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.hospitals.index') }}">المستشفيات</a></li>
            <li class="breadcrumb-item active">عرض المستشفى</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('dashboard.hospitals.edit', $hospital) }}" class="btn btn-primary">
                <i class="fas fa-edit me-1"></i> تعديل
            </a>
            <form action="{{ route('dashboard.hospitals.destroy', $hospital) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا المستشفى؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.hospitals.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-right me-1"></i> العودة إلى القائمة
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-info-circle me-1"></i>
                        المعلومات الأساسية
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">اسم المستشفى</th>
                                <td>{{ $hospital->name }}</td>
                            </tr>
                            <tr>
                                <th>المدينة</th>
                                <td>{{ $hospital->city }}</td>
                            </tr>
                            <tr>
                                <th>البلد</th>
                                <td>{{ $hospital->country }}</td>
                            </tr>
                            <tr>
                                <th>سنة التأسيس</th>
                                <td>{{ $hospital->founded_year ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>عدد الأسرة</th>
                                <td>{{ $hospital->beds_num ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>عدد الأطباء</th>
                                <td>{{ $hospital->doctors_count ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>عدد الموظفين</th>
                                <td>{{ $hospital->staff_count ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>عدد العمليات</th>
                                <td>{{ $hospital->operations_count ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>متوسط التقييم</th>
                                <td>
                                    @php $avgRate = $hospital->averageRate(); @endphp
                                    @if ($avgRate)
                                        {{ number_format($avgRate, 1) }} / 5
                                        <small class="text-muted">({{ $hospital->rates_count ?? $hospital->rates()->count() }} تقييم)</small>
                                    @else
                                        <span class="text-muted">لا توجد تقييمات</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-align-left me-1"></i>
                        نبذة عن المستشفى
                    </div>
                    <div class="card-body">
                        @if ($hospital->about)
                            <p class="mb-0">{{ $hospital->about }}</p>
                        @else
                            <p class="text-muted mb-0">لا توجد نبذة متاحة.</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-concierge-bell me-1"></i>
                                الخدمات
                            </div>
                            <div class="card-body">
                                @php
                                    $services = is_array($hospital->services) ? $hospital->services : ($hospital->services ? explode("\n", $hospital->services) : []);
                                @endphp
                                @if (!empty($services))
                                    <ul class="mb-0">
                                        @foreach ($services as $service)
                                            <li>{{ trim($service) }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted mb-0">لا توجد خدمات مضافة.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-building me-1"></i>
                                المرافق
                            </div>
                            <div class="card-body">
                                @php
                                    $facilities = is_array($hospital->facilities) ? $hospital->facilities : ($hospital->facilities ? explode("\n", $hospital->facilities) : []);
                                @endphp
                                @if (!empty($facilities))
                                    <ul class="mb-0">
                                        @foreach ($facilities as $facility)
                                            <li>{{ trim($facility) }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted mb-0">لا توجد مرافق مضافة.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-image me-1"></i>
                        الصور
                    </div>
                    <div class="card-body">
                        @if ($hospital->image)
                            <label class="fw-bold mb-1">الصورة الرئيسية</label>
                            <div class="mb-3">
                                <img src="{{ asset($hospital->image) }}" alt="{{ $hospital->name }}" class="img-fluid rounded">
                            </div>
                        @endif
                        @if ($hospital->logo)
                            <label class="fw-bold mb-1">الشعار</label>
                            <div class="mb-3">
                                <img src="{{ asset($hospital->logo) }}" alt="شعار {{ $hospital->name }}" class="img-fluid" style="max-height: 80px;">
                            </div>
                        @endif
                        @if (!$hospital->image && !$hospital->logo)
                            <p class="text-muted mb-0">لا توجد صور مضافة.</p>
                        @endif
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-stethoscope me-1"></i>
                        ملخص سريع
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>عدد الأخصائيين:</strong>
                            <span class="badge bg-info">{{ $hospital->specialists_count ?? $hospital->specialists()->count() }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>عدد العروض:</strong>
                            <span class="badge bg-success">{{ $hospital->offers_count ?? $hospital->offers()->count() }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>عدد التقييمات:</strong>
                            <span class="badge bg-warning text-dark">{{ $hospital->rates_count ?? $hospital->rates()->count() }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>عدد الطلبات:</strong>
                            <span class="badge bg-secondary">{{ $hospital->orders()->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
