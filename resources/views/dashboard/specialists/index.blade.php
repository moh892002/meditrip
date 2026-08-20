<x-dashboard-layout title="الأخصائيون">
    <div class="container-fluid px-4">
        <h1 class="mt-4">الأخصائيون</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">الأخصائيون</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0 text-muted">يمكنك إدارة الأخصائيين من خلال هذه الصفحة.</p>
            <a href="{{ route('dashboard.specialists.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> إضافة أخصائي
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                قائمة الأخصائيين
            </div>
            <div class="card-body">
                @if ($specialists->isEmpty())
                    <p class="text-muted text-center py-4">لا يوجد أخصائيون مضافة بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="specialistsTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>الاسم</th>
                                    <th>المستشفى</th>
                                    <th>التخصص</th>
                                    <th>التقييم</th>
                                    <th>السعر</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specialists as $specialist)
                                    <tr>
                                        <td>{{ $specialist->id }}</td>
                                        <td>
                                            @if ($specialist->image)
                                                <img src="{{ asset($specialist->image) }}" alt="{{ $specialist->name }}" style="max-height: 50px; width: auto;" class="rounded">
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $specialist->name }}</td>
                                        <td>{{ $specialist->hospital->name ?? '—' }}</td>
                                        <td>{{ $specialist->specialization->name ?? '—' }}</td>
                                        <td>{{ $specialist->rate ?? '—' }}</td>
                                        <td>{{ $specialist->price ? number_format($specialist->price, 2) . ' $' : '—' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.specialists.show', $specialist->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('dashboard.specialists.edit', $specialist->id) }}" class="btn btn-sm btn-primary" title="تعديل">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('dashboard.specialists.destroy', $specialist->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا الأخصائي؟')" title="حذف">
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
                    {{ $specialists->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
