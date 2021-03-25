@extends('app.theme')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Faturas</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Faturas</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Faturas registradas</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Cobrança avulsa
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-light">
                                            Cobrança avulsa
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Cobrança (Item)</label>
                                                    <input required name="charge" type="text" class="form-control" placeholder="Item para cobrança">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>E-mail</label>
                                                    <input required name="email" type="email" class="form-control" placeholder="E-mail">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Valor</label>
                                                    <input required name="value" step="0.01" type="number" class="form-control" placeholder="Valor">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Vencimento</label>
                                                    <input required name="expireat" type="date" class="form-control" placeholder="Vencimento">
                                                </div>
                                            </div>

                                        </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" class="btn btn-primary">Enviar cobrança</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Valor</th>
                                    <th>Vencimento</th>
                                    <th>Link para pagamento</th>
                                    <th>Status</th>
                                    <th style="width: 3%"></th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($invoices as $invoice)

                                <tr>
                                    <td>{{$invoice->id}}</td>
                                    <td>{{$invoice->email}}</td>
                                    <td>R$ {{$invoice->value}}</td>
                                    <td>{{$invoice->expireat}}</td>
                                    <td><a href="{{$invoice->url}}" target="_blank">Abrir</a></td>
                                    @if($invoice->status == 1)
                                    <td class="text-primary">Pendente</td>
                                    @elseif($invoice->status == 2)
                                    <td class="text-danger">Cancelado</td>
                                    @elseif($invoice->status == 3)
                                    <td class="text-success">Pago</td>
                                    @endif
                                    <td>
                                        <div class="form-button-action">
                                            <form method="post">
                                                <button title="Cancelar" name="delete" value="{{$invoice->id}}" type="submit" class="mt-1 btn btn-link btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="float-right">
                    <!-- Pagination -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection