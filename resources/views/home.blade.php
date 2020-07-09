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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="js/eventos.js"></script>


@section('content_header')

<div class="container">
  <div class="row" style="text-align: center; margin-top: 5px;">

    <div class="col-sm">
      <ul>
        <a href="curriculo" type="button" title="Visualizar Curriculo"><strong><span class="fas fa-eye "
              style="font-size: 15px; text-align: center;color:rgb(224, 224, 235);;">Visualizar
              Curriculo</span></strong></a>
      </ul>
    </div>

    <div class="col-sm"></div>
    <div class="col-sm">
      <ul>

        <a href="/curriculo/editar/{{Auth::user()->id}}" type="button" title="Editar Perfil"><strong><span
              class="fa fa-edit" style="font-size: 15px; text-align: center; color:rgb(224, 224, 235);;">Editar
              Perfil</span></strong></a>
      </ul>
    </div>
    <div class="col-sm"></div>
    <div class="col-sm">
      <ul>
        <a href="/" type="button" title="Voltar a pagina inicial"><strong><span class="fas fa-undo"
              style="font-size: 15px; text-align: center; color:rgb(224, 224, 235);;">Voltar</span></strong></a>
      </ul>
    </div>


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
            <img src="{{url('storage/fotos/'.Auth::user()->foto)}}" alt="{{Auth::user()->name}}"
              style="max-width: 200px; text-align: center; border-radius: 50%;">
            @else
            <img class="profile-user-img img-responsive img-circle" src="img/usuariopadrao.png" alt="Usuário sem foto">
            @endif
          </div>



          {{-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> --}}



          <div style="text-justify:  center;">

            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

            <p class="text-muted text-center">Ultimo cargo... EX: Software Engineer</p>
            @foreach($candidato as $item)
            <ul style="text-align: center;">

              @if($item->telefone1!= null)
              <p style="padding-left: 10px;"><strong class="lead">Telefone:</strong> {{$item->telefone1}}</p>
              @else
              <p style="padding-left: 10px;"><strong class="lead">Sem informações cadastradas!!!</strong> </p>
              @endif



              <p style="padding-left: 10px;"><strong style="font">Email:</strong><em
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
      <div class="small-box bg-blue">
        <div class="inner">
          <h3>150</h3>

          <p style="text-align: center;">Agendamentos</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer toltipclass" data-toggle="tooltip" title="Visualizar Agendamentos">Mais
          Informações <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p style="text-align: center">Meus Processos</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer" data-toggle="tooltip" title="Visualizar Processos">Mais Informações <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>44</h3>

          <p style="text-align: center;">Completar curriculo</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer" data-toggle="tooltip" title="Informações Pendentes">Mais Informações <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p style="text-align: center;">Alerta de Vagas</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer" data-toggle="tooltip" title="Novas Vagas">Mais Informações <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
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