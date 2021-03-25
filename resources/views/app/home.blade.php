@extends('app.theme')

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">DX Financial</h2>
                <h5 class="text-white op-7 mb-2">Faça cobranças e controle seus ganhos</h5>
            </div>
            <!--<div class="ml-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
            </div>-->
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Estatísticas gerais</div>
                    <div class="card-category">Informações sobre estatísticas no sistema</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-1"></div>
                            <h6 class="fw-bold mt-3 mb-0">Clientes ativos</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-2"></div>
                            <h6 class="fw-bold mt-3 mb-0">Planos</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="circles-3"></div>
                            <h6 class="fw-bold mt-3 mb-0">Faturas</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Estatísticas de receita e gastos totais</div>
                    <div class="row py-3">
                        <div class="col-md-4 d-flex flex-column justify-content-around">
                            <div>
                                <h6 class="fw-bold text-uppercase text-primary op-8">Renda Total</h6>
                                <h3 class="fw-bold">R$ </h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-danger op-8">Gastos totais</h6>
                                <h3 class="fw-bold">R$ </h3>
                            </div>
                            <div>
                                <h6 class="fw-bold text-uppercase text-success op-8">Saldo final</h6>
                                <h3 class="fw-bold">R$ </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Controle de planos</div>
                </div>
                <div class="card-body">
                    @error('name')({$message}) @enderror
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    Circles.create({
        id: 'circles-1',
        radius: 45,
        value: '{{$customers}}',
        maxValue: 100,
        width: 7,
        text: '{{$customers}}',
        colors: ['#f1f1f1', '#FF9E27'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-2',
        radius: 45,
        value: '{{$plans}}',
        maxValue: 100,
        width: 7,
        text: '{{$plans}}',
        colors: ['#f1f1f1', '#2BB930'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    })

    Circles.create({
        id: 'circles-3',
        radius: 45,
        value: 100,
        maxValue: 100,
        width: 7,
        text: 100,
        colors: ['#f1f1f1', '#F25961'],
        duration: 400,
        wrpClass: 'circles-wrp',
        textClass: 'circles-text',
        styleWrapper: true,
        styleText: true
    });


</script>
@endsection