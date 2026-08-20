<x-dashboard-layout title="عرض الأخصائي">
    <div class="container-fluid px-4">
        <h1 class="mt-4">عرض الأخصائي: {{ $specialist->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.specialists.index') }}">الأخصائيون</a></li>
            <li class="breadcrumb-item active">عرض الأخصائي</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('dashboard.specialists.edit', $specialist) }}" class="btn btn-primary">
                <i class="fas fa-edit me-1"></i> تعديل
            </a>
            <form action="{{ route('dashboard.specialists.destroy', $specialist) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الأخصائي؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.specialists.index') }}" class="btn btn-secondary">
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
                                <th style="width: 200px;">الاسم</th>
                                <td>{{ $specialist->name }}</td>
                            </tr>
                            <tr>
                                <th>المستشفى</th>
                                <td>
                                    @if ($specialist->hospital)
                                        <a href="{{ route('dashboard.hospitals.show', $specialist->hospital) }}">{{ $specialist->hospital->name }}</a>
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>التخصص</th>
                                <td>{{ $specialist->specialization->name ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>التقييم</th>
                                <td>{{ $specialist->rate ? $specialist->rate . ' / 5' : '—' }}</td>
                            </tr>
                            <tr>
                                <th>السعر</th>
                                <td>{{ $specialist->price ? number_format($specialist->price, 2) . ' $' : '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-align-left me-1"></i>
                        الوصف
                    </div>
                    <div class="card-body">
                        @if ($specialist->description)
                            <p class="mb-0">{{ $specialist->description }}</p>
                        @else
                            <p class="text-muted mb-0">لا يوجد وصف متاح.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-image me-1"></i>
                        الصورة
                    </div>
                    <div class="card-body text-center">
                        @if ($specialist->image)
                            <img src="{{ asset($specialist->image) }}" alt="{{ $specialist->name }}" class="img-fluid rounded" style="max-height: 250px;">
                        @else
                            <div class="py-4 text-muted">
                                <i class="fas fa-user-md fa-3x mb-2"></i>
                                <p class="mb-0">لا توجد صورة لهذا الأخصائي</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
