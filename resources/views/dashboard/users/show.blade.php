<x-dashboard-layout title="عرض المستخدم">
    <div class="container-fluid px-4">
        <h1 class="mt-4">عرض المستخدم: {{ $user->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">المستخدمون</a></li>
            <li class="breadcrumb-item active">عرض المستخدم</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <form action="{{ route('dashboard.users.destroy', $user) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">
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
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>البريد الإلكتروني</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>الهاتف</th>
                                <td>{{ $user->phone ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>البلد</th>
                                <td>{{ $user->country ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>الصلاحية</th>
                                <td>
                                    @if ($user->is_admin)
                                        <span class="badge bg-danger">مدير</span>
                                    @else
                                        <span class="badge bg-secondary">مستخدم</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>تاريخ التسجيل</th>
                                <td>{{ $user->created_at ? $user->created_at->format('Y-m-d H:i') : '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        الإحصائيات
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>عدد الطلبات:</strong>
                            <span class="badge bg-info">{{ $user->orders_count ?? $user->orders()->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
