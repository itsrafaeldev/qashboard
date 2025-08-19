@extends('layouts.main')
@section('title', 'Cartões de Crédito')
@section('content')
    <h1>Cartões de Crédito</h1>
    @foreach ($creditCards as $creditCard)
        <li><a href={{ route('credit-cards.form-edit', $creditCard->id) }}>  {{$creditCard->id}} | {{$creditCard->name}} | {{$creditCard->final_number}}</a></li>
    @endforeach

    <a href={{ route('credit-cards.form-create') }}>Adicionar Cartão</a>
@endsection
