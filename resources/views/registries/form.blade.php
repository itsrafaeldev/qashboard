@extends('layouts.main')
@section('title', 'Registros')
@section('content')
    <h1>{{ $titleView }}</h1>


    @if ($registry->id > 0)
        <h4>Registro selecionado: {{ $registry->id }} | {{ $registry->registry_name }} | {{ $registry->description }}</h4>
    @endif

    <div class="container-form">
        <form action="{{ route('registries.save') }}" method="post">
            @csrf

            <input type="hidden" name="id" id="registry_id" value="{{ $registry->id > 0 ? $registry->id : '' }}">

            <label for="registry_name">Nome do Registro</label>
            <br>
            <input type="text" name="registry_name" id="registry_name"
                value="{{ $registry->id > 0 ? $registry->registry_name : '' }}">
            <br>

            <label for="description">Descrição</label>
            <br>
            <input type="text" name="description" id="description"
                value="{{ $registry->id > 0 ? $registry->description : '' }}">
            <br>

            <label for="description">Status</label>
            <br>
            <select name="status" id="status">
                <option value="1">Pago</option>
                <option value="2">Pendente</option>
            </select>

            <br>

            <label for="description">Data da compra</label>
            <br>
            <input type="date" name="registry_date" id="registry_date"
                value="{{ $registry->id > 0 ? $registry->registry_date : '' }}">
            <br>

            <label for="amount">Preço</label>
            <br>
            <input type="text" name="amount" id="amount"
                value="{{ $registry->id > 0 ? $registry->amount : '' }}">
            <br>

            <label for="quantity_installment">Parcelas</label>
            <br>
            <input type="text" name="description" id="description"
                value="{{ $registry->id > 0 ? $registry->quantity_installment : '' }}">
            <br>


            <button type="submit" id="btn-gravar">Gravar</button>
        </form>
        @if ($registry->id > 0)
            <a href="#" id="btn-delete">Deletar</a>
        @endif
    </div>


    <a href={{ route(name: 'registries.list') }}>Voltar</a>


    @push('script')
        <script src="{{ asset('js/registries/form.js') }}"></script>
    @endpush

@endsection
