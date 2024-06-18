@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Questions</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6>{{ $question->text }}</h6>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h6>Answers</h6>
            <div class="card">
                <div class="card-body">
                    @foreach ($question->answers as $answer)
                        <div class="row">
                            <p><strong>Answer:</strong> {{ $answer->text }}</p>
                            <div class="col-md-6">
                                <p><strong>Behaviours:</strong></p>
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
                                                    Exclude all products
                                                    @break
                                                @default
                                                    No specific action
                                            @endswitch
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Restrictions:</strong> {{ $answer->text }}</p>
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
                                                    Exclude all products
                                                    @break
                                                @default
                                                    No specific action
                                            @endswitch
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
