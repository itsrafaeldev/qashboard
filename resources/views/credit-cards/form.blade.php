@extends('layouts.main')
@section('title', 'Cartões de Crédito')
@section('content')
    <h1>{{ $titleView }}</h1>


    @if ($creditCard->id > 0)
        <h4>Categoria selecionada: {{ $creditCard->id }} | {{ $creditCard->name }} | {{ $creditCard->final_number }}</h4>
    @endif

    <div class="container-form">
        <form action="{{ route('credit-cards.save') }}" method="post">
            @csrf

            <input type="hidden" name="credit_card_id" id="credit_card_id" value="{{ $creditCard->id > 0 ? $creditCard->id : 0 }}">

            <label for="name">Nome do Cartão de Crédito</label>
            <input type="text" name="name" id="name"
                value="{{ $creditCard->id > 0 ? $creditCard->name : '' }}">

            <label for="final_number">Últimos 4 números</label>
            <input type="text" name="final_number" id="final_number"
                value="{{ $creditCard->id > 0 ? $creditCard->final_number : '' }}">

            <label for="closing_day">Dia de fechamento da fatura</label>
            <input type="text" name="closing_day" id="closing_day"
                value="{{ $creditCard->id > 0 ? $creditCard->closing_day : '' }}">

            <button type="submit" id="btn-gravar">Gravar</button>
        </form>
        @if ($creditCard->id > 0)
            <a href="#" id="btn-delete">Deletar</a>
        @endif
    </div>


    <a href={{ route(name: 'credit-cards.list') }}>Voltar</a>


    @push('script')
        <script src="{{ asset('js/credit-cards/form.js') }}"></script>
    @endpush

@endsection
