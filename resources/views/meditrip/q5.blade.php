<x-question-layout title="السؤال الخامس" prev="{{ route('q4') }}" formId="question-form">
    <div class="q-body-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cs-progress">
                        <div class="bg-line" style="width: 90%;">
                            <div class="line">1</div>
                        </div>
                    </div>
                    <form id="question-form" action="{{ route('q5.store') }}" method="post">
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
                            <h2>من فضلك قم بكتابة ملاحظاتك أو وصف حالتك</h2>
                            <div class="answers mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="icon-input">
                                            <span class="icon-i">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <g id="vuesax_bulk_textalign-justifyright" data-name="vuesax/bulk/textalign-justifyright" transform="translate(-300 -188)">
                                                      <g id="textalign-justifyright">
                                                        <path id="Vector" d="M18.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h18a.755.755,0,0,1,.75.75A.755.755,0,0,1,18.75,1.5Z" transform="translate(302.25 191.75)" fill="#868692"/>
                                                        <path id="Vector-2" data-name="Vector" d="M10.22,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h9.47a.755.755,0,0,1,.75.75A.755.755,0,0,1,10.22,1.5Z" transform="translate(310.78 196.75)" fill="#d3d3d8"/>
                                                        <path id="Vector-3" data-name="Vector" d="M18.75,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h18a.755.755,0,0,1,.75.75A.755.755,0,0,1,18.75,1.5Z" transform="translate(302.25 201.75)" fill="#868692"/>
                                                        <path id="Vector-4" data-name="Vector" d="M10.22,1.5H.75A.755.755,0,0,1,0,.75.755.755,0,0,1,.75,0h9.47a.755.755,0,0,1,.75.75A.755.755,0,0,1,10.22,1.5Z" transform="translate(310.78 206.75)" fill="#d3d3d8"/>
                                                        <path id="Vector-5" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(300 188)" fill="none" opacity="0"/>
                                                      </g>
                                                    </g>
                                                  </svg>
                                            </span>
                                            <textarea name="notes" id="notes" class="form-control cs-input-2" cols="30" rows="10" placeholder="أدخل نص ملاحظاتك هنا">{{ old('notes') }}</textarea>
                                        </div>
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
