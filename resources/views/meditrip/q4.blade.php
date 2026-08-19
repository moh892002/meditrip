<x-question-layout title="السؤال الرابع" prev="{{ route('q3') }}" formId="question-form">
    <div class="q-body-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cs-progress">
                        <div class="bg-line" style="width: 75%;">
                            <div class="line">2</div>
                        </div>
                    </div>
                    <form id="question-form" action="{{ route('q4.store') }}" method="post" enctype="multipart/form-data">
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
                        <div class="question">
                            <h2>.من فضلك قم بإرفاق الفحوصات التي قمت بإجرائها</h2>
                            <div class="answers mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <label for="files" class="cs-file-upload">
                                            <input type="file" id="files" name="files" hidden>
                                            <div class="file-icon">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                                        <g id="vuesax_bulk_document-upload" data-name="vuesax/bulk/document-upload" transform="translate(-364 -188)">
                                                          <g id="document-upload" transform="translate(364 188)">
                                                            <path id="Vector" d="M29.986,13.645H25.172a7.174,7.174,0,0,1-7.163-7.164V1.666A1.671,1.671,0,0,0,16.343,0H9.279C4.148,0,0,3.332,0,9.28V24.042c0,5.948,4.148,9.28,9.279,9.28H22.373c5.131,0,9.279-3.332,9.279-9.28v-8.73A1.671,1.671,0,0,0,29.986,13.645Z" transform="translate(4.174 3.339)" fill="#a7afb9"/>
                                                            <path id="Vector-2" data-name="Vector" d="M1.87.325A1.091,1.091,0,0,0,0,1.06V6.887a4.551,4.551,0,0,0,4.591,4.458c1.586.017,3.79.017,5.676.017a1.053,1.053,0,0,0,.785-1.786C8.648,7.154,4.341,2.8,1.87.325Z" transform="translate(24.44 3.364)" fill="#1A6B52"/>
                                                            <path id="Vector-3" data-name="Vector" d="M8.811,3.706,5.472.367C5.455.351,5.439.351,5.439.334a1.428,1.428,0,0,0-.367-.25H5.038A1.714,1.714,0,0,0,4.637,0H4.5a1.078,1.078,0,0,0-.317.067.814.814,0,0,0-.117.05A1.106,1.106,0,0,0,3.7.367L.363,3.706a1.251,1.251,0,0,0,1.77,1.77l1.2-1.2v7a1.252,1.252,0,0,0,2.5,0v-7l1.2,1.2a1.25,1.25,0,0,0,1.77,0A1.26,1.26,0,0,0,8.811,3.706Z" transform="translate(10.415 17.07)" fill="#1A6B52"/>
                                                            <path id="Vector-4" data-name="Vector" d="M0,0H40V40H0Z" fill="none" opacity="0"/>
                                                          </g>
                                                        </g>
                                                      </svg>
                                                </span>
                                                <span>رفع ملف</span>
                                            </div>
                                            <p>pdf, word, excel, jpg, zip :بإمكانك رفع ملف بصيغة</p>
                                            <p>‏5MB :بحد أقصى</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-question-layout>
