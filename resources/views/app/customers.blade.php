@extends('app.theme')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Clientes</h4>
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
                <a href="#">Clientes</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Lista de clientes</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Adicionar cliente
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
                                            Adicionar cliente
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Preencha as informações para adicionar um novo cliente</p>
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nome completo</label>
                                                    <input name="name" type="text" class="form-control" placeholder="Nome completo">
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>E-mail</label>
                                                    <input autocomplete="nope" name="email" type="email" class="form-control" placeholder="E-mail">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Vencimento</label>
                                                    <input name="expireat" type="date" class="form-control" placeholder="Vencimento">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Plano</label>
                                                    <select name="plan" class="form-control">
                                                        @foreach($plans as $plan)
                                                        <option value="{{$plan->plan}}">{{$plan->plan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" class="btn btn-primary">Adicionar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editrowmodal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-light">
                                            Editar Cliente
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <input id="id" name="id" type="hidden" class="form-control" placeholder="Nome completo">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nome completo</label>
                                                    <input id="name" name="name" type="text" class="form-control" placeholder="Nome completo">
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>E-mail</label>
                                                    <input id="email" autocomplete="nope" name="email" type="email" class="form-control" placeholder="E-mail">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="1">Ativo</option>
                                                        <option value="2">Suspenso</option>
                                                        <option value="3">Cancelado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Vencimento</label>
                                                    <input id="expireat" name="expireat" type="date" class="form-control" placeholder="Vencimento">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Plano</label>
                                                    <select id="plan" name="plan" class="form-control">
                                                        @foreach($plans as $plan)
                                                        <option value="{{$plan->plan}}">{{$plan->plan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button name="update" value="true" type="submit" class="btn btn-primary">Atualizar</button>
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
                                    <th>Name</th>
                                    <th>Plano</th>
                                    <th>Vencimento</th>
                                    <th>Status</th>
                                    <th style="width: 3%"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->plan}}</td>
                                    <td>{{$customer->expireat}}</td>
                                    @if($customer->status == 1)
                                    <td class="text-success">Ativo</td>
                                    @elseif($customer->status == 2)
                                    <td class="text-warning">Suspenso</td>
                                    @elseif($customer->status == 3)
                                    <td class="text-danger">Cancelado</td>
                                    @endif
                                    <td>
                                        <div class="form-button-action">
                                            <button value="{{$customer->id}}" type="button" data-toggle="modal" title="" class="edit btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-target="#editrowmodal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" data-toggle="tooltip" value="{{$customer->id}}" class="delete btn btn-link btn-danger" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="ml-auto mr-auto">
                    {{$customers->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(".edit").click(function() {
        $.post("{{url('/app/customers')}}", {
            id: this.value
        }, function(data) {
            $("#name").val(data.name);
            $("#email").val(data.email);
            $("#expireat").val(data.expireat);
            $("#plan").val(data.plan);
            $("#id").val(data.id);
            $("#status").val(data.status);
        }, 'json');
    });

    $(".delete").click(function() {
        Swal.fire({
            title: 'Tem certeza?',
            html: 'Tem certeza que deseja deletar o cliente de id <b>' + this.value + '</b>?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("{{url('/app/customers')}}", {
                    id: this.value,
                    delete: true
                });
                setInterval(() => {
                    location.reload();
                }, 1000);
                Swal.fire(
                    'Deletado',
                    'Cliente deletado com sucesso.',
                    'success'
                )
            }
        })
    });
</script>
@if(Session::has('message'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Já existe um cliente com E-mail informado.'
    });
</script>
@endif
@endsection