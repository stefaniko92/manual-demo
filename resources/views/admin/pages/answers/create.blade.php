@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Answers</li>
        </ol>
    </nav>
    <div class="row">
        @include('admin.layout.error')

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('answers.store') }}" method="POST">
                        <h6 class="card-title">Answer</h6>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <select name="question_id" class="form-select">
                                @foreach($questions as $question)
                                    <option value="{{ $question->id }}">{{ $question->text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Answer</label>
                            <input type="text" required name="text" class="form-control" id="text" autocomplete="off"
                                   placeholder="Text"
                                   style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>

                        <h6 class="card-title">Behaviours</h6>

                        <div class="mb-3">
                            <label for="behaviourOneType" class="form-label">Subject Type</label>
                            <select name="behaviours[0][subject_type]" class="form-select" id="behaviourOneType">
                                <option value=""></option>
                                <option value="{{ \App\Models\Product::class }}">Product</option>
                                <option value="{{ \App\Models\Question::class }}">Question</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="behaviourOneSubjectId" class="form-label">Subject Id</label>
                            <input type="text" name="behaviours[0][subject_id]" class="form-control"
                                   id="behaviourOneSubjectId" autocomplete="off"
                                   placeholder="Text"
                                   style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>
                        <div class="mb-3">
                            <label for="behaviourOneAction" class="form-label">Action</label>
                            <select name="behaviours[0][action]" class="form-select" id="behaviourOneAction">
                                <option value="">Choose action</option>
                                <option value="{{ \App\Models\AnswerBehaviour::ACTION_NAVIGATE }}">{{ \App\Models\AnswerBehaviour::ACTION_NAVIGATE }}</option>
                                <option value="{{ \App\Models\AnswerBehaviour::ACTION_EXCLUDE_ALL }}">{{ \App\Models\AnswerBehaviour::ACTION_EXCLUDE_ALL }}</option>
                                <option value="{{ \App\Models\AnswerBehaviour::ACTION_RECOMMEND }}">{{ \App\Models\AnswerBehaviour::ACTION_RECOMMEND }}</option>
                            </select>
                        </div>
                        <hr/>

                        <div class="mb-3">
                            <label for="behaviourTwoType" class="form-label">Subject Type</label>
                            <select name="behaviours[1][subject_type]" class="form-select" id="behaviourTwoType">
                                <option value=""></option>
                                <option value="{{ \App\Models\Product::class }}">Product</option>
                                <option value="{{ \App\Models\Question::class }}">Question</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="behaviourTwoSubjectId" class="form-label">Subject Id</label>
                            <input type="text" name="behaviours[1][subject_id]" class="form-control"
                                   id="behaviourTwoSubjectId" autocomplete="off"
                                   placeholder="Text"
                                   style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>
                        <div class="mb-3">
                            <label for="behaviourTwoAction" class="form-label">Action</label>
                            <select name="behaviours[1][action]" class="form-select" id="behaviourTwoAction">
                                <option value="">Choose action</option>
                                <option value="{{ \App\Models\AnswerBehaviour::ACTION_NAVIGATE }}">{{ \App\Models\AnswerBehaviour::ACTION_NAVIGATE }}</option>
                                <option value="{{ \App\Models\AnswerBehaviour::ACTION_EXCLUDE_ALL }}">{{ \App\Models\AnswerBehaviour::ACTION_EXCLUDE_ALL }}</option>
                                <option value="{{ \App\Models\AnswerBehaviour::ACTION_RECOMMEND }}">{{ \App\Models\AnswerBehaviour::ACTION_RECOMMEND }}</option>
                            </select>
                        </div>

                        <h6 class="card-title">Restrictions</h6>

                        <div class="mb-3">
                            <label for="restrictionOneType" class="form-label">Subject Type</label>
                            <select name="restrictions[0][subject_type]" class="form-select" id="restrictionOneType">
                                <option value=""></option>
                                <option value="{{ \App\Models\Product::class }}">Product</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="restrictionOneSubjectId" class="form-label">Subject Id</label>
                            <input type="text" name="restrictions[0][subject_id]" class="form-control"
                                   id="restrictionOneSubjectId" autocomplete="off"
                                   placeholder="Text"
                                   style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>
                        <div class="mb-3">
                            <label for="restrictionOneAction" class="form-label">Action</label>
                            <select name="restrictions[0][action]" class="form-select" id="restrictionOneAction">
                                <option value="">Choose action</option>
                                <option value="{{ \App\Models\AnswerRestriction::ACTION_EXCLUDE_ONE }}">{{ \App\Models\AnswerRestriction::ACTION_EXCLUDE_ONE }}</option>
                                <option value="{{ \App\Models\AnswerRestriction::ACTION_EXCLUDE_ALL }}">{{ \App\Models\AnswerRestriction::ACTION_EXCLUDE_ALL }}</option>
                            </select>
                        </div>
                        <hr/>

                        <div class="mb-3">
                            <label for="restrictionTwoType" class="form-label">Subject Type</label>
                            <select name="restrictions[1][subject_type]" class="form-select" id="restrictionTwoType">
                                <option value=""></option>
                                <option value="{{ \App\Models\Product::class }}">Product</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="restrictionTwoSubjectId" class="form-label">Subject Id</label>
                            <input type="text" name="restrictions[1][subject_id]" class="form-control"
                                   id="restrictionTwoSubjectId" autocomplete="off"
                                   placeholder="Text"
                                   style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>
                        <div class="mb-3">
                            <label for="restrictionTwoAction" class="form-label">Action</label>
                            <select name="restrictions[1][action]" class="form-select" id="restrictionTwoAction">
                                <option value="">Choose action</option>
                                <option value="{{ \App\Models\AnswerRestriction::ACTION_EXCLUDE_ONE }}">{{ \App\Models\AnswerRestriction::ACTION_EXCLUDE_ONE }}</option>
                                <option value="{{ \App\Models\AnswerRestriction::ACTION_EXCLUDE_ALL }}">{{ \App\Models\AnswerRestriction::ACTION_EXCLUDE_ALL }}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <button class="btn btn-secondary">Cancel</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
