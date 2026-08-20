<x-dashboard-layout title="عرض التقييم">
    <div class="container-fluid px-4">
        <h1 class="mt-4">عرض التقييم #{{ $rate->id }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.rates.index') }}">التقييمات</a></li>
            <li class="breadcrumb-item active">عرض التقييم</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <form action="{{ route('dashboard.rates.destroy', $rate) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا التقييم؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.rates.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-right me-1"></i> العودة إلى القائمة
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-info-circle me-1"></i>
                        معلومات التقييم
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">المستخدم</th>
                                <td>{{ $rate->user->name ?? '—' }} ({{ $rate->user->email ?? '—' }})</td>
                            </tr>
                            <tr>
                                <th>المستشفى</th>
                                <td>
                                    @if ($rate->hospital)
                                        <a href="{{ route('dashboard.hospitals.show', $rate->hospital) }}">{{ $rate->hospital->name }}</a>
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>التقييم</th>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rate->rating)
                                            <i class="fas fa-star text-warning fa-lg"></i>
                                        @else
                                            <i class="far fa-star text-warning fa-lg"></i>
                                        @endif
                                    @endfor
                                    <span class="ms-2 fw-bold">{{ $rate->rating }} / 5</span>
                                </td>
                            </tr>
                            <tr>
                                <th>التاريخ</th>
                                <td>{{ $rate->created_at ? $rate->created_at->format('Y-m-d H:i') : '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-align-left me-1"></i>
                        نص المراجعة
                    </div>
                    <div class="card-body">
                        @if ($rate->review)
                            <p class="mb-0">{{ $rate->review }}</p>
                        @else
                            <p class="text-muted mb-0">لا توجد مراجعة مكتوبة.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        ملخص
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>التقييم:</strong>
                            <span class="badge bg-warning text-dark">{{ $rate->rating }} / 5</span>
                        </div>
                        <div class="mb-2">
                            <strong>المستخدم:</strong>
                            <span class="badge bg-info">{{ $rate->user->name ?? '—' }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>المستشفى:</strong>
                            <span class="badge bg-success">{{ $rate->hospital->name ?? '—' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
