@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Answers</li>
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
                    <h6 class="card-title">Answers table</h6>
                    <div class="text-right">
                        <a href="{{ route('answers.create') }}" class="btn btn-primary">+ Create New</a>
                    </div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>Question</th>
                                <th>
                                    Answer
                                </th>

                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($answers as $answer)
                                <tr>
                                    <td>
                                        {{ $answer->id }}
                                    </td>
                                    <td>
                                        {{ $answer->question->text }}
                                    </td>
                                    <td>
                                        {{ $answer->text }}
                                    </td>
                                    <td class="actions">
                                        <form method="post" action="{{ route('answers.delete', $answer->id) }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="delete">
                                            <a class="action-link" href="{{ route('answers.edit', $answer->id) }}"><i data-feather="edit"></i></a>
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
