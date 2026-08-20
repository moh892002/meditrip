<x-dashboard-layout title="إضافة أخصائي">
    <div class="container-fluid px-4">
        <h1 class="mt-4">إضافة أخصائي</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.specialists.index') }}">الأخصائيون</a></li>
            <li class="breadcrumb-item active">إضافة أخصائي</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-plus-circle me-1"></i>
                بيانات الأخصائي
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.specialists.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                                <label for="name" class="form-label">اسم الأخصائي <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">صورة الأخصائي</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hospital_id" class="form-label">المستشفى <span class="text-danger">*</span></label>
                                <select class="form-select @error('hospital_id') is-invalid @enderror" id="hospital_id" name="hospital_id" required>
                                    <option value="">اختر المستشفى</option>
                                    @foreach ($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}" {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>{{ $hospital->name }}</option>
                                    @endforeach
                                </select>
                                @error('hospital_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="specialization_id" class="form-label">التخصص <span class="text-danger">*</span></label>
                                <select class="form-select @error('specialization_id') is-invalid @enderror" id="specialization_id" name="specialization_id" required>
                                    <option value="">اختر التخصص</option>
                                    @foreach ($specializations as $specialization)
                                        <option value="{{ $specialization->id }}" {{ old('specialization_id') == $specialization->id ? 'selected' : '' }}>{{ $specialization->name }}</option>
                                    @endforeach
                                </select>
                                @error('specialization_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rate" class="form-label">التقييم (من 5)</label>
                                <input type="number" class="form-control @error('rate') is-invalid @enderror" id="rate" name="rate" value="{{ old('rate') }}" min="0" max="5" step="0.1">
                                @error('rate') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">السعر ($)</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" min="0" step="0.01">
                                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">الوصف</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> إضافة الأخصائي
                        </button>
                        <a href="{{ route('dashboard.specialists.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
