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

            <label for="transaction_id">Transação</label>
            <br>
            <input type="text" value="{{ $registry->transaction->description }}" disabled id="transaction_id" >

            <br>
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
                <option value="0" {{ $registry->status == false ? 'selected' : '' }}>Pendente</option>
                <option value="1" {{ $registry->status == true ? 'selected' : '' }}>Pago</option>
            </select>

            <br>

            <label for="registry_date">Data da compra/recebimento</label>
            <br>
            <input type="date" name="registry_date" id="registry_date"
                value="{{ $registry->id > 0 ? $registry->registry_date : '' }}">
            <br>


            <label for="category_id">Categoria</label>
            <br>

            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>

            <br>


            <label for="is_credit_card">Compra realizada com cartao de crédito?</label>
            <br>
            <input type="checkbox" name="is_credit_card" id="is_credit_card" value="1">

            <br>

            <label for="credit_cards" id="for_credit_card" hidden=true>Cartão de Crédito</label>
            <br>
            <select name="credit_cards" id="credit_cards" hidden=true>
                <option value="0">Selecione um cartao de crédito</option>
                @foreach ($credit_cards as $credit_card)
                    <option value="{{ $credit_card->id }}">{{ $credit_card->name }} ({{ $credit_card->final_number }})
                    </option>
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
