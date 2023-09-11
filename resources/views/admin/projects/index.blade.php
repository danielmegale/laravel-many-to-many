@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Projects</h1>
        <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Nuovo Progetto</a>
    </header>
    <hr>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Categoria</th>
                <th scope="col">URL</th>
                <th scope="col">Description</th>
                <th scope="col">Creato il</th>
                <th scope="col">Ultima modifica</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>
                        @if ($project->category)
                            <span class="badge "
                                style="background-color:{{ $project->category->color }} ">{{ $project->category->label }}</span>
                        @else
                            -
                        @endif
                    </td>
                    <td><a href="{{ $project->url }}">{{ $project->url }}</a></td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <div class="d-flex justify-content-end">

                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning ms-2"><i
                                    class="fas fa-pencil"></i></a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                class="ms-2 delete-form">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">
                        <h3>Non ci sono Progetti</h3>
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

@endsection

@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
