<x-dashboard-layout title="عرض التخصص">
    <div class="container-fluid px-4">
        <h1 class="mt-4">عرض التخصص: {{ $specialization->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.specializations.index') }}">التخصصات</a></li>
            <li class="breadcrumb-item active">عرض التخصص</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('dashboard.specializations.edit', $specialization) }}" class="btn btn-primary">
                <i class="fas fa-edit me-1"></i> تعديل
            </a>
            <form action="{{ route('dashboard.specializations.destroy', $specialization) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا التخصص؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.specializations.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-right me-1"></i> العودة إلى القائمة
            </a>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-image me-1"></i>
                        صورة التخصص
                    </div>
                    <div class="card-body text-center">
                        @if ($specialization->image)
                            <img src="{{ asset($specialization->image) }}" alt="{{ $specialization->name }}" class="img-fluid rounded" style="max-height: 200px;">
                        @else
                            <div class="py-4 text-muted">
                                <i class="fas fa-image fa-3x mb-2"></i>
                                <p class="mb-0">لا توجد صورة لهذا التخصص</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        إحصائيات
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>عدد المستشفيات:</strong>
                            <span class="badge bg-info">{{ $specialization->hospitals_count ?? $specialization->hospitals()->count() }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>عدد الأخصائيين:</strong>
                            <span class="badge bg-success">{{ $specialization->specialists_count ?? $specialization->specialists()->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-info-circle me-1"></i>
                        معلومات التخصص
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th style="width: 200px;">اسم التخصص</th>
                                <td>{{ $specialization->name }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ الإضافة</th>
                                <td>{{ $specialization->created_at ? $specialization->created_at->format('Y-m-d') : '—' }}</td>
                            </tr>
                            <tr>
                                <th>آخر تحديث</th>
                                <td>{{ $specialization->updated_at ? $specialization->updated_at->format('Y-m-d') : '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-hospital me-1"></i>
                        المستشفيات المرتبطة
                    </div>
                    <div class="card-body">
                        @if ($specialization->hospitals->isEmpty())
                            <p class="text-muted mb-0">لا توجد مستشفيات مرتبطة بهذا التخصص.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>اسم المستشفى</th>
                                            <th>المدينة</th>
                                            <th>البلد</th>
                                            <th>عدد الأخصائيين</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($specialization->hospitals as $hospital)
                                            <tr>
                                                <td>{{ $hospital->id }}</td>
                                                <td>{{ $hospital->name }}</td>
                                                <td>{{ $hospital->city }}</td>
                                                <td>{{ $hospital->country }}</td>
                                                <td>{{ $hospital->specialists_count }}</td>
                                                <td>
                                                    <a href="{{ route('dashboard.hospitals.show', $hospital->id) }}" class="btn btn-sm btn-info text-white">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user-md me-1"></i>
                        الأخصائيون المرتبطون
                    </div>
                    <div class="card-body">
                        @if ($specialization->specialists->isEmpty())
                            <p class="text-muted mb-0">لا يوجد أخصائيون مرتبطون بهذا التخصص.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th>المستشفى</th>
                                            <th>التقييم</th>
                                            <th>السعر</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($specialization->specialists as $specialist)
                                            <tr>
                                                <td>{{ $specialist->id }}</td>
                                                <td>{{ $specialist->name }}</td>
                                                <td>{{ $specialist->hospital->name ?? '—' }}</td>
                                                <td>{{ $specialist->rate ?? '—' }}</td>
                                                <td>{{ $specialist->price ? number_format($specialist->price, 2) . ' $' : '—' }}</td>
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
    </div>
</x-dashboard-layout>
