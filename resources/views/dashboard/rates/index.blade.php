<x-dashboard-layout title="التقييمات">
    <div class="container-fluid px-4">
        <h1 class="mt-4">التقييمات</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">التقييمات</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                قائمة التقييمات
            </div>
            <div class="card-body">
                @if ($rates->isEmpty())
                    <p class="text-muted text-center py-4">لا توجد تقييمات بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="ratesTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>المستخدم</th>
                                    <th>المستشفى</th>
                                    <th>التقييم</th>
                                    <th>المراجعة</th>
                                    <th>التاريخ</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rates as $rate)
                                    <tr>
                                        <td>{{ $rate->id }}</td>
                                        <td>{{ $rate->user->name ?? '—' }}</td>
                                        <td>{{ $rate->hospital->name ?? '—' }}</td>
                                        <td>
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $rate->rating)
                                                    <i class="fas fa-star text-warning"></i>
                                                @else
                                                    <i class="far fa-star text-warning"></i>
                                                @endif
                                            @endfor
                                            <span class="ms-1">({{ $rate->rating }})</span>
                                        </td>
                                        <td>{{ $rate->review ? Str::limit($rate->review, 50) : '—' }}</td>
                                        <td>{{ $rate->created_at ? $rate->created_at->format('Y-m-d') : '—' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.rates.show', $rate->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('dashboard.rates.destroy', $rate->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا التقييم؟')" title="حذف">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="d-flex justify-content-center mt-3">
                    {{ $rates->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
