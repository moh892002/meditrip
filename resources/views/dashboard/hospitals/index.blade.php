<x-dashboard-layout title="المستشفيات">
    <div class="container-fluid px-4">
        <h1 class="mt-4">المستشفيات</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">المستشفيات</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0 text-muted">يمكنك إدارة المستشفيات من خلال هذه الصفحة.</p>
            <a href="{{ route('dashboard.hospitals.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> إضافة مستشفى
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                قائمة المستشفيات
            </div>
            <div class="card-body">                    @if ($hospitals->isEmpty())
                    <p class="text-muted text-center py-4">لا توجد مستشفيات مضافة بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="hospitalsTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>اسم المستشفى</th>
                                    <th>المدينة</th>
                                    <th>البلد</th>
                                    <th>عدد الأسرة</th>
                                    <th>سنة التأسيس</th>
                                    <th>عدد الأطباء</th>
                                    <th>التخصصات</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hospitals as $hospital)
                                    <tr>
                                        <td>{{ $hospital->id }}</td>
                                        <td>
                                            @if ($hospital->image)
                                                <img src="{{ asset($hospital->image) }}" alt="{{ $hospital->name }}" style="max-height: 50px; width: auto;" class="rounded">
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $hospital->name }}</td>
                                        <td>{{ $hospital->city }}</td>
                                        <td>{{ $hospital->country }}</td>
                                        <td>{{ $hospital->beds_num ?? '—' }}</td>
                                        <td>{{ $hospital->founded_year ?? '—' }}</td>
                                        <td>{{ $hospital->doctors_count ?? '—' }}</td>
                                        <td>{{ $hospital->specializations_count }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.hospitals.show', $hospital->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('dashboard.hospitals.edit', $hospital->id) }}" class="btn btn-sm btn-primary" title="تعديل">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('dashboard.hospitals.destroy', $hospital->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا المستشفى؟')" title="حذف">
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
                    {{ $hospitals->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
