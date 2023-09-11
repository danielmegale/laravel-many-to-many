@if ($project->exists)
    <form method="POST" action="{{ route('admin.projects.update', ['project' => $project->id]) }}"
        enctype="multipart/form-data">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
@endif


@csrf
<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                name="title" placeholder="Inserisci il Titolo" value="{{ old('title', $project->title) }}"
                maxlength="50">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description"
                rows="10">
                        {{ old('description', $project->description) }}
                    </textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="category-id" class="form-label">Categoria</label>
            <select class="form-select" id="category" name="category_id">
                <option value="1">Nessuna</option>
                @foreach ($categories as $category)
                    <option @if (old('category_id', $project->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                        {{ $category->label }}</option>
                @endforeach
            </select>

        </div>
    </div>
    <div class="col-5">
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="image" name="image"
                placeholder="Inserisci un URL valido">
        </div>
    </div>
    <div class="col-1">
        <img src="{{ $project->image ? asset('storage/' . $project->image) : '' }}" alt="Preview" class="img-fluid"
            id="image-preview">
    </div>
    <div class="col-10">
        @foreach ($technologies as $technology)
            <div class="form-check form-check-inline my-3">
                <input class="form-check-input" type="checkbox" @if (in_array($technology->id, old('technologies', $project_technologies_ids ?? []))) checked @endif
                    id="technologies{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]">
                <label class="form-check-label"
                    for="technology-{{ $technology->id }}">{{ $technology->label }}</label>
                @error('technologies')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        @endforeach
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="url" class="form-label">URL Progetto</label>
            <input type="url" class="form-control" id="url" name="url"
                placeholder="Inserisci un URL valido" value="{{ old('url', $project->url) }}">
        </div>
    </div>
</div>

<div class="d-flex justify-content-end">
    <button class="btn btn-warning ms-2" type="submit">Modifica</button>
</div>
</form>
