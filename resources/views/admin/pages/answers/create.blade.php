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
                        @csrf
                        <h6 class="card-title">Answer</h6>

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
                            <input type="text" required name="text" class="form-control" id="text" placeholder="Text">
                        </div>

                        <h6 class="card-title ">Behaviours</h6>
                        <div id="behaviourFields"></div>
                        <button type="button" class="btn btn-primary" onclick="addBehaviour()">Add Behaviour</button>

                        <h6 class="card-title mt-3">Restrictions</h6>
                        <div id="restrictionFields"></div>
                        <button type="button" class="btn btn-primary" onclick="addRestriction()">Add Restriction</button>
                        <hr />
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('custom-scripts')
        <script>
            let behaviourIndex = 0;
            let restrictionIndex = 0;

            function addBehaviour() {
                const container = document.getElementById('behaviourFields');
                const productModel = @json(\App\Models\Product::class);
                const questionModel = @json(\App\Models\Question::class);
                const html = `
                    <div id="behaviour${behaviourIndex}" class="mb-3">
                        <input type="hidden" name="behaviours[${behaviourIndex}][id]" value="">
                        <label for="behaviours[${behaviourIndex}][subject_type]" class="form-label">Subject Type</label>
                        <select name="behaviours[${behaviourIndex}][subject_type]" class="form-select">
                            <option value=""></option>
                            <option value="${productModel}">Product</option>
                            <option value="${questionModel}">Question</option>
                        </select>

                        <label for="behaviours[${behaviourIndex}][subject_id]" class="form-label">Subject Id</label>
                        <input type="text" name="behaviours[${behaviourIndex}][subject_id]" class="form-control" placeholder="Subject ID">

                        <label for="behaviours[${behaviourIndex}][action]" class="form-label">Action</label>
                        <select name="behaviours[${behaviourIndex}][action]" class="form-select">
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
                        <select name="restrictions[${restrictionIndex}][subject_type]" class="form-select">
                            <option value=""></option>
                            <option value="${productModel}">Product</option>
                        </select>

                        <label for="restrictions[${restrictionIndex}][subject_id]" class="form-label">Subject Id</label>
                        <input type="text" name="restrictions[${restrictionIndex}][subject_id]" class="form-control" placeholder="Subject ID">

                        <label for="restrictions[${restrictionIndex}][action]" class="form-label">Action</label>
                        <select name="restrictions[${restrictionIndex}][action]" class="form-select">
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
                const element = document.getElementById('behaviour' + index);
                element.remove();
            }

            function removeRestriction(index) {
                const element = document.getElementById('restriction' + index);
                element.remove();
            }
        </script>
    @endpush
@endsection
