@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <header>
        <h1>{{ $project->title }}</h1>
    </header>
    <hr>
    <div class="clearfix">
        <img class=" img-fluid float-start me-2 " src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
            width="250">
        <p>{{ $project->description }}</p>
        <div>
            <strong>Creato il:</strong>{{ $project->created_at }}
            <strong>Ultima modifica:</strong>{{ $project->updated_at }}
            <strong>Categoria:</strong>{{ $project->category?->label }}
        </div>
    </div>
    <hr>
    <footer class="d-flex justify-content-between">
        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Indietro</a>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn  btn-warning ms-2"><i
                    class="fas fa-pencil me-2"></i>Modifica</a>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="ms-2 delete-form">
                @csrf
                @method('DELETE')
                <button class="btn  btn-danger">
                    <i class="fas fa-trash me-2"></i>Elimina
                </button>
            </form>
        </div>
    </footer>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
