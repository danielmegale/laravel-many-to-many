@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <h1>Vedi i mei Progetti</h1>
        @forelse ($projects as $project)
            <div class="card text-center d-flex my-4 " style="width: 50rem;">
                <img rc="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <a href="{{ $project->url }}" class="btn btn-primary">{{ $project->url }}</a>
                </div>
            </div>
        @empty
            <h3 class="text-center">Non ci sono Progetti</h3>
        @endforelse
    </div>
@endsection
