<div class="mb-3" id="restriction{{ $index }}">
    <input type="hidden" name="restrictions[{{ $index }}][id]" value="{{ $restriction->id ?? '' }}">

    <label for="restrictions[{{ $index }}][subject_type]" class="form-label">Subject Type</label>
    <select name="restrictions[{{ $index }}][subject_type]" class="form-select" id="restriction{{ $index }}Type">
        <option value=""></option>
        <option value="App\Models\Product" @isset($restriction) {{ $restriction->subject_type == 'App\Models\Product' ? 'selected' : '' }} @endisset>Product</option>
    </select>

    <label for="restrictions[{{ $index }}][subject_id]" class="form-label">Subject Id</label>
    <input type="text" name="restrictions[{{ $index }}][subject_id]" class="form-control" id="restriction{{ $index }}SubjectId"
           value="@isset($restriction){{ $restriction->subject_id }}@endisset" placeholder="Subject ID">

    <label for="restrictions[{{ $index }}][action]" class="form-label">Action</label>
    <select name="restrictions[{{ $index }}][action]" class="form-select" id="restriction{{ $index }}Action">
        <option value="">Choose action</option>
        <option value="exclude_one" @isset($restriction) {{ $restriction->action == 'exclude_one' ? 'selected' : '' }} @endisset>Exclude One</option>
        <option value="exclude_all" @isset($restriction) {{ $restriction->action == 'exclude_all' ? 'selected' : '' }} @endisset>Exclude All</option>
    </select>

    <div class="mt-3">
        <button type="button" class="btn btn-danger" onclick="deleteRestriction({{ $index }}, {{ $behaviour->id ?? 0 }})">Delete</button>
        <input type="hidden" name="restrictions[{{ $index }}][delete]" id="deleteRestriction{{ $index }}" value="0">
    </div>
</div>
