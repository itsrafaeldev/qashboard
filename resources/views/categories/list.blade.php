@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
    <h1>CATEGORIAS</h1>
    @foreach ($categories as $category)
        <li><a href={{ route('categories.form-edit', $category->id) }}>  {{$category->id}} | {{$category->category_name}} | {{$category->description}}</a></li>
    @endforeach

    <a href={{ route('categories.form-create') }}>Criar categoria</a>
@endsection
