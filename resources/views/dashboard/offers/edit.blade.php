<x-dashboard-layout title="تعديل العرض">
    <div class="container-fluid px-4">
        <h1 class="mt-4">تعديل العرض: {{ $offer->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.offers.index') }}">العروض</a></li>
            <li class="breadcrumb-item active">تعديل العرض</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                تعديل بيانات العرض
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.offers.update', $offer) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">اسم العرض <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $offer->name) }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hospital_id" class="form-label">المستشفى <span class="text-danger">*</span></label>
                                <select class="form-select @error('hospital_id') is-invalid @enderror" id="hospital_id" name="hospital_id" required>
                                    <option value="">اختر المستشفى</option>
                                    @foreach ($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}" {{ old('hospital_id', $offer->hospital_id) == $hospital->id ? 'selected' : '' }}>{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                                @error('hospital_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">السعر الأصلي ($) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $offer->price) }}" min="0" step="0.01" required>
                                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="offer_price" class="form-label">سعر العرض ($) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('offer_price') is-invalid @enderror" id="offer_price" name="offer_price" value="{{ old('offer_price', $offer->offer_price) }}" min="0" step="0.01" required>
                                @error('offer_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="valid_until" class="form-label">صالح حتى</label>
                                <input type="date" class="form-control @error('valid_until') is-invalid @enderror" id="valid_until" name="valid_until" value="{{ old('valid_until', $offer->valid_until) }}">
                                @error('valid_until') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الصورة الحالية</label>
                        @if ($offer->image)
                            <div class="mb-2">
                                <img src="{{ asset($offer->image) }}" alt="الصورة الحالية" class="img-thumbnail" style="max-height: 120px;">
                            </div>
                        @else
                            <p class="text-muted">لا توجد صورة حالية</p>
                        @endif
                        <label for="image" class="form-label">تغيير الصورة</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">وصف العرض</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $offer->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> حفظ التغييرات
                        </button>
                        <a href="{{ route('dashboard.offers.show', $offer) }}" class="btn btn-info text-white">عرض</a>
                        <a href="{{ route('dashboard.offers.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
