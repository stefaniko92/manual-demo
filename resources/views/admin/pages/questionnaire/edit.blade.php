@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Questionnaires</li>
        </ol>
    </nav>
    <div class="row">
        @include('admin.layout.error')

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Questionnaires</h6>

                    <form class="forms-sample" action="{{ route('questionnaire.update', $questionnaire->id) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" required name="name" class="form-control" id="name" autocomplete="off"
                                   placeholder="Name"
                                   value="{{ $questionnaire->name }}"
                                   style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>
                        <div class="form-check mb-2">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" class="form-check-input" id="isActive" @if($questionnaire->is_active) checked @endif name="is_active" value="1">
                            <label class="form-check-label" for="isActive">
                                Is Active
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('questionnaire.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
