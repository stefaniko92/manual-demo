@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Answer</li>
        </ol>
    </nav>

    <div class="row">
        @include('admin.layout.error')

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('answers.update', $answer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h6 class="card-title">Edit Answer</h6>

                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <select name="question_id" class="form-select">
                                @foreach($questions as $question)
                                    <option value="{{ $question->id }}" {{ $answer->question_id == $question->id ? 'selected' : '' }}>{{ $question->text }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Answer</label>
                            <input type="text" required name="text" class="form-control" id="text" value="{{ $answer->text }}" placeholder="Text">
                        </div>

                        <div id="behaviourFields">
                            <h6 class="card-title">Behaviours</h6>
                            @foreach($answer->behaviours as $index => $behaviour)
                                @include('admin.pages.answers.partials.behaviour', ['index' => $index, 'behaviour' => $behaviour])
                            @endforeach
                        </div>
                        <button type="button" onclick="addBehaviour()" class="btn btn-primary">Add Behaviour</button>
                        <hr/>

                        <div id="restrictionFields">
                            <h6 class="card-title">Restrictions</h6>
                            @foreach($answer->restrictions as $index => $restriction)
                                @include('admin.pages.answers.partials.restriction', ['index' => $index, 'restriction' => $restriction])
                            @endforeach
                        </div>
                        <button type="button" onclick="addRestriction()" class="btn btn-primary">Add Restriction</button>
                        <hr/>

                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let behaviourIndex = {{ count($answer->behaviours) }};
        let restrictionIndex = {{ count($answer->restrictions ?? []) }};

        function addBehaviour() {
            const container = document.getElementById('behaviourFields');
            const productModel = @json(\App\Models\Product::class);
            const questionModel = @json(\App\Models\Question::class);
            const html = `
        <div id="behaviour${behaviourIndex}" class="mb-3">
            <input type="hidden" name="behaviours[${behaviourIndex}][id]" value="">
            <label for="behaviours[${behaviourIndex}][subject_type]" class="form-label">Subject Type</label>
            <select name="behaviours[${behaviourIndex}][subject_type]" class="form-select" id="behaviour${behaviourIndex}Type">
                <option value=""></option>
                <option value="${productModel}">Product</option>
                <option value="${questionModel}">Question</option>
            </select>

            <label for="behaviours[${behaviourIndex}][subject_id]" class="form-label">Subject Id</label>
            <input type="text" name="behaviours[${behaviourIndex}][subject_id]" class="form-control" id="behaviour${behaviourIndex}SubjectId" placeholder="Subject ID">

            <label for="behaviours[${behaviourIndex}][action]" class="form-label">Action</label>
            <select name="behaviours[${behaviourIndex}][action]" class="form-select" id="behaviour${behaviourIndex}Action">
                <option value="">Choose action</option>
                <option value="navigate">Navigate</option>
                <option value="exclude_all">Exclude All</option>
                <option value="recommend">Recommend</option>
            </select>

            <button type="button" onclick="removeBehaviour(${behaviourIndex})" class="btn btn-danger mt-3">Remove</button>

        </div>
    `;
            container.innerHTML += html;
            behaviourIndex++;
        }

        function addRestriction() {
            const container = document.getElementById('restrictionFields');
            const productModel = @json(\App\Models\Product::class);
            const html = `
        <div id="restriction${restrictionIndex}" class="mb-3">
            <input type="hidden" name="restrictions[${restrictionIndex}][id]" value="">

            <label for="restrictions[${restrictionIndex}][subject_type]" class="form-label">Subject Type</label>
            <select name="restrictions[${restrictionIndex}][subject_type]" class="form-select" id="restriction${restrictionIndex}Type">
                <option value=""></option>
                <option value="${productModel}">Product</option>
            </select>

            <label for="restrictions[${restrictionIndex}][subject_id]" class="form-label">Subject Id</label>
            <input type="text" name="restrictions[${restrictionIndex}][subject_id]" class="form-control" id="restriction${restrictionIndex}SubjectId" placeholder="Subject ID">

            <label for="restrictions[${restrictionIndex}][action]" class="form-label">Action</label>
            <select name="restrictions[${restrictionIndex}][action]" class="form-select" id="restriction${restrictionIndex}Action">
                <option value="">Choose action</option>
                <option value="exclude_one">Exclude One</option>
                <option value="exclude_all">Exclude All</option>
            </select>

            <button type="button" onclick="removeRestriction(${restrictionIndex})" class="btn btn-danger mt-3">Remove</button>
        </div>
    `;
            container.innerHTML += html;
            restrictionIndex++;
        }

        function removeBehaviour(index) {
            var element = document.getElementById('behaviour' + index);
            element.remove();
        }

        function deleteBehaviour(index, id) {
            if (id == 0) {
                removeBehaviour(index);
            } else {
                // Mark the entry for deletion
                document.getElementById('deleteBehaviour' + index).value = 1;
                document.getElementById('behaviour' + index).style.display = 'none';
            }
        }

        function removeRestriction(index) {
            var element = document.getElementById('restriction' + index);
            element.remove();
        }

        function deleteRestriction(index, id) {
            if (id == 0) {
                // If new and unsaved, just remove the element
                removeRestriction(index);
            } else {
                // Mark the entry for deletion
                document.getElementById('deleteRestriction' + index).value = 1;
                document.getElementById('restriction' + index).style.display = 'none';
            }
        }
    </script>
@endsection
