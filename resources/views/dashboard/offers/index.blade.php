<x-dashboard-layout title="العروض">
    <div class="container-fluid px-4">
        <h1 class="mt-4">العروض</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">العروض</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0 text-muted">يمكنك إدارة العروض من خلال هذه الصفحة.</p>
            <a href="{{ route('dashboard.offers.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> إضافة عرض
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                قائمة العروض
            </div>
            <div class="card-body">
                @if ($offers->isEmpty())
                    <p class="text-muted text-center py-4">لا توجد عروض مضافة بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="offersTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>اسم العرض</th>
                                    <th>المستشفى</th>
                                    <th>السعر الأصلي</th>
                                    <th>سعر العرض</th>
                                    <th>صالح حتى</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>{{ $offer->id }}</td>
                                        <td>
                                            @if ($offer->image)
                                                <img src="{{ asset($offer->image) }}" alt="{{ $offer->name }}" style="max-height: 50px; width: auto;" class="rounded">
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $offer->name }}</td>
                                        <td>{{ $offer->hospital->name ?? '—' }}</td>
                                        <td>{{ number_format($offer->price, 2) }} $</td>
                                        <td><strong class="text-success">{{ number_format($offer->offer_price, 2) }} $</strong></td>
                                        <td>{{ $offer->valid_until ?? '—' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.offers.show', $offer->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('dashboard.offers.edit', $offer->id) }}" class="btn btn-sm btn-primary" title="تعديل">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('dashboard.offers.destroy', $offer->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا العرض؟')" title="حذف">
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
                    {{ $offers->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
