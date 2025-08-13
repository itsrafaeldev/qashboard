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

            <input type="hidden" name="id" id="registry_id" value="{{ $registry->id }}">

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

            <label for="status">Status</label>
            <br>
            <select name="status" id="status">
                <option value="0">Pendente</option>
                <option value="1">Pago</option>
            </select>

            <br>

            <label for="registry_date">Data da compra</label>
            <br>
            <input type="date" name="registry_date" id="registry_date"
                value="{{ $registry->id > 0 ? $registry->registry_date : '' }}">
            <br>

            <label for="transaction_id">Transação</label>
            <br>
            <select name="transaction_id" id="transaction_id">
                @foreach ($transactions as $transaction)
                    <option value="{{ $transaction->id }}">{{ $transaction->description }}</option>
                @endforeach
            </select>

            <br>

            <label for="category_id">Categoria</label>
            <br>

            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>

            <br>

            <label for="amount">Preço</label>
            <br>
            <input type="text" name="amount" id="amount"
                value="{{ $registry->id > 0 ? $registry->installments->first()->amount : '' }}">
            <br>


            <label for="quantity_installment">Quantidade de Parcelas</label>
            <br>
            <input type="number" name="quantity_installment" id="quantity_installment"
                value="{{ $registry->id > 0 ? $registry->installments->count() : 1 }}" min="1">

            @if ($registry->id > 0)
                <h3>##### TABELA DATAGRID #####</h3>

                <p>Total de Parcelas: {{ $registry->installments->count() }}</p>
                <ul>
                    @foreach ($registry->installments as $installment)
                        <li>Parcela #{{ $installment->current_installment }} — Valor: R$
                            {{ number_format($installment->value_installment, 2, ',', '.') }} — Status:
                            {{ $installment->getStatusLabelAttribute() }}</li>
                    @endforeach
                </ul>
                <h3>##### TABELA DATAGRID #####</h3>
            @endif




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
