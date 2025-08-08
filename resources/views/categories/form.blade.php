@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
    <h1>{{ $titleView }}</h1>


    @if ($category->id > 0)
        <h4>Categoria selecionada: {{ $category->id }} | {{ $category->category_name }} | {{ $category->description }}</h4>
    @endif

    <div class="container-form">
        <form action="{{ route('categories.save') }}" method="post">
            @csrf

            <input type="hidden" name="id" id="category_id" value="{{ $category->id > 0 ? $category->id : '' }}">
            <label for="category_name">Nome da Categoria</label>
            <input type="text" name="category_name" id="category_name"
                value="{{ $category->id > 0 ? $category->category_name : '' }}">

            <label for="description">Descrição</label>
            <input type="text" name="description" id="description"
                value="{{ $category->id > 0 ? $category->description : '' }}">

            <button type="submit" id="btn-gravar">Gravar</button>
        </form>
        @if ($category->id > 0)
            <a href="#" id="btn-delete">Deletar</a>
        @endif
    </div>


    <a href={{ route(name: 'categories.list') }}>Voltar</a>


    @push('script')
        <script src="{{ asset('js/categories/form.js') }}"></script>
    @endpush

@endsection
