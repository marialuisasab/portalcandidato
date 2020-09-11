@extends('adminlte::page')
{{-- Link do Bootstrap --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{-- <link rel ="stylesheet" href="css/homeCandidato.css"> --}}
<script src="/vendor/jquery/jquery.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

@section('content')

<div class="container">

    <div class="row">
       
        <div class="col-sm" style="background-color: white;">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <div class="card-body" style="text-align: center;">
                        @if(Auth::user()->foto != null)
                            <img src="{{url('/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"
                                style="max-width: 100px; text-align: center; border-radius: 50%;">
                        @else
                            <img class="profile-user-img img-responsive img-circle" src="/img/usuariopadrao.png"
                                alt="Usuário sem foto">
                         @endif
                    </div>

                    <h3 class="profile-username text-center" style="font-family: Arial, Helvetica, sans-serif;">
                            Seja Bem-Vindo(a), {{Auth::user()->name}}
                    </h3>
                    <p style="padding-left: 10px; text-align: center;"><strong class="lead">
                        {{Auth::user()->email}}<br>
                        Verifique suas opções de gerenciamento no sistema</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-3 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 style="color:white;">{{Helper::getTotalCurriculos()}}</h3>
              <p style="text-align: center; color: white;">Currículos cadastrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('buscarcurriculo')}}" class="small-box-footer" data-toggle="tooltip"
              title="Visualizar currículos" style="color:white;"> 
              Mais Informações <i style="color:white;"class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{Helper::getTotalVagas()}}</h3>
              <p style="text-align: center;">Vagas cadastradas</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('listar')}}" class="small-box-footer" data-toggle="tooltip"
              title="Visualizar vagas">
              Mais Informações <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{Helper::getTotalProcessos()}}</h3>
              <p style="text-align: center;">Processos em andamento</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('listar')}}" class="small-box-footer toltipclass" data-toggle="tooltip"
              title="Visualizar vagas">Mais Informações <i
                class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{Helper::getTotalCurriculosObservacao()}}</h3>
              <p style="text-align: center">Currículos contém observação</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('listar')}}" class="small-box-footer" data-toggle="tooltip"
              title="Clique para ver as vagas que você se candidatou">Mais Informações <i
                class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

    </div>
</div>




@endsection