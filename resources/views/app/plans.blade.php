@extends('app.theme')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Planos</h4>
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
                <a href="#">Planos</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Planos registrados</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Adicionar plano
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
                                    <form method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Plano</label>
                                                    <input name="plan" type="text" class="form-control" placeholder="Nome">
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Preço R$</label>
                                                    <input step="0.01" name="price" type="number" class="form-control" placeholder="Preço">
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
                                            Editar plano
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
                                                    <label>Plano</label>
                                                    <input id="plan" name="plan" type="text" class="form-control" placeholder="Nome">
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Preço R$</label>
                                                    <input step="0.01" id="price" name="price" type="number" class="form-control" placeholder="Preço">
                                                </div>
                                            </div>

                                        </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button name="update" value="true" type="submit" class="btn btn-primary">
                                        Atualizar
                                    </button>
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
                                    <th>id</th>
                                    <th>Plano</th>
                                    <th>Preço</th>
                                    <th style="width: 3%"></th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($plans as $plan)
                                <tr>
                                    <td>{{$plan->id}}</td>
                                    <td>{{$plan->plan}}</td>
                                    <td>R$ {{$plan->price}}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button value="{{$plan->id}}" type="button" data-toggle="modal" title="" class="edit btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-target="#editrowmodal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <form method="post">
                                                <button name="delete" value="{{$plan->id}}" type="submit" class="mt-1 btn btn-link btn-danger">
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

                <div class="ml-auto mr-auto">
                    {{$plans->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(".edit").click(function() {
        $.post("{{url('/app/plans')}}", {
            id: this.value
        }, function(data) {
            console.log(data);
            $("#plan").val(data.plan);
            $("#price").val(data.price);
            $("#id").val(data.id);
        }, 'json');
    });
</script>
@endsection