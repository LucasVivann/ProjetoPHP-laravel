@extends('layouts.app')

@section('title', 'Edit caixa')

@section('contents')
    <h1 class="mb-0">Editar Caixa</h1>
    <hr />
    <form action="{{ route('caixa.update', $caixa->id) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">data</label>
                <input type="date" name="caixa_code" class="form-control" placeholder="data" value="{{ $caixa->data }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Historico</label>
                <input type="text" name="caixa_code" class="form-control" placeholder="Hist..."
                    value="{{ $caixa->Historico }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Valor</label>
                <input type="money" name="caixa_code" class="form-control" placeholder="valor"
                    value="{{ $caixa->valor }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Debito/Credito</label>
                <input type="text" name="caixa_code" class="form-control" placeholder="debito_credito"
                    value="{{ $caixa->debito_credito }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Data Vencimento</label>
                <input type="date" name="caixa_code" class="form-control" placeholder="Data Vencimento"
                    value="{{ $caixa->data_vcto }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Data Baixa</label>
                <input type="date" name="data_baixa" class="form-control" placeholder="Data Baixa"
                    value="{{ $caixa->data_baixa }}">
                <div class="col">
                    <label class="form-label">Contas</label>
                    <select name='conta_ID'>
                        @foreach ($contas as $conta)
                            <option value="{{ $conta->id }}"{{ $caixa->conta_ID == $conta->id ? 'selected' : '' }}>
                                {{ $conta->conta }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>

            @endsection
