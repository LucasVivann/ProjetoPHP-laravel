@extends('layouts.app')

@section('title', 'Criar nova conta')

@section('contents')
    <h1 class="mb-0">Adicionar caixa</h1>
    <hr />
    <form action="{{ route('caixa.store') }}" method="POST" enctype="multipart/form-data">


        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Data</label>
                <input type="date" name="data" class="form-control" placeholder="Data da compra">
            </div>
            <div class="col">
                <label class="form-label">Historico</label>
                <input type="text" name="Historico" class="form-control" placeholder="historico">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Valor</label>
                <input type="text" name="valor" class="form-control" placeholder="valor">
            </div>
            <div class="col">
                <label class="form-label">Debito/Credito</label>
                <input type="text" name="debito_credito" class="form-control" placeholder="debito/credito">
            </div>
            <div class="col">
                <label class="form-label">Data Vencimento</label>
                <input type="date" name="data_vcto" class="form-control" placeholder="Data de vencimento">
            </div>

            <div class="col">
                <label class="form-label">Contas</label>
                <select name='conta_ID'>
                    @foreach ($contas as $conta)
                        <option value="{{ $conta->id }}">{{ $conta->conta }}</option>
                    @endforeach
                </select>
            </div>


        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
