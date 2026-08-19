<x-dashboard-layout title="تعديل المستشفى">
    <div class="container-fluid px-4">
        <h1 class="mt-4">تعديل المستشفى</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.hospitals.index') }}">المستشفيات</a></li>
            <li class="breadcrumb-item active">تعديل المستشفى</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                تعديل بيانات المستشفى: {{ $hospital->name }}
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.hospitals.update', $hospital) }}" method="POST" enctype="multipart/form-data">
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
                                <label for="name" class="form-label">اسم المستشفى <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $hospital->name) }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="city" class="form-label">المدينة <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $hospital->city) }}" required>
                                @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="country" class="form-label">البلد <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', $hospital->country) }}" required>
                                @error('country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">الصورة الحالية</label>
                                @if ($hospital->image)
                                    <div class="mb-2">
                                        <img src="{{ asset($hospital->image) }}" alt="الصورة الحالية" class="img-thumbnail" style="max-height: 120px;">
                                    </div>
                                @else
                                    <p class="text-muted">لا توجد صورة حالية</p>
                                @endif
                                <label for="image" class="form-label">تغيير صورة المستشفى</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">الشعار الحالي</label>
                                @if ($hospital->logo)
                                    <div class="mb-2">
                                        <img src="{{ asset($hospital->logo) }}" alt="الشعار الحالي" class="img-thumbnail" style="max-height: 80px;">
                                    </div>
                                @else
                                    <p class="text-muted">لا يوجد شعار</p>
                                @endif
                                <label for="logo" class="form-label">تغيير الشعار</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*">
                                @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="about" class="form-label">نبذة عن المستشفى</label>
                                <textarea class="form-control @error('about') is-invalid @enderror" id="about" name="about" rows="4">{{ old('about', $hospital->about) }}</textarea>
                                @error('about') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="services" class="form-label">الخدمات (خدمة واحدة لكل سطر)</label>
                                <textarea class="form-control @error('services') is-invalid @enderror" id="services" name="services" rows="3">{{ old('services', is_array($hospital->services) ? implode("\n", $hospital->services) : $hospital->services) }}</textarea>
                                <small class="text-muted">أدخل كل خدمة في سطر منفصل</small>
                                @error('services') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="facilities" class="form-label">المرافق (مرفق واحد لكل سطر)</label>
                                <textarea class="form-control @error('facilities') is-invalid @enderror" id="facilities" name="facilities" rows="3">{{ old('facilities', $hospital->facilities) }}</textarea>
                                <small class="text-muted">أدخل كل مرفق في سطر منفصل</small>
                                @error('facilities') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="founded_year" class="form-label">سنة التأسيس</label>
                                <input type="number" class="form-control @error('founded_year') is-invalid @enderror" id="founded_year" name="founded_year" value="{{ old('founded_year', $hospital->founded_year) }}" min="1800" max="{{ date('Y') }}">
                                @error('founded_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="beds_num" class="form-label">عدد الأسرة</label>
                                <input type="number" class="form-control @error('beds_num') is-invalid @enderror" id="beds_num" name="beds_num" value="{{ old('beds_num', $hospital->beds_num) }}" min="0">
                                @error('beds_num') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="doctors_count" class="form-label">عدد الأطباء</label>
                                <input type="number" class="form-control @error('doctors_count') is-invalid @enderror" id="doctors_count" name="doctors_count" value="{{ old('doctors_count', $hospital->doctors_count) }}" min="0">
                                @error('doctors_count') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="staff_count" class="form-label">عدد الموظفين</label>
                                <input type="number" class="form-control @error('staff_count') is-invalid @enderror" id="staff_count" name="staff_count" value="{{ old('staff_count', $hospital->staff_count) }}" min="0">
                                @error('staff_count') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="operations_count" class="form-label">عدد العمليات</label>
                                <input type="number" class="form-control @error('operations_count') is-invalid @enderror" id="operations_count" name="operations_count" value="{{ old('operations_count', $hospital->operations_count) }}" min="0">
                                @error('operations_count') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> حفظ التغييرات
                        </button>
                        <a href="{{ route('dashboard.hospitals.show', $hospital) }}" class="btn btn-info text-white">عرض</a>
                        <a href="{{ route('dashboard.hospitals.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
