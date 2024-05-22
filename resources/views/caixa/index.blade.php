@extends('layouts.app')

@section('title', '5pila')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Lista caixa</h1>
        <a href="{{ route('caixa.create') }}" class="btn btn-primary">Adicionar ao caixa</a>
    </div>
    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Data</th>
                <th>Historico</th>
                <th>Valor</th>
                <th>Debito/redito</th>
                <th>Data Vencimento</th>
                <th>Conta</th>
                <th>Baixada em</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @if ($caixa->count() > 0)
                @foreach ($caixa as $rs)
                    <tr style="background-color: {{ $rs->data_baixa ? 'green' : 'white' }}">
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ date('d/m/Y', strtotime($rs->data)) }}</td>
                        <td class="align-middle">{{ $rs->Historico }}</td>
                        <td class="align-middle">{{ $rs->valor }}</td>
                        <td class="align-middle">{{ $rs->debito_credito }}</td>
                        <td class="align-middle">{{ date('d/m/Y', strtotime($rs->data_vcto)) }}</td>
                        <td class="align-middle">{{ $rs->plano->conta }}</td>
                        <td class="align-middle">{{ $rs->data_baixa ? date('d/m/Y', strtotime($rs->data_baixa)) : '' }}
                        </td>
                        <td class="align-middle">
                            @if (!$rs->data_baixa)
                                <!-- Botão para baixar -->
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#baixarModal{{ $rs->id }}">
                                    Baixar
                                </button>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('caixa.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Detalhes</a>
                                <a href="{{ route('caixa.edit', $rs->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>


                                <form action="{{ route('caixa.destroy', $rs->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>


                    <!-- Modal para baixar -->

                    <div class="modal fade" id="baixarModal{{ $rs->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="baixarModal{{ $rs->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="baixarModal{{ $rs->id }}Label">Baixar
                                        Parcela</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulário para selecionar a data de baixa -->



                                    <form action="{{ route('caixa.update', $rs->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="data_baixa">Data de Baixa</label>
                                            <input type="date" class="form-control" id="data_baixa" name="data_baixa">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Baixar</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">Nenhuma conta para mostrar</td>
            </tr>
            @endif
        </tbody>
    </table>
@endsection
