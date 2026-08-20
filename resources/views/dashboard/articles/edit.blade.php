<x-dashboard-layout title="تعديل المقال">
    <div class="container-fluid px-4">
        <h1 class="mt-4">تعديل المقال: {{ $article->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.articles.index') }}">المقالات</a></li>
            <li class="breadcrumb-item active">تعديل المقال</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                تعديل بيانات المقال
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">عنوان المقال <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $article->name) }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="category" class="form-label">التصنيف</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $article->category) }}">
                                @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">محتوى المقال <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', $article->content) }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="user_id" class="form-label">الكاتب <span class="text-danger">*</span></label>
                                <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                                    <option value="">اختر الكاتب</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id', $article->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="published_at" class="form-label">تاريخ النشر</label>
                                <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', $article->published_at?->format('Y-m-d\TH:i')) }}">
                                @error('published_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">الصورة الحالية</label>
                                @if ($article->image)
                                    <div class="mb-2">
                                        <img src="{{ asset($article->image) }}" alt="الصورة الحالية" class="img-thumbnail" style="max-height: 120px;">
                                    </div>
                                @else
                                    <p class="text-muted">لا توجد صورة حالية</p>
                                @endif
                                <label for="image" class="form-label">تغيير الصورة</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> حفظ التغييرات
                        </button>
                        <a href="{{ route('dashboard.articles.show', $article) }}" class="btn btn-info text-white">عرض</a>
                        <a href="{{ route('dashboard.articles.index') }}" class="btn btn-secondary">إلغاء</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
