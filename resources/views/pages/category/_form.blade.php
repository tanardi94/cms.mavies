<div class="row">
    <div class="col-md-6">
        <div
            class="input-group input-group-outline my-3
        @if (!empty($category->name)) is-filled focused is-focused @endif">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name ?? '' }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div
            class="input-group input-group-outline my-3
            @if (!empty($parents)) is-filled focused is-focused @endif
            ">
            <label class="form-label">Select Parent</label>
            <select class="form-control" id="parentCategory" name="parentCategory">
                <option value="">-</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->slug }}" @if (!empty($category->parent->slug) && $category->parent->slug == $parent->slug) selected @endif>
                        {{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class='form-group row'>
    <div class="col-md-5">
        <a href="{{ url()->previous() }}" class="btn btn-lg btn-block btn-outline-primary">Kembali</a>
    </div>
    <div class="col-md-4">
        <input type="submit" value="Simpan" class="btn btn-lg btn-block btn-primary">
    </div>
</div>
