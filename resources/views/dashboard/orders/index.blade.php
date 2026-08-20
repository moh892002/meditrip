<x-dashboard-layout title="الطلبات">
    <div class="container-fluid px-4">
        <h1 class="mt-4">الطلبات</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">الطلبات</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0 text-muted">يمكنك إدارة الطلبات من خلال هذه الصفحة.</p>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                قائمة الطلبات
            </div>
            <div class="card-body">
                @if ($orders->isEmpty())
                    <p class="text-muted text-center py-4">لا توجد طلبات بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="ordersTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>اسم المريض</th>
                                    <th>المستشفى</th>
                                    <th>التخصص</th>
                                    <th>الحالة</th>
                                    <th>تاريخ الإنشاء</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->patient_name ?? '—' }}</td>
                                        <td>{{ $order->hospital->name ?? '—' }}</td>
                                        <td>{{ $order->specialization->name ?? '—' }}</td>
                                        <td>
                                            @php
                                                $statusColors = [
                                                    'pending' => 'warning',
                                                    'processing' => 'info',
                                                    'completed' => 'success',
                                                    'cancelled' => 'danger',
                                                ];
                                                $statusLabels = [
                                                    'pending' => 'قيد الانتظار',
                                                    'processing' => 'قيد المعالجة',
                                                    'completed' => 'مكتمل',
                                                    'cancelled' => 'ملغي',
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                                {{ $statusLabels[$order->status] ?? $order->status }}
                                            </span>
                                        </td>
                                        <td>{{ $order->created_at ? $order->created_at->format('Y-m-d') : '—' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.orders.show', $order->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا الطلب؟')" title="حذف">
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
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
