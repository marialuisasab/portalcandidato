@extends('adminlte::page')

{{-- Link do Bootstrap --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{-- <link rel ="stylesheet" href="css/homeCandidato.css"> --}}
<link rel="stylesheet" href="css/principal.css">
<link rel="stylesheet" href="css/redes.css">
{{-- Link do Js --}}


{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
<script src="/vendor/jquery/jquery.min.js">
</script>
<script src="/js/Home/home.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>



@section('content_header')


<div class="row"
  style="text-align: center; margin-top: 5px; display: flex; flex-wrap: wrap; justify-content: space-between;">
  <div class="col">
    @if(Helper::getIdCurriculo() != false)
      <a href="/exibirCurriculo/{{Helper::getIdCurriculo()}}" type="button" title="Visualizar Dados">
        <strong>
          <span class="fas fa-eye " style="font-size: 15px; text-align: center;color:rgb(224, 224, 235);">
          Visualizar Dados
          </span>
        </strong>
      </a>
    @else 
      <a href="{{route('curriculo.dados')}}" type="button" title="Visualizar Dados">
        <strong>
          <span class="fas fa-eye " style="font-size: 15px; text-align: center;color:rgb(224, 224, 235);">
          Visualizar Dados
          </span>
        </strong>
      </a>
    @endif
  </div>
  <div class="col ">
    <a href="{{route('curriculo.dados')}}" type="button" title="Editar Dados"><strong><span class="fa fa-edit"
          style="font-size: 15px; text-align: center; color:rgb(224, 224, 235);;">Editar
          Dados</span></strong>
    </a>
  </div>
  <div class="col">
    <a href="/" type="button" title="Voltar a para o site"><strong><span class="fas fa-undo"
          style="font-size: 15px; text-align: center; color:rgb(224, 224, 235);;">Voltar para o
          site</span></strong></a>
  </div>
</div>
@endsection
@section('content')



@include('flash::message')
<div class="container">
  <div class="row">

    <div class="col-sm" style="background-color: white;">
      <div class="box box-primary">
        <div class="box-body box-profile">

          <div class="card-body" style="text-align: center;">
            @if(Auth::user()->foto != null)
            <img src="{{'/fotos/'.Auth::user()->foto}}" alt="{{Auth::user()->name}}"
              style="max-width: 200px; text-align: center; border-radius: 50%;">
            @else
            <img class="profile-user-img img-responsive img-circle" src="/img/imagemuserPadrao.jpg"
              alt="Usuário sem foto">
            @endif
          </div>



          {{-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> --}}



          <div style="text-justify:  center;">

            <h3 class="profile-username text-center" style="font-family: Arial, Helvetica, sans-serif;">
              Seja Bem-Vindo(a), {{Auth::user()->name}}</h3>

            @if(count($candidato)==0)
            <ul style="text-align: center;">
              Você ainda não cadastrou o seu currículo.<br><br>
              Acesse o <b>menu lateral</b> ou o <b>box amarelo</b> abaixo para iniciar o cadastro.<br>
              Caso ainda haja alguma dúvida, clique no ícone de ajuda
              no cabeçalho da página e consulte o <a href="ManualFaleConosco/manualsuporte.pdf"> Manual do
                Usuário. </a>
            </ul>
            @endif

            @foreach($candidato as $item)
            <ul style="text-align: center;">
              @if($item->telefone1!= null)
              <p style="padding-left: 10px; margin-right: 50px; margin-top: 30px;"><strong class="lead"
                  style="font-family: Arial, Helvetica, sans-serif;">Telefone:</strong> {{$item->telefone1}}</p>
              @else
              <p style="padding-left: 10px;"><strong class="lead">Sem informações cadastradas!!!</strong> </p>
              @endif



              <p style="padding-left: 10px;"><strong class="lead"
                  style="font-family: Arial, Helvetica, sans-serif;">Email:</strong><em
                  style="padding-left: 10px;">{{Auth::user()->email}}</em></p>



            </ul>

            <div class="card-body">



              <div class="card text-white bg-info mb-3" style="text-align: center; margin-top: -20px;">
                <h5 style="text-align: center; font-family: Palatino Linotype, Book Antiqua, Palatino, serif">Sobre Mim:
                </h5>
                <hr>
                <div class="card-body">

                  <p class="card-text" style="text-align: justify;">{{$item->sobre}}</p>

                </div>
              </div>
            </div>
            @endforeach


            {{-- <a href="/curriculo/editar/{{Auth::user()->id}}" class="btn btn-primary btn-block"><b>Editar
              Perfil</b></a> --}}

          </div>

        </div>
      </div>
    </div>





  </div>


  <div class="row">

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <!--<h3>44</h3>-->
          <p style="text-align: center;">Completar currículo</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{route('curriculo.dados')}}" class="small-box-footer" data-toggle="tooltip"
          title="Clique para adicionar informações">
          Mais Informações <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <!--<h3>65</h3>-->
          <p style="text-align: center;">Vagas Disponíveis</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{route('vagas')}}" class="small-box-footer" data-toggle="tooltip"
          title="Clique para ver as vagas disponíveis">
          Mais Informações <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <!--<h3>150</h3>-->

          <p style="text-align: center;">Suporte Tecnico</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('contatosuporte')}}" class="small-box-footer toltipclass" data-toggle="tooltip"
          title="Clique para entrar em contato com o suporte">Mais Informações <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <!--<h3>53<sup style="font-size: 20px">%</sup></h3>-->
          <p style="text-align: center">Minhas Vagas</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{route('minhasvagas')}}" class="small-box-footer" data-toggle="tooltip"
          title="Clique para ver as vagas que você se candidatou">Mais Informações <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

</div>


@endsection






























{{-- <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-md-8">
                        <div class="card">

                          <div class="card-header">Dashboard do Usuário</div>

                          <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                              {{ session('status') }}
</div>
@endif

Você está logado como usuário!
</div>
<div class="card-body">
  @if(Auth::user()->foto != null)
  <img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}" style="max-width: 200px;">
  @endif
</div>
<div class="card-body">
  <a href="{{route('curriculo.dados')}}">Dados Pessoais</a><br>
  <a href="{{route('home')}}">Endereço</a><br>
  <a href="{{route('home')}}">Idiomas</a><br>
  <a href="{{route('home')}}">Experiência Profissional</a><br>
  <a href="{{route('home')}}">Formação e Cursos</a><br>
  <a href="{{route('home')}}">Redes Sociais</a><br>
  <a href="{{route('home')}}">Acompanhar Vagas</a><br>
</div>
</div>
</div>
</div>
</div> --}}