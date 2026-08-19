<x-question-layout title="ملخص الطلب" prev="{{ route('q5') }}">
    <div class="q-body-content summary-page">
        <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="hospital-card">
                    <figure>
                        <img src="{{ $hospital->image }}" alt="" srcset="">
                    </figure>
                    <div class="hospital-rate">
                        <div class="d-flex align-items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.08" height="18.567" viewBox="0 0 20.08 18.567"><g id="Star" transform="translate(-3.355 -2.05)"><path id="Path" d="M9.158.578a.962.962,0,0,1,1.764,0L13.016,5.41a.96.96,0,0,0,.808.575l5.369.413a.956.956,0,0,1,.537,1.691l-4.038,3.32a.954.954,0,0,0-.321.967l1.243,5a.959.959,0,0,1-1.419,1.054L10.527,15.7a.964.964,0,0,0-.974,0L4.886,18.432a.959.959,0,0,1-1.419-1.054l1.243-5a.954.954,0,0,0-.321-.967L.35,8.089A.956.956,0,0,1,.888,6.4l5.369-.413a.96.96,0,0,0,.808-.575Z" transform="translate(3.355 2.05)" fill="#ffc542" /></g></svg>
                            <span class="ml-1">{{ number_format($hospital->rates_avg_rating ?? 0, 1) }}</span>
                        </div>
                        <p>({{ $hospital->rates_count }}) تقييم | {{ $hospital->country }}، {{ $hospital->city }}</p>
                    </div>
                    <h4>{{ $hospital->name }}</h4>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="summary">
                    <h2>ملخص طلب عرض السعر</h2>
                    <div class="question-summary">
                       <div>
                            <h3>1. من فضلك، اختر أحد التخصصات التالية</h3>
                            <h6>{{ $specialization?->name ?? '—' }}</h6>
                       </div>
                       <a href="{{ route('questions') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g id="vuesax_bulk_edit-2" data-name="vuesax/bulk/edit-2" transform="translate(-684 -252)"><g id="edit-2"><path id="Vector" d="M18.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h18a.755.755,0,0,1,.75.75A.755.755,0,0,1,18.75,1.5Z" transform="translate(686.25 272.5)" fill="#d3d3d8"/><path id="Vector-2" data-name="Vector" d="M7.155,1.474c-1.94-1.94-3.84-1.99-5.83,0L.115,2.684a.417.417,0,0,0-.1.4,8.129,8.129,0,0,0,5.53,5.53.5.5,0,0,0,.12.02.4.4,0,0,0,.29-.12l1.2-1.21a4.133,4.133,0,0,0,1.47-2.89A4.117,4.117,0,0,0,7.155,1.474Z" transform="translate(695.865 254.006)" fill="#d3d3d8"/><path id="Vector-3" data-name="Vector" d="M12.116,5.48c-.29-.14-.57-.28-.84-.44-.22-.13-.43-.27-.64-.42a6.038,6.038,0,0,1-.56-.43,1.22,1.22,0,0,1-.17-.15A8.457,8.457,0,0,1,8.876,3a1.218,1.218,0,0,1-.15-.18,5.816,5.816,0,0,1-.42-.55,5.491,5.491,0,0,1-.39-.59c-.16-.27-.3-.54-.44-.82-.14-.3-.25-.59-.35-.86L.846,6.28a1.2,1.2,0,0,0-.28.55l-.54,3.83a2.05,2.05,0,0,0,.51,1.75,1.991,1.991,0,0,0,1.4.54,2.186,2.186,0,0,0,.36-.03l3.84-.54a1.113,1.113,0,0,0,.55-.28l6.28-6.28C12.686,5.72,12.416,5.61,12.116,5.48Z" transform="translate(687.494 258.05)" fill="#868692"/><path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(684 252)" fill="none" opacity="0"/></g></g></svg>
                       </a>
                    </div>
                    <div class="question-summary">
                        <div>
                             <h3>2. ماذا تريد أن تفعل في المستقبل القريب؟</h3>
                             <h6>{{ $quote['plan'] ?? '—' }}</h6>
                        </div>
                        <a href="{{ route('q2') }}">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g id="vuesax_bulk_edit-2" data-name="vuesax/bulk/edit-2" transform="translate(-684 -252)"><g id="edit-2"><path id="Vector" d="M18.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h18a.755.755,0,0,1,.75.75A.755.755,0,0,1,18.75,1.5Z" transform="translate(686.25 272.5)" fill="#d3d3d8"/><path id="Vector-2" data-name="Vector" d="M7.155,1.474c-1.94-1.94-3.84-1.99-5.83,0L.115,2.684a.417.417,0,0,0-.1.4,8.129,8.129,0,0,0,5.53,5.53.5.5,0,0,0,.12.02.4.4,0,0,0,.29-.12l1.2-1.21a4.133,4.133,0,0,0,1.47-2.89A4.117,4.117,0,0,0,7.155,1.474Z" transform="translate(695.865 254.006)" fill="#d3d3d8"/><path id="Vector-3" data-name="Vector" d="M12.116,5.48c-.29-.14-.57-.28-.84-.44-.22-.13-.43-.27-.64-.42a6.038,6.038,0,0,1-.56-.43,1.22,1.22,0,0,1-.17-.15A8.457,8.457,0,0,1,8.876,3a1.218,1.218,0,0,1-.15-.18,5.816,5.816,0,0,1-.42-.55,5.491,5.491,0,0,1-.39-.59c-.16-.27-.3-.54-.44-.82-.14-.3-.25-.59-.35-.86L.846,6.28a1.2,1.2,0,0,0-.28.55l-.54,3.83a2.05,2.05,0,0,0,.51,1.75,1.991,1.991,0,0,0,1.4.54,2.186,2.186,0,0,0,.36-.03l3.84-.54a1.113,1.113,0,0,0,.55-.28l6.28-6.28C12.686,5.72,12.416,5.61,12.116,5.48Z" transform="translate(687.494 258.05)" fill="#868692"/><path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(684 252)" fill="none" opacity="0"/></g></g></svg>
                        </a>
                     </div>
                     <div class="question-summary">
                        <div>
                             <h3>3. متى قمت باجراء الفحوصات؟</h3>
                             <h6>{{ $quote['tests_timing'] ?? '—' }}</h6>
                        </div>
                        <a href="{{ route('q3') }}">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g id="vuesax_bulk_edit-2" data-name="vuesax/bulk/edit-2" transform="translate(-684 -252)"><g id="edit-2"><path id="Vector" d="M18.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h18a.755.755,0,0,1,.75.75A.755.755,0,0,1,18.75,1.5Z" transform="translate(686.25 272.5)" fill="#d3d3d8"/><path id="Vector-2" data-name="Vector" d="M7.155,1.474c-1.94-1.94-3.84-1.99-5.83,0L.115,2.684a.417.417,0,0,0-.1.4,8.129,8.129,0,0,0,5.53,5.53.5.5,0,0,0,.12.02.4.4,0,0,0,.29-.12l1.2-1.21a4.133,4.133,0,0,0,1.47-2.89A4.117,4.117,0,0,0,7.155,1.474Z" transform="translate(695.865 254.006)" fill="#d3d3d8"/><path id="Vector-3" data-name="Vector" d="M12.116,5.48c-.29-.14-.57-.28-.84-.44-.22-.13-.43-.27-.64-.42a6.038,6.038,0,0,1-.56-.43,1.22,1.22,0,0,1-.17-.15A8.457,8.457,0,0,1,8.876,3a1.218,1.218,0,0,1-.15-.18,5.816,5.816,0,0,1-.42-.55,5.491,5.491,0,0,1-.39-.59c-.16-.27-.3-.54-.44-.82-.14-.3-.25-.59-.35-.86L.846,6.28a1.2,1.2,0,0,0-.28.55l-.54,3.83a2.05,2.05,0,0,0,.51,1.75,1.991,1.991,0,0,0,1.4.54,2.186,2.186,0,0,0,.36-.03l3.84-.54a1.113,1.113,0,0,0,.55-.28l6.28-6.28C12.686,5.72,12.416,5.61,12.116,5.48Z" transform="translate(687.494 258.05)" fill="#868692"/><path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(684 252)" fill="none" opacity="0"/></g></g></svg>
                        </a>
                     </div>
                     <div class="question-summary">
                        <div>
                             <h3>4. من فضلك قم بإرفاق الفحوصات التي قمت بإجرائها</h3>
                             <h6>{{ ! empty($quote['files']) ? 'تم إرفاق ملف' : 'لم يتم إرفاق ملف' }}</h6>
                        </div>
                        <a href="{{ route('q4') }}">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g id="vuesax_bulk_edit-2" data-name="vuesax/bulk/edit-2" transform="translate(-684 -252)"><g id="edit-2"><path id="Vector" d="M18.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h18a.755.755,0,0,1,.75.75A.755.755,0,0,1,18.75,1.5Z" transform="translate(686.25 272.5)" fill="#d3d3d8"/><path id="Vector-2" data-name="Vector" d="M7.155,1.474c-1.94-1.94-3.84-1.99-5.83,0L.115,2.684a.417.417,0,0,0-.1.4,8.129,8.129,0,0,0,5.53,5.53.5.5,0,0,0,.12.02.4.4,0,0,0,.29-.12l1.2-1.21a4.133,4.133,0,0,0,1.47-2.89A4.117,4.117,0,0,0,7.155,1.474Z" transform="translate(695.865 254.006)" fill="#d3d3d8"/><path id="Vector-3" data-name="Vector" d="M12.116,5.48c-.29-.14-.57-.28-.84-.44-.22-.13-.43-.27-.64-.42a6.038,6.038,0,0,1-.56-.43,1.22,1.22,0,0,1-.17-.15A8.457,8.457,0,0,1,8.876,3a1.218,1.218,0,0,1-.15-.18,5.816,5.816,0,0,1-.42-.55,5.491,5.491,0,0,1-.39-.59c-.16-.27-.3-.54-.44-.82-.14-.3-.25-.59-.35-.86L.846,6.28a1.2,1.2,0,0,0-.28.55l-.54,3.83a2.05,2.05,0,0,0,.51,1.75,1.991,1.991,0,0,0,1.4.54,2.186,2.186,0,0,0,.36-.03l3.84-.54a1.113,1.113,0,0,0,.55-.28l6.28-6.28C12.686,5.72,12.416,5.61,12.116,5.48Z" transform="translate(687.494 258.05)" fill="#868692"/><path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(684 252)" fill="none" opacity="0"/></g></g></svg>
                        </a>
                     </div>
                     <div class="question-summary">
                        <div>
                             <h3>5. ملاحظات إضافية</h3>
                             <p>{{ $quote['notes'] ?? 'لا توجد ملاحظات' }}</p>
                        </div>
                        <a href="{{ route('q5') }}">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g id="vuesax_bulk_edit-2" data-name="vuesax/bulk/edit-2" transform="translate(-684 -252)"><g id="edit-2"><path id="Vector" d="M18.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h18a.755.755,0,0,1,.75.75A.755.755,0,0,1,18.75,1.5Z" transform="translate(686.25 272.5)" fill="#d3d3d8"/><path id="Vector-2" data-name="Vector" d="M7.155,1.474c-1.94-1.94-3.84-1.99-5.83,0L.115,2.684a.417.417,0,0,0-.1.4,8.129,8.129,0,0,0,5.53,5.53.5.5,0,0,0,.12.02.4.4,0,0,0,.29-.12l1.2-1.21a4.133,4.133,0,0,0,1.47-2.89A4.117,4.117,0,0,0,7.155,1.474Z" transform="translate(695.865 254.006)" fill="#d3d3d8"/><path id="Vector-3" data-name="Vector" d="M12.116,5.48c-.29-.14-.57-.28-.84-.44-.22-.13-.43-.27-.64-.42a6.038,6.038,0,0,1-.56-.43,1.22,1.22,0,0,1-.17-.15A8.457,8.457,0,0,1,8.876,3a1.218,1.218,0,0,1-.15-.18,5.816,5.816,0,0,1-.42-.55,5.491,5.491,0,0,1-.39-.59c-.16-.27-.3-.54-.44-.82-.14-.3-.25-.59-.35-.86L.846,6.28a1.2,1.2,0,0,0-.28.55l-.54,3.83a2.05,2.05,0,0,0,.51,1.75,1.991,1.991,0,0,0,1.4.54,2.186,2.186,0,0,0,.36-.03l3.84-.54a1.113,1.113,0,0,0,.55-.28l6.28-6.28C12.686,5.72,12.416,5.61,12.116,5.48Z" transform="translate(687.494 258.05)" fill="#868692"/><path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(684 252)" fill="none" opacity="0"/></g></g></svg>
                        </a>
                     </div>
                     <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <form action="{{ route('order.store') }}" method="post">
                                @csrf
                                <button type="submit" class="btn cs-btn v2">إرسال الطلب</button>
                            </form>
                        </div>
                     </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-question-layout>
