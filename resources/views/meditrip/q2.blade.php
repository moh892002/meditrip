<x-question-layout title="السؤال الثاني" prev="{{ route('questions') }}" formId="question-form">
    <div class="q-body-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cs-progress">
                        <div class="bg-line" style="width: 30%;">
                            <div class="line">7</div>
                        </div>
                    </div>
                    <form id="question-form" action="{{ route('q2.store') }}" method="post">
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
                            <h2>ماذا تريد أن تفعل في المستقبل القريب؟</h2>
                            <div class="answers">
                                <div class="row justify-content-center mt-4">
                                    <div class="col-lg-7">
                                        <div class="row">
                                            @foreach (['القدوم إلى المستشفى للتشخيص', 'القدوم إلى المستشفى للاستشارة والعلاج', 'أحصل على استشارة الأخصائي', 'أحصل على استشارة أخصائي أونلاين'] as $index => $option)
                                            <div class="col-lg-12">
                                                <div class="btn-group" role="group">
                                                    <input type="radio" class="btn-check" name="plan"
                                                        id="plan{{ $index + 1 }}" value="{{ $option }}" autocomplete="off"
                                                        @checked(old('plan') === $option)>
                                                    <label class="btn cs-checkbox" for="plan{{ $index + 1 }}">
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
