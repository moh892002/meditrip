<x-dashboard-layout title="عرض الطلب">
    <div class="container-fluid px-4">
        <h1 class="mt-4">عرض الطلب #{{ $order->id }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.orders.index') }}">الطلبات</a></li>
            <li class="breadcrumb-item active">عرض الطلب</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <form action="{{ route('dashboard.orders.destroy', $order) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-right me-1"></i> العودة إلى القائمة
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-info-circle me-1"></i>
                        معلومات الطلب
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">رقم الطلب</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>المستخدم</th>
                                <td>{{ $order->user->name ?? '—' }} ({{ $order->user->email ?? '—' }})</td>
                            </tr>
                            <tr>
                                <th>المستشفى</th>
                                <td>
                                    @if ($order->hospital)
                                        <a href="{{ route('dashboard.hospitals.show', $order->hospital) }}">{{ $order->hospital->name }}</a>
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>التخصص</th>
                                <td>{{ $order->specialization->name ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>الحالة</th>
                                <td>
                                    <form action="{{ route('dashboard.orders.updateStatus', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-select form-select-sm d-inline w-auto" onchange="this.form.submit()">
                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>قيد المعالجة</option>
                                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>مكتمل</option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>ملغي</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>تاريخ الإنشاء</th>
                                <td>{{ $order->created_at ? $order->created_at->format('Y-m-d H:i') : '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user me-1"></i>
                        بيانات المريض
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th style="width: 200px;">اسم المريض</th>
                                <td>{{ $order->patient_name ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>البريد الإلكتروني</th>
                                <td>{{ $order->patient_email ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>الهاتف</th>
                                <td>{{ $order->patient_phone ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>وصف المرض</th>
                                <td>{{ $order->disease_description ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>ملاحظات</th>
                                <td>{{ $order->notes ?? '—' }}</td>
                            </tr>
                        </table>
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
                            <strong>المستخدم:</strong>
                            <span class="badge bg-info">{{ $order->user->name ?? '—' }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>المستشفى:</strong>
                            <span class="badge bg-success">{{ $order->hospital->name ?? '—' }}</span>
                        </div>
                        <div class="mb-2">
                            <strong>التخصص:</strong>
                            <span class="badge bg-primary">{{ $order->specialization->name ?? '—' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
