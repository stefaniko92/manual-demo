@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Questions</li>
        </ol>
    </nav>
    <div class="row">
        @include('admin.layout.error')

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Questions</h6>

                    <form class="forms-sample" action="{{ route('questions.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="mb-3">
                            <label for="questionnaire_id" class="form-label">Questionnaire</label>
                            <select name="questionnaire_id" class="form-select" id="questionnaire_id">
                                @foreach($questionnaires as $questionnaire)
                                    <option value="{{ $questionnaire->id }}">{{ $questionnaire->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Question</label>
                            <textarea class="form-control" name="text" id="text" rows="5" spellcheck="false"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('questions.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
