@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Modifica Progetto</h1>
        <a class="btn btn-sm btn-secondary" href="{{ route('admin.projects.index') }}"><i class="fas fa-arrow-left"></i>Torna
            Indietro</a>
    </header>
    <hr>
    @include('includes.layout.form')

@endsection

@section('scripts')
    @vite('resources/js/image-preview.js')
@endsection
