<x-dashboard-layout title="رسائل التواصل">
    <div class="container-fluid px-4">
        <h1 class="mt-4">رسائل التواصل</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">رسائل التواصل</li>
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
                قائمة الرسائل
            </div>
            <div class="card-body">
                @if ($messages->isEmpty())
                    <p class="text-muted text-center py-4">لا توجد رسائل بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="messagesTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الهاتف</th>
                                    <th>الرسالة</th>
                                    <th>الحالة</th>
                                    <th>التاريخ</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $message->id }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phone ?? '—' }}</td>
                                        <td>{{ Str::limit($message->message, 50) }}</td>
                                        <td>
                                            @if ($message->status === 'read')
                                                <span class="badge bg-success">مقروءة</span>
                                            @else
                                                <span class="badge bg-warning text-dark">جديدة</span>
                                            @endif
                                        </td>
                                        <td>{{ $message->created_at ? $message->created_at->format('Y-m-d') : '—' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.messages.show', $message->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('dashboard.messages.destroy', $message->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')" title="حذف">
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
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
