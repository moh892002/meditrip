<x-dashboard-layout title="عرض العرض">
    <div class="container-fluid px-4">
        <h1 class="mt-4">عرض العرض: {{ $offer->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.offers.index') }}">العروض</a></li>
            <li class="breadcrumb-item active">عرض العرض</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('dashboard.offers.edit', $offer) }}" class="btn btn-primary">
                <i class="fas fa-edit me-1"></i> تعديل
            </a>
            <form action="{{ route('dashboard.offers.destroy', $offer) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا العرض؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.offers.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-right me-1"></i> العودة إلى القائمة
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-info-circle me-1"></i>
                        معلومات العرض
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 200px;">اسم العرض</th>
                                <td>{{ $offer->name }}</td>
                            </tr>
                            <tr>
                                <th>المستشفى</th>
                                <td>
                                    @if ($offer->hospital)
                                        <a href="{{ route('dashboard.hospitals.show', $offer->hospital) }}">{{ $offer->hospital->name }}</a>
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>السعر الأصلي</th>
                                <td>{{ number_format($offer->price, 2) }} $</td>
                            </tr>
                            <tr>
                                <th>سعر العرض</th>
                                <td><strong class="text-success">{{ number_format($offer->offer_price, 2) }} $</strong></td>
                            </tr>
                            <tr>
                                <th>التخفيض</th>
                                <td><span class="badge bg-danger">{{ number_format(($offer->price - $offer->offer_price), 2) }} $</span></td>
                            </tr>
                            <tr>
                                <th>صالح حتى</th>
                                <td>{{ $offer->valid_until ?? '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-align-left me-1"></i>
                        وصف العرض
                    </div>
                    <div class="card-body">
                        @if ($offer->description)
                            <p class="mb-0">{{ $offer->description }}</p>
                        @else
                            <p class="text-muted mb-0">لا يوجد وصف متاح.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-image me-1"></i>
                        صورة العرض
                    </div>
                    <div class="card-body text-center">
                        @if ($offer->image)
                            <img src="{{ asset($offer->image) }}" alt="{{ $offer->name }}" class="img-fluid rounded" style="max-height: 250px;">
                        @else
                            <div class="py-4 text-muted">
                                <i class="fas fa-tag fa-3x mb-2"></i>
                                <p class="mb-0">لا توجد صورة لهذا العرض</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
