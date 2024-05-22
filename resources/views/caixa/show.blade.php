@extends('layouts.app')

@section('title', 'Show caixa')

@section('contents')
    <h1 class="mb-0">Detail caixa</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="data" class="form-control" placeholder="data" value="{{ $caixa->data }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Historico</label>
            <input type="text" name="Historico" class="form-control" placeholder="Historico"
                value="{{ $caixa->Historico }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Valor</label>
            <input type="money" name="valor" class="form-control" placeholder="VALOR" value="{{ $caixa->valor }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Debito/Credito</label>
            <input type="text" name="caixa_code" class="form-control" placeholder="debito_credito"
                value="{{ $caixa->debito_credito }}"readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Vencimento</label>
            <input type="text" name="caixa_code" class="form-control" style="width: 175px" placeholder="Data Vencimento"
                value="{{ $caixa->data_vcto }}"readonly>
        </div>
        <div class="col mb-3'">
            <label class="form-label">Baixa</label>
            <input type="text" name="data_baixa" class="form-control" style="width: 175px" placeholder="Data da Baixa"
                value="{{ $caixa->data_baixa }}"readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Conta</label>
            <input type="text" name="conta" class="form-control" style="width: 400px" placeholder=""
                value="{{ $caixa->plano->conta }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Juros</label>
            <input type="text" name="Juros" class="form-control" placeholder="Juros" value="{{ $caixa->juros }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">multas</label>
            <input type="text" name="multas" class="form-control" placeholder="multas" value="{{ $caixa->multas }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">acrecimos</label>
            <input type="text" name="acrecimos" class="form-control" placeholder="acrecimos"
                value="{{ $caixa->acrecimos }}" readonly>
        </div>

        <div class="col mb-3">
            <label class="form-label">descontos</label>
            <input type="text" name="descontos" class="form-control" placeholder="desco..."
                value="{{ $caixa->descontos }}" readonly>
        </div>



    </div>

@endsection
