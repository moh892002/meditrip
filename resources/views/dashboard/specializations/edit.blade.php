<x-dashboard-layout title="تعديل التخصص">
    <div class="container-fluid px-4">
        <h1 class="mt-4">تعديل التخصص: {{ $specialization->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.specializations.index') }}">التخصصات</a></li>
            <li class="breadcrumb-item active">تعديل التخصص</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                تعديل بيانات التخصص
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.specializations.update', $specialization) }}" method="POST" enctype="multipart/form-data">
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

                    <div class="mb-3">
                        <label for="name" class="form-label">اسم التخصص <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $specialization->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الصورة الحالية</label>
                        @if ($specialization->image)
                            <div class="mb-2">
                                <img src="{{ asset($specialization->image) }}" alt="الصورة الحالية" class="img-thumbnail" style="max-height: 150px;">
                            </div>
                        @else
                            <p class="text-muted">لا توجد صورة حالية</p>
                        @endif
                        <label for="image" class="form-label">تغيير صورة التخصص</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> حفظ التغييرات
                        </button>
                        <a href="{{ route('dashboard.specializations.show', $specialization) }}" class="btn btn-info text-white">عرض</a>
                        <a href="{{ route('dashboard.specializations.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
