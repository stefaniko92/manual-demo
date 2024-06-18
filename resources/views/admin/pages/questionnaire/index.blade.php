@extends('admin.layout.master')

@section('content')
    <style>
        .action-btn {
            border: none;
            background: none;
            cursor: pointer;
            margin: 0 5px;
            color: inherit;
        }
        .action-link {
            text-decoration: none;
            margin: 0 5px;
            color: inherit;
        }
    </style>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Questionnaires</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h6 class="card-title">Questionnaires table</h6>
                    <div class="text-right">
                        <a href="{{ route('questionnaire.create') }}" class="btn btn-primary">+ Create New</a>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Is Active
                                </th>

                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questionnaires as $questionnaire)
                                <tr>
                                    <td>
                                        {{ $questionnaire->id }}
                                    </td>
                                    <td>
                                        {{ $questionnaire->name }}
                                    </td>
                                    <td>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="checkChecked" @if($questionnaire->is_active) checked @endif disabled>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        <form method="post" action="{{ route('questionnaire.delete', $questionnaire->id) }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="delete">
                                            <a class="action-link" href="{{ route('questionnaire.show', $questionnaire->id) }}"><i data-feather="eye"></i></a>
                                            <a class="action-link" href="{{ route('questionnaire.edit', $questionnaire->id) }}"><i data-feather="edit"></i></a>
                                            <button class="btn action-btn" type="submit" onclick="return confirm('Are you sure?')"><i data-feather="trash-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
