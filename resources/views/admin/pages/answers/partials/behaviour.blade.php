<div class="mb-3" id="behaviour{{ $index }}">
    <input type="hidden" name="behaviours[{{ $index }}][id]" value="{{ $behaviour->id ?? '' }}">

    <label for="behaviours[{{ $index }}][subject_type]" class="form-label">Subject Type</label>
    <select name="behaviours[{{ $index }}][subject_type]" class="form-select" id="behaviour{{ $index }}Type">
        <option value=""></option>
        <option value="{{ \App\Models\Product::class }}" @isset($behaviour)
            {{ $behaviour->subject_type == \App\Models\Product::class ? 'selected' : '' }}
                @endisset>Product
        </option>
        <option value="{{ \App\Models\Question::class }}" @isset($behaviour)
            {{ $behaviour->subject_type == \App\Models\Question::class ? 'selected' : '' }}
                @endisset>Question
        </option>
    </select>

    <label for="behaviours[{{ $index }}][subject_id]" class="form-label">Subject Id</label>
    <input type="text" name="behaviours[{{ $index }}][subject_id]" class="form-control"
           id="behaviour{{ $index }}SubjectId"
           value="@isset($behaviour){{ $behaviour->subject_id }}@endisset" placeholder="Subject ID">

    <label for="behaviours[{{ $index }}][action]" class="form-label">Action</label>
    <select name="behaviours[{{ $index }}][action]" class="form-select" id="behaviour{{ $index }}Action">
        <option value="">Choose action</option>
        <option value="navigate" @isset($behaviour)
            {{ $behaviour->action == 'navigate' ? 'selected' : '' }}
                @endisset>Navigate
        </option>
        <option value="exclude_all" @isset($behaviour)
            {{ $behaviour->action == 'exclude_all' ? 'selected' : '' }}
                @endisset>Exclude All
        </option>
        <option value="recommend" @isset($behaviour)
            {{ $behaviour->action == 'recommend' ? 'selected' : '' }}
                @endisset>Recommend
        </option>
    </select>
    <div class="mt-3">
        <button type="button" class="btn btn-danger" onclick="deleteBehaviour({{ $index }}, {{ $behaviour->id ?? 0 }})">Delete</button>
        <input type="hidden" name="behaviours[{{ $index }}][delete]" id="deleteBehaviour{{ $index }}" value="0">
    </div>
</div>



