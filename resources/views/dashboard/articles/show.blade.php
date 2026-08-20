<x-dashboard-layout title="عرض المقال">
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $article->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.articles.index') }}">المقالات</a></li>
            <li class="breadcrumb-item active">عرض المقال</li>
        </ol>

        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('dashboard.articles.edit', $article) }}" class="btn btn-primary">
                <i class="fas fa-edit me-1"></i> تعديل
            </a>
            <form action="{{ route('dashboard.articles.destroy', $article) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                    <i class="fas fa-trash me-1"></i> حذف
                </button>
            </form>
            <a href="{{ route('dashboard.articles.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-right me-1"></i> العودة إلى القائمة
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-align-left me-1"></i>
                        محتوى المقال
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-info-circle me-1"></i>
                        معلومات المقال
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <tr>
                                <th>العنوان</th>
                                <td>{{ $article->name }}</td>
                            </tr>
                            <tr>
                                <th>التصنيف</th>
                                <td>{{ $article->category ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>الكاتب</th>
                                <td>{{ $article->author->name ?? '—' }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ النشر</th>
                                <td>{{ $article->published_at ? $article->published_at->format('Y-m-d H:i') : '—' }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ الإنشاء</th>
                                <td>{{ $article->created_at ? $article->created_at->format('Y-m-d') : '—' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-image me-1"></i>
                        الصورة
                    </div>
                    <div class="card-body text-center">
                        @if ($article->image)
                            <img src="{{ asset($article->image) }}" alt="{{ $article->name }}" class="img-fluid rounded" style="max-height: 250px;">
                        @else
                            <div class="py-4 text-muted">
                                <i class="fas fa-newspaper fa-3x mb-2"></i>
                                <p class="mb-0">لا توجد صورة لهذا المقال</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
