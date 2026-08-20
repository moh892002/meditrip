<x-question-layout title="الأسئلة" prev="{{ route('hospitals') }}" formId="question-form">
    <div class="q-body-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cs-progress">
                        <div class="bg-line" style="width: 0;">
                            <div class="line">10</div>
                        </div>
                    </div>
                    <form id="question-form" action="{{ route('questions.store') }}" method="post">
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
                            <h2>من فضلك، اختر أحد التخصصات التالية.</h2>
                            <div class="answers">
                                <div class="row justify-content-center mt-4">
                                    <div class="col-lg-7">
                                        <div class="row">
                                            @foreach ($specializations as $index => $specialization)
                                            <div class="col-lg-6">
                                                <div class="btn-group" role="group">
                                                    <input type="radio" class="btn-check" name="specialization_id"
                                                        id="specialization{{ $specialization->id }}" value="{{ $specialization->id }}"
                                                        autocomplete="off" @checked(old('specialization_id') == $specialization->id)>
                                                    <label class="btn cs-checkbox" for="specialization{{ $specialization->id }}">
                                                        <span>{{ $index + 1 }}</span>
                                                        {{ $specialization->name }}
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
