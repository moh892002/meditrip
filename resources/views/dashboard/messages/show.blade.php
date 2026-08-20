<x-dashboard-layout title="عرض الرسالة">
    <div class="container-fluid px-4">
        <h1 class="mt-4">عرض الرسالة</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.messages.index') }}">رسائل التواصل</a></li>
            <li class="breadcrumb-item active">عرض الرسالة</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <form action="{{ route('dashboard.messages.destroy', $message) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.messages.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-right me-1"></i> العودة إلى القائمة
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-envelope me-1"></i>
                تفاصيل الرسالة
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 200px;">الاسم</th>
                        <td>{{ $message->name }}</td>
                    </tr>
                    <tr>
                        <th>البريد الإلكتروني</th>
                        <td>{{ $message->email }}</td>
                    </tr>
                    <tr>
                        <th>الهاتف</th>
                        <td>{{ $message->phone ?? '—' }}</td>
                    </tr>
                    <tr>
                        <th>الحالة</th>
                        <td>
                            @if ($message->status === 'read')
                                <span class="badge bg-success">مقروءة</span>
                            @else
                                <span class="badge bg-warning text-dark">جديدة</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>التاريخ</th>
                        <td>{{ $message->created_at ? $message->created_at->format('Y-m-d H:i') : '—' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-align-left me-1"></i>
                نص الرسالة
            </div>
            <div class="card-body">
                <p class="mb-0">{{ $message->message }}</p>
            </div>
        </div>

        @if ($message->file)
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-paperclip me-1"></i>
                    المرفق
                </div>
                <div class="card-body">
                    <a href="{{ asset($message->file) }}" target="_blank" class="btn btn-outline-primary">
                        <i class="fas fa-download me-1"></i> تحميل المرفق
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-dashboard-layout>
