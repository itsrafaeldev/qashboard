@extends('layouts.main')
@section('title', 'Registros')
@section('content')
    <h1>REGISTROS</h1>
    @foreach ($registries as $registry)
        <li><a href={{ route('registries.form-edit', $registry->id) }}>  {{$registry->id}} | {{$registry->registry_name}} | {{$registry->description}}</a></li>
    @endforeach

    <a href={{ route('registries.form-create-revenues') }}>Novo registro (Receita)</a>
    <a href={{ route('registries.form-create-expenses') }}>Novo registro (Despesa)</a>

@endsection
