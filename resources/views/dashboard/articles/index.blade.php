<x-dashboard-layout title="المقالات">
    <div class="container-fluid px-4">
        <h1 class="mt-4">المقالات</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">لوحة التحكم</a></li>
            <li class="breadcrumb-item active">المقالات</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="mb-0 text-muted">يمكنك إدارة المقالات من خلال هذه الصفحة.</p>
            <a href="{{ route('dashboard.articles.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> إضافة مقال
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                قائمة المقالات
            </div>
            <div class="card-body">
                @if ($articles->isEmpty())
                    <p class="text-muted text-center py-4">لا توجد مقالات مضافة بعد.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="articlesTable">
                            <thead class="table-primary text-dark">
                                <tr>
                                    <th>#</th>
                                    <th>الصورة</th>
                                    <th>العنوان</th>
                                    <th>التصنيف</th>
                                    <th>الكاتب</th>
                                    <th>تاريخ النشر</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>
                                            @if ($article->image)
                                                <img src="{{ asset($article->image) }}" alt="{{ $article->name }}" style="max-height: 50px; width: auto;" class="rounded">
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>{{ $article->name }}</td>
                                        <td>{{ $article->category ?? '—' }}</td>
                                        <td>{{ $article->author->name ?? '—' }}</td>
                                        <td>{{ $article->published_at ? $article->published_at->format('Y-m-d') : '—' }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('dashboard.articles.show', $article->id) }}" class="btn btn-sm btn-info text-white" title="عرض">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn btn-sm btn-primary" title="تعديل">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('dashboard.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا المقال؟')" title="حذف">
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
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
