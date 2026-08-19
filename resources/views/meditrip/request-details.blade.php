<x-question-layout title="تفاصيل الطلب" prev="{{ route('profile') }}">
    <div class="q-body-content summary-page">
        <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="hospital-card">
                    <figure>
                        <img src="{{ $order->hospital?->image }}" alt="" srcset="">
                    </figure>
                    <div class="hospital-rate">
                        <div class="d-flex align-items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.08" height="18.567" viewBox="0 0 20.08 18.567"><g id="Star" transform="translate(-3.355 -2.05)"><path id="Path" d="M9.158.578a.962.962,0,0,1,1.764,0L13.016,5.41a.96.96,0,0,0,.808.575l5.369.413a.956.956,0,0,1,.537,1.691l-4.038,3.32a.954.954,0,0,0-.321.967l1.243,5a.959.959,0,0,1-1.419,1.054L10.527,15.7a.964.964,0,0,0-.974,0L4.886,18.432a.959.959,0,0,1-1.419-1.054l1.243-5a.954.954,0,0,0-.321-.967L.35,8.089A.956.956,0,0,1,.888,6.4l5.369-.413a.96.96,0,0,0,.808-.575Z" transform="translate(3.355 2.05)" fill="#ffc542" /></g></svg>
                            <span class="ml-1">{{ number_format($order->hospital?->rates_avg_rating ?? 0, 1) }}</span>
                        </div>
                        <p>{{ $order->hospital?->country }}، {{ $order->hospital?->city }}</p>
                    </div>
                    <h4>{{ $order->hospital?->name }}</h4>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="summary">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>طلب عرض السعر #{{ $order->id }}</h2>
                        <div class="status bg-warning px-3 py-1 rounded">
                            {{ match ($order->status) { 'pending' => 'قيد التقييم', 'under_review' => 'قيد المراجعة', 'completed' => 'تم الانتهاء', 'cancelled' => 'ملغي', default => $order->status } }}
                        </div>
                    </div>
                    <div class="question-summary">
                       <div>
                            <h3>التخصص</h3>
                            <h6>{{ $order->specialization?->name ?? '—' }}</h6>
                       </div>
                    </div>
                    <div class="question-summary">
                        <div>
                             <h3>المريض</h3>
                             <h6>{{ $order->patient_name ?? '—' }} | {{ $order->patient_email ?? '' }} | {{ $order->patient_phone ?? '' }}</h6>
                        </div>
                     </div>
                     @if ($order->notes)
                     <div class="question-summary">
                        <div>
                             <h3>تفاصيل الطلب</h3>
                             <p>{!! nl2br(e($order->notes)) !!}</p>
                        </div>
                     </div>
                     @endif
                     @if ($order->disease_description)
                     <div class="question-summary">
                        <div>
                             <h3>وصف الحالة</h3>
                             <p>{{ $order->disease_description }}</p>
                        </div>
                     </div>
                     @endif
                     @if ($order->files)
                     <div class="question-summary">
                        <div>
                             <h3>الملفات المرفقة</h3>
                             <div class="file-summary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32.813" height="40" viewBox="0 0 32.813 40"><g id="pdf-file" transform="translate(-5.7)"><path id="Path_42545" data-name="Path 42545" d="M38.55,2V32.65H5.8V8.632L14.425,0H36.612A2,2,0,0,1,38.55,2Z" transform="translate(-0.037)" fill="#eff2f3"/><path id="Path_42546" data-name="Path 42546" d="M12.655,8.632H5.9L14.469,0l-.063,6.755A1.743,1.743,0,0,1,12.655,8.632Z" transform="translate(-0.075)" fill="#dadede"/><path id="Path_42547" data-name="Path 42547" d="M25.325,21.738A24.935,24.935,0,0,1,22.2,17.989c.5-.75,1.688-5.062-.125-6.311s-2.75,1.062-2.75,1.062a7.02,7.02,0,0,0,1.125,5.5l-2.187,4.812c-.25,0-7.188,2.687-4.813,6,2.438,3.312,5.812-4.687,5.812-4.687a50.21,50.21,0,0,1,5.313-1,8.345,8.345,0,0,0,3.438,2.812c2.875.75,3.187-1.625,3.187-1.625C31.263,21.426,25.325,21.738,25.325,21.738ZM14.637,27.925a.061.061,0,0,1-.062-.062c-.375-.875,2.5-2.562,2.5-2.562S15.513,28.3,14.637,27.925Zm6.5-15.122c.813.75.125,3.312.125,3.312S20.325,13.552,21.137,12.8Zm-.75,9.686,1.125-2.75,1.75,2.125Zm9.25,2h0c-.5.812-2.562-.937-2.75-1.125h0c.313,0,3,.187,2.75,1.125Zm8.875,10.373v7.374a2.014,2.014,0,0,1-2,2H7.7a2.014,2.014,0,0,1-2-2V34.861Z" transform="translate(0 -4.235)" fill="#f2786b"/><path id="Path_42548" data-name="Path 42548" d="M25.953,53.339a1.6,1.6,0,0,1-.5,1.188,2.324,2.324,0,0,1-1.439.375h-.5v1.814H22.7V51.9h1.439a2.125,2.125,0,0,1,1.376.375A1.213,1.213,0,0,1,25.953,53.339Zm-2.377.938h.438a1.657,1.657,0,0,0,.876-.188A.807.807,0,0,0,25.2,53.4a.725.725,0,0,0-.25-.625,1.419,1.419,0,0,0-.813-.188h-.563v1.689Zm7.318,0a2.308,2.308,0,0,1-.688,1.814,2.589,2.589,0,0,1-1.939.625H26.891V51.9h1.5a2.468,2.468,0,0,1,1.814.625A2.257,2.257,0,0,1,30.894,54.277Zm-.876,0c0-1.188-.563-1.751-1.626-1.751H27.7v3.5h.563C29.455,56.091,30.018,55.465,30.018,54.277Zm2.69,2.439h-.813V51.9h2.752v.688H32.708v1.5h1.814v.688H32.708Z" transform="translate(-6.38 -19.468)" fill="#eff2f3"/></g></svg>
                                <div>
                                    <h5>{{ basename($order->files) }}</h5>
                                    <a href="{{ asset($order->files) }}" target="_blank">تحميل الملف</a>
                                </div>
                             </div>
                        </div>
                     </div>
                     @endif
                 </div>
                 <div class="d-flex justify-content-center mt-4">
                    <a href="{{ route('profile') }}" class="btn cs-btn v2">العودة إلى الطلبات</a>
                 </div>
              </div>
            </div>
        </div>
    </div>
</x-question-layout>
