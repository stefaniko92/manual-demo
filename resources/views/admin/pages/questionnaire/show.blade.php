@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Questionnaires</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6>{{ $questionnaire->name }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h6>Questions</h6>
            @foreach($questionnaire->questions as $question)
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>ID: {{ $question->id }}</h6>
                        <p>{{ $question->text }}</p>
                        @foreach ($question->answers as $answer)
                            <div class="row mt-2">
                                <p><strong>Answer ID: </strong>{{ $answer->id }}
                                    <strong>Answer:</strong> {{ $answer->text }}</p>
                                <div class="col-md-6">
                                    <p><strong>Behaviours:</strong></p>
                                    @if($answer->behaviours->count() > 0)
                                        <ul>
                                            @foreach ($answer->behaviours as $behaviour)
                                                <li>
                                                    @switch($behaviour->action)
                                                        @case('navigate')
                                                            @if ($behaviour->subject_type === 'App\Models\Question')
                                                                Go to Question {{ $behaviour->subject->id }}
                                                            @endif
                                                            @break
                                                        @case('recommend')
                                                            @if ($behaviour->subject_type === 'App\Models\Product')
                                                                Recommend Product {{ $behaviour->subject->name }}
                                                            @endif
                                                            @break
                                                        @case('exclude_all')
                                                            No products available
                                                            @break
                                                        @default
                                                            No specific action
                                                    @endswitch
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No specific action</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Restrictions:</strong></p>
                                    @if($answer->restrictions->count() > 0)
                                        <ul>
                                            @foreach ($answer->restrictions as $restriction)
                                                <li>
                                                    @switch($restriction->action)
                                                        @case(\App\Models\AnswerRestriction::ACTION_EXCLUDE_ONE)
                                                            @if ($behaviour->subject_type === \App\Models\Product::class)
                                                                Exclude Product {{ $behaviour->subject->name }}
                                                            @endif
                                                            @break
                                                        @case(\App\Models\AnswerRestriction::ACTION_EXCLUDE_ALL)
                                                            @if ($behaviour->subject_type === \App\Models\Product::class)
                                                                Exclude all products
                                                            @endif
                                                            @break
                                                        @default
                                                            No specific action
                                                    @endswitch
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No specific action</p>
                                    @endif
                                </div>
                                <hr>

                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-footer">
                    <a href="{{ route('questionnaire.index') }}" class="btn btn-secondary">BACK</a>
                </div>
            </div>
        </div>
    </div>
@endsection
