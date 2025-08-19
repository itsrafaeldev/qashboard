@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
{{-- ECharts.js --}}
{{-- Feature futura:
Card de notificações gerais:
    - Quantidade de pagamentos em atraso
    - índice de temperatura de pagamentos (ruim, bom, regular, otimo)
    - Quantidade de pagamentos a vencer

--}}
    <h1>DASHBOARD</h1>

    {{-- Soma dos valores dos registros, do tipo de transação RECEITA, de uma determinada competencia --}}
    <h3>KPI: Receita(R$)</h3>

    {{-- Soma dos valores dos registros, do tipo de transação DESPESA, de uma determinada competencia --}}
    <h3>KPI: Despesas(R$)</h3>

    {{-- Resultado da diferença entre RECEITA (verde) e DESPESA (vermelho) --}}
    <h3>KPI: Saldo(R$)</h3>

    {{-- Quantidade de registros que estão com pagamentos (que não foram lançados) em atraso --}}
    {{-- Clique: Mostrar quais pagamentos estão em atraso dentro de uma competencia --}}
    <h3>KPI: Pagamentos em atraso</h3>

    {{-- Quanto, em R$, foi gasto por categoria (exemplo: Lazer = R$1000,00) --}}
    <h3>Gráfico de barras: Despesa(R$)/Categoria</h3>

    {{-- Quanto, em %, cada categoria representa do total (exemplo: Lazer = 60%) --}}
    <h3>Gráfico de pizza: Despesa/Categoria(%)</h3>

    {{-- Quantidade, em %, dos registros PAGOS e PENDENTES de uma determinada competencia --}}
    <h3>Gráfico de pizza: Registros pagos(%)</h3>

    <h3></h3>








    @push('script')
        <script src="{{ asset('js/dashboard/charts.js') }}"></script>
    @endpush
@endsection
