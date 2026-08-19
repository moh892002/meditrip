<x-dashboard-layout title="التخصصات">
    <div class="container-fluid px-4">
        <h1 class="mt-4">التخصصات</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">التخصصات</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0 text-muted">يمكنك إدارة التخصصات من خلال هذه الصفحة.</p>
            <a href="{{ route('dashboard.specializations.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> إضافة تخصص جديد
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                قائمة التخصصات
            </div>
            <div class="card-body">
                @if ($specializations->isEmpty())
                    <p class="text-muted text-center py-4">لا توجد تخصصات مضافة بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="specializationsTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>اسم التخصص</th>
                                    <th>الصورة</th>
                                    <th>عدد المستشفيات</th>
                                    <th>عدد الأخصائيين</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($specializations as $specialization)
                                    <tr>
                                        <td>{{ $specialization->id }}</td>
                                        <td>{{ $specialization->name }}</td>
                                        <td>
                                            @if ($specialization->image)
                                                <img src="{{ asset($specialization->image) }}" alt="{{ $specialization->name }}" style="max-height: 50px; width: auto;" class="rounded">
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $specialization->hospitals_count }}</td>
                                        <td>{{ $specialization->specialists_count }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.specializations.show', $specialization->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('dashboard.specializations.edit', $specialization->id) }}" class="btn btn-sm btn-primary" title="تعديل">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('dashboard.specializations.destroy', $specialization->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا التخصص؟')" title="حذف">
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
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            if (typeof simpleDatatables !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable('#specializationsTable', {
                    searchable: true,
                    perPageSelect: true,
                    labels: {
                        placeholder: "بحث...",
                        perPage: "عدد الصفوف",
                        noRows: "لا توجد بيانات",
                        info: "عرض {start} إلى {end} من {rows} تخصص"
                    }
                });
            }
        </script>
    @endpush
</x-dashboard-layout>
