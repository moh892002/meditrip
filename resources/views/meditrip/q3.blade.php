<x-question-layout title="السؤال الثالث" prev="{{ route('q2') }}" formId="question-form">
    <div class="q-body-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cs-progress">
                        <div class="bg-line" style="width: 50%;">
                            <div class="line">5</div>
                        </div>
                    </div>
                    <form id="question-form" action="{{ route('q3.store') }}" method="post">
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
                            <h2>متى قمت باجراء الفحوصات؟</h2>
                            <div class="answers">
                                <div class="row justify-content-center mt-4">
                                    <div class="col-lg-7">
                                        <div class="row">
                                            @foreach (['الأسبوع الماضي', 'الشهر الماضي', 'في العامين الماضيين', 'لم يتم إجراء أي فحوصات'] as $index => $option)
                                            <div class="col-lg-12">
                                                <div class="btn-group" role="group">
                                                    <input type="radio" class="btn-check" name="tests_timing"
                                                        id="timing{{ $index + 1 }}" value="{{ $option }}" autocomplete="off"
                                                        @checked(old('tests_timing') === $option)>
                                                    <label class="btn cs-checkbox" for="timing{{ $index + 1 }}">
                                                        <span>{{ $index + 1 }}</span>
                                                        {{ $option }}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
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
