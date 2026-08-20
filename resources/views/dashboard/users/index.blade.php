<x-dashboard-layout title="المستخدمون">
    <div class="container-fluid px-4">
        <h1 class="mt-4">المستخدمون</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">المستخدمون</li>
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
                قائمة المستخدمين
            </div>
            <div class="card-body">
                @if ($users->isEmpty())
                    <p class="text-muted text-center py-4">لا يوجد مستخدمون مسجلون بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="usersTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الهاتف</th>
                                    <th>البلد</th>
                                    <th>الصلاحية</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone ?? '—' }}</td>
                                        <td>{{ $user->country ?? '—' }}</td>
                                        <td>
                                            @if ($user->is_admin)
                                                <span class="badge bg-danger">مدير</span>
                                            @else
                                                <span class="badge bg-secondary">مستخدم</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at ? $user->created_at->format('Y-m-d') : '—' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.users.show', $user->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا المستخدم؟')" title="حذف">
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
